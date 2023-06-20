<?php

include("condb.php");
session_start();

$logid = $_SESSION['logid'];

$sql = "SELECT * FROM tbl_msg where sender_id = '$logid' AND msg_status = '0'";
$res = mysqli_query($cn, $sql);
$row = mysqli_fetch_array($res);
	$sql2 = "SELECT * FROM tbluser where user_id = '$logid' AND Status = '1'";
	$res2 = mysqli_query($cn, $sql2);
	$row2 = mysqli_fetch_array($res2);
	$fname = $row2['user_name'];
	date_default_timezone_set("Asia/Manila");
	$logtime = date("d/m/Y - l - h:i:sa");

		$sql2 = "INSERT INTO `tbl_msg`(`sender_id`, `sender_name`, `message`, `msg_status`, `msg_date`,`ClearRequest`,`Status`,`RequestType`) VALUES ('$logid','$fname','Hello, I want to request for a Barangay Clearance','1','$logtime','1','1','Clearance')";
	$result = mysqli_query($cn, $sql2);

?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
						<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
						<script>
						    window.addEventListener('load', function(){
						        //Swal.fire("Login Success!", "Redirect to the dashboard", "success");
						         //Swal.fire("Login Failed!", "Please Check your username & password", "error");

						         Swal.fire({
						          icon: 'success',
						          title: 'Request sent successfully!',
						        }).then(function(){
						            window.location = "profile.php";
						        })

						    });
						</script>