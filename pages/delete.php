<?php
require('./database.php');

if (isset($_POST['delete'])) {
	$deleteId = $_POST['deleteId'];

	$queryDelete = "DELETE FROM tbl_resident WHERE id_resident = $deleteId";
	$sqlDelete = mysqli_query($connection, $queryDelete);
	echo "<script>alert('Successfully deleted!')</script>";
	echo "<script>window.location.href = '/BarangayInfoSystem/Admin/sidebar/resident.php'</script>";
} else {
	echo "<script>window.location.href = '/BarangayInfoSystem/Admin/sidebar/resident.php'</script>";
}
?>