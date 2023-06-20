<?php
include("condb.php");

$username = $_POST['username'];
$pword = $_POST['pword'];
$sql = "SELECT * FROM tbluser WHERE user_name = '$username' AND Status = '1' AND Verify = '1'";
$result= mysqli_query($cn,$sql);
$row= mysqli_num_rows($result);


//echo $converted_pword;
//echo $row2['BID'];

if($row<>0) {
	$row2 = mysqli_fetch_assoc($result);
	$converted_pword = password_verify($pword, $row2['user_password']);

	session_start();

	$_SESSION['logid'] = $row2['user_id'];
	$_SESSION['logun'] = $row2['user_name'];

	date_default_timezone_set("Asia/Manila");
	$logtime = date("d/m/Y - l - h:i:sa");

	$logid = $_SESSION['logid'];
	$uname = $_SESSION['logun'];
	$pos = $row2['position'];
	$status = $row2['Status'];

	$sqlPos = "SELECT * FROM tbluser WHERE user_name = '$uname' AND Position = 'Punong Barangay' AND Status = '1'";
	$resultPos= mysqli_query($cn,$sqlPos);
	$rowPos= mysqli_num_rows($resultPos);

	$sqlPos1 = "SELECT * FROM tbluser WHERE user_name = '$uname' AND Position = 'Secretary' AND Status = '1'";
	$resultPos1= mysqli_query($cn,$sqlPos1);
	$rowPos1= mysqli_num_rows($resultPos1);


	if ($rowPos>0) {
		
	
		if($converted_pword==1)
		{
			$sql2 = "INSERT INTO tbllogin (id,username,password,type,status,created) VALUE ('$logid','$uname','$converted_pword','$pos','$status','$logtime')";
			$result2 = mysqli_query($cn, $sql2);
			echo "<script>document.location = 'loginSuccess.php'</script>";
		}
		else
		{
					echo "<script>document.location = 'loginFailed.php'</script>";

		}
	}else if ($rowPos1>0) {

		if($converted_pword==1)
		{
			$sql2 = "INSERT INTO tbllogin (id,username,password,type,status,created) VALUE ('$logid','$uname','$converted_pword','$pos','$status','$logtime')";
			$result2 = mysqli_query($cn, $sql2);
			echo "<script>document.location = 'loginSuccessSec.php'</script>";
		}
		else
		{
					echo "<script>document.location = 'loginFailed.php'</script>";

		}
	}

	else{

	$sqlPos2 = "SELECT * FROM tbluser WHERE Position = 'Resident' AND Status = '1'";
	$resultPos2= mysqli_query($cn,$sqlPos2);
	$rowPos2= mysqli_num_rows($resultPos2);

	echo $rowPos2;
	
	date_default_timezone_set("Asia/Manila");
	$logtime = date("d/m/Y - l - h:i:sa");

	$logid = $_SESSION['logid'];

	if ($rowPos2>0) {

		if($converted_pword==1)
		{
			$sql2 = "INSERT INTO tbllogin (id,username,password,type,status,created) VALUE ('$logid','$uname','$converted_pword','$pos','$status','$logtime')";
			$result2 = mysqli_query($cn, $sql2);
			echo "<script>document.location = 'loginSuccessResident.php'</script>";
		}
		else
			{	
						echo "<script>document.location = 'loginFailed.php'</script>";

			}
			
	}

			
	}
	}	
else{

				echo "<script>document.location = 'loginFailed.php'</script>";
				
	

}


?>