<?php

include("condb.php");

session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$conpassword = $_POST['conpassword'];
$cnum = $_POST['cnum'];
	$lname = $_POST['lname'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$purok = $_POST['purok'];
	$civil_status = $_POST['civil_status'];
	$nationality = $_POST['nationality'];

$_SESSION['regGender'] = $gender = $_POST['gender'];
$_SESSION['regPurok'] = $purok = $_POST['purok'];
$_SESSION['regCivil_status'] = $gender = $_POST['civil_status'];
$_SESSION['regNationality'] = $purok = $_POST['nationality'];

$sql = "SELECT * FROM usertbl where user_name = '$username' AND Status = '1'";
$res = mysqli_query($cn, $sql);

$vkey = rand(1000,9999);

	$pname = rand(1000,10000)."-".$_FILES["myfile"]["name"];

	$tname = $_FILES["myfile"]["tmp_name"];

	$uploads_dir = 'id';

	move_uploaded_file($tname, $uploads_dir.'/'.$pname);

	$age = date_diff(date_create($dob), date_create('today'))->y;


$_SESSION['regValidID'] = $pname = $_POST['pname'];

if($res && mysqli_num_rows($res)>0)
{
  echo "<script>document.location = 'usernameAlready.php'</script>";
}else{
			if ($_POST['password'] === $_POST['conpassword']){

				//##########################################################################
					// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
					// Visit www.itexmo.com/developers.php for more info about this API
					//##########################################################################

					function itexmo($number,$message,$apicode,$passwd){
							$url = 'https://www.itexmo.com/php_api/api.php';
							$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
							$param = array(
								'http' => array(
									'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
									'method'  => 'POST',
									'content' => http_build_query($itexmo),
								),
							);
							$context  = stream_context_create($param);
							return file_get_contents($url, false, $context);
					}
					//##########################################################################

					$result = itexmo($cnum, $vkey, 'TR-KIMJE041874_5ZJQZ', ']hc4p8yjzf');
					if ($result == ""){
					echo "iTexMo: No response from server!!!
					Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
					Please CONTACT US for help. ";	
					}else if ($result == 0){


						$hash_pword=password_hash($password, PASSWORD_DEFAULT);

						$year = date("Y");
							$sql2 = "INSERT INTO `tbluser`(`lname`, `fname`, `mname`, `birthdate`, `age`, `position`, `mobile_number`, `user_name`, `user_password`, `Status`, `VerificationCode`) VALUES ('$lname','$fname','$mname','$dob','$age','Resident','$cnum','$username','$hash_pword','1','$vkey')";
						$result = mysqli_query($cn, $sql2);
						
							echo "<script>alert('Successfully created!')</script>";
							echo "<script>window.location.href = 'OTP.php'</script>";

				}
					else{	
					echo "Error Num ". $result . " was encountered!";
					}
				}
				else {
					function myAlert1($msg, $url){
					echo '<script language="javascript">alert("'.$msg.'");</script>';
					echo "<script>document.location = '$url'</script>";
					}
					myAlert1("Password Did Not Match!", "login.php");
				}
	}

?>