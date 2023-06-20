<?php
include('condb.php');
	

	$user_id = $_POST['ID'];
	$lname = $_POST['lname'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$uname = $_POST['uname'];
	$cnum = $_POST['cnum'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$purok = $_POST['purok'];
	$civil_status = $_POST['civil_status'];
	$nationality = $_POST['nationality'];

	$pname = rand(1000,10000)."-".$_FILES["myfile"]["name"];

	$tname = $_FILES["myfile"]["tmp_name"];

	$uploads_dir = 'id';

	move_uploaded_file($tname, $uploads_dir.'/'.$pname);

	$age = date_diff(date_create($dob), date_create('today'))->y;


	$sql = "UPDATE `tbluser` SET `lname`='$lname',`fname`='$fname',`mname`='$mname',`birthdate`='$dob',`age`='$age',`position`='Resident',`mobile_number`='$cnum',`user_name`='$uname' WHERE user_id = '$user_id'";
	$result = mysqli_query($cn, $sql);

    $queryUpdate = "UPDATE tbl_msg SET ProfRequest = '0', Status = '0' WHERE sender_id = '$user_id' AND ProfRequest = '2' AND Status = '0'";
    $sqlUpdate = mysqli_query($cn, $queryUpdate);

	$sql1 = "SELECT * FROM tbl_resident WHERE user_id = '$user_id'"; 
    $result1= mysqli_query($cn,$sql1);
    $row1= mysqli_num_rows($result1);
    $res1= mysqli_fetch_assoc($result1);

    if ($row1>0) {
    	$queryUpdate = "UPDATE `tbl_resident` SET `lname_resident`='$lname',`fname_resident`='$fname',`mname_resident`='$mname',`birthdate_resident`='$dob',`age`='$age',`gender`='$gender',`purok`='$purok',`voter_status`='0',`civil_status`='$civil_status',`nationality`='$nationality',`Status`='1',`valid_id`='$pname' WHERE user_id = '$user_id'";
   		$sqlUpdate = mysqli_query($cn, $queryUpdate);

   		$message = $fname . ' ,Profile Updated Successfully!';

   		date_default_timezone_set("Asia/Manila");
		$logtime = date("d/m/Y - l - h:i:sa");

   		$sql2 = "INSERT INTO `tbl_msg`(`sender_id`, `sender_name`, `message`, `msg_status`, `msg_date`,`ProfRequest`,`Status`) VALUES ('$logid','$fname','$message','0','$logtime','1','1')";
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
						          title: 'Successfully Updated!',
						        }).then(function(){
						            window.location = "profile.php";
						        })

						    });
						</script>
						<?php
    }else{
    	$sql = "INSERT INTO `tbl_resident`(`user_id`, `lname_resident`, `fname_resident`, `mname_resident`, `birthdate_resident`, `age`, `gender`, `purok`, `voter_status`, `civil_status`, `nationality`, `Status`, `valid_id`) VALUES ('$user_id','$lname','$fname','$mname','$dob','$age','$gender','$purok','0','$civil_status','$nationality','1','$pname')";
			$result = mysqli_query($cn, $sql);
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
						<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
						<script>
						    window.addEventListener('load', function(){
						        //Swal.fire("Login Success!", "Redirect to the dashboard", "success");
						         //Swal.fire("Login Failed!", "Please Check your username & password", "error");

						         Swal.fire({
						          icon: 'success',
						          title: 'Successfully created!',
						        }).then(function(){
						            window.location = "clearance.php";
						        })

						    });
						</script>
						<?php
    }
	


	
	
	

?>