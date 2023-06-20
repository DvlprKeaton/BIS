<?php
include("condb.php");

if (isset($_POST['create'])) {
	$lname_official = $_POST['lname_official'];
	$fname_official = $_POST['fname_official'];
	$mname_official = $_POST['mname_official'];
	$suffix_official = $_POST['suffix_official'];
	$position = $_POST['position'];

	date_default_timezone_set("Asia/Manila");
	$sTerm = date('Y');
	$eTerm = date('Y',strtotime(' + 3 years'));
	


	$queryCreateOfficials = "INSERT INTO `tbl_official`(`lname_official`, `fname_official`, `mname_official`, `suffix_official`, `position`, `Status`,`sTerm`,`eTerm`) VALUES ('$lname_official','$fname_official','$mname_official','$suffix_official','$position','1','$sTerm','$eTerm')";
	$sqlCreateOfficials = mysqli_query($cn, $queryCreateOfficials);
	echo "<script>alert('Successfully created!')</script>";
	echo "<script>window.location.href = 'aofficial.php'</script>";
} else {
	echo "<script>window.location.href = 'aofficial.php'</script>";
}
?>