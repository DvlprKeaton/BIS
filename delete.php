<?php

include("condb.php");


if (isset($_POST['delete'])) {
	$deleteId = $_POST['deleteId'];

	$queryDelete = "UPDATE tbl_resident SET Status = '0' WHERE id_resident = $deleteId";
	$sqlDelete = mysqli_query($cn, $queryDelete);
	echo "<script>alert('Successfully deleted!')</script>";
	echo "<script>window.location.href = 'resident.php'</script>";
} else {
	echo "<script>window.location.href = 'resident.php'</script>";
}
?>