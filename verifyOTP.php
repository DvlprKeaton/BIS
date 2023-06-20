<?php

include("condb.php");


session_start();

$vkey = $_POST['vkey'];
$sql = "SELECT * FROM tbluser WHERE Verify = 0 AND VerificationCode = '$vkey'";
$res = mysqli_query($cn, $sql);
$row = mysqli_fetch_assoc($res);

$userID = $row['user_id'];
$fname = $row['fname'];
$lname = $row['lname'];
$mname = $row['mname'];
$dob = $row['birthdate'];
$age = $row['age'];
$position = $row['position'];
$cnum = $row['mobile_number'];
$gender = $_SESSION['regGender'];
$purok = $_SESSION['regPurok'];
$civil = $_SESSION['regCivil_status'];
$nationality = $_SESSION['regNationality'];
$validID = $_SESSION['regValidID'];

if($res && mysqli_num_rows($res)>0)
		{

		$sql2 = "UPDATE tbluser SET Verify= 1 AND Status = 1 WHERE VerificationCode='$vkey'";
		$res2 = mysqli_query($cn, $sql2);

		date_default_timezone_set("Asia/Manila");
		$regTime = date("d/m/Y - l - h:i:sa", strtotime(' + 7 days'));

		$sql3 = "INSERT INTO `tbl_resident`(`user_id`, `lname_resident`, `fname_resident`, `mname_resident`, `birthdate_resident`, `age`, `gender`, `purok`,`civil_status`, `nationality`, `Status`, `valid_id`, `id_uploadDate`) VALUES ('$userID','$lname','$fname','$mname','$dob','$age','$gender','$purok','$civil','$nationality','1','$validID','$regTime')";
		$res3 = mysqli_query($cn, $sql3);
		function myAlert1($msg, $url){
		echo '<script language="javascript">alert("'.$msg.'");</script>';
		echo "<script>document.location = '$url'</script>";
		}
		myAlert1("Your Account has been Verified. You may now login", "login.php");
		  
		}
else{
		function myAlert($msg, $url)
			{
		    echo '<script language="javascript">alert("'.$msg.'");</script>';
		    echo "<script>document.location = '$url'</script>";
			}
			myAlert("Account Already Verified", "login.php");

				
	}
	
	
?>