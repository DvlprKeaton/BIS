<?php
include("condb.php");

if (isset($_POST['create'])) {
	$lname_resident = $_POST['lname_resident'];
	$fname_resident = $_POST['fname_resident'];
	$mname_resident = $_POST['mname_resident'];
	$suffix_resident = $_POST['suffix_resident'];
	$birthdate_resident = $_POST['birthdate_resident'];
	$gender = $_POST['gender'];
	$purok = $_POST['purok'];
	$civil_status = $_POST['civil_status'];
	$nationality = $_POST['nationality'];

	$pname = rand(1000,10000)."-".$_FILES["myfile"]["name"];

	$tname = $_FILES["myfile"]["tmp_name"];

	$uploads_dir = 'id';

	move_uploaded_file($tname, $uploads_dir.'/'.$pname);

	$age = date_diff(date_create($birthdate_resident), date_create('today'))->y;
	
	//echo $age;

	$sql = "INSERT INTO tbl_resident (`lname_resident`, `fname_resident`, `mname_resident`, `suffix_resident`, `birthdate_resident`, `age`, `gender`, `purok`, `civil_status`, `nationality`, `Status`, `valid_id`) VALUE ('$lname_resident', '$fname_resident', '$mname_resident', '$suffix_resident', '$birthdate_resident','$age', '$gender', '$purok', '$civil_status', '$nationality','1','$pname')";
			$result = mysqli_query($cn, $sql);
	echo "<script>alert('Successfully created!')</script>";
	echo "<script>window.location.href = 'resident.php'</script>";
} else {
	echo "<script>window.location.href = 'resident.php'</script>";
}
?>