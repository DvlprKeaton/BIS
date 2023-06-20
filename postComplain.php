<?php
include('condb.php');
	

	$user_id = $_POST['ID'];
	$comp = $_POST['complain'];

	date_default_timezone_set("Asia/Manila");
	$logtime = date("d/m/Y - l - h:i:sa");

	$sql1 = "INSERT INTO `complaintbl`(`user_id`, `remarks`, `complain_date`, `Status`) VALUES ('$user_id','$comp','$logtime','1')"; 
    $result1= mysqli_query($cn,$sql1);


   		echo "<script>alert('Complain posted!')</script>";
			echo "<script>window.location.href = 'profile.php'</script>";
	
	

?>