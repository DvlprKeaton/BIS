<?php

include ("condb.php");

if (isset($_POST['delete'])) {
	$deleteId = $_POST['deleteId'];

	$sql2 = "UPDATE tbl_resident SET voter_status = 'Validated' WHERE id_resident ='$deleteId'";
	$res = mysqli_query($cn, $sql2);

	?>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
						<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
						<script>
						    window.addEventListener('load', function(){
						        //Swal.fire("Login Success!", "Redirect to the dashboard", "success");
						         //Swal.fire("Login Failed!", "Please Check your username & password", "error");

						         Swal.fire({
						          icon: 'success',
						          title: 'Voter Validated!',
						        }).then(function(){
						            window.location = "resident.php";
						        })

						    });
						</script>
						<?php
} else {
	?>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
						<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
						<script>
						    window.addEventListener('load', function(){
						        //Swal.fire("Login Success!", "Redirect to the dashboard", "success");
						         //Swal.fire("Login Failed!", "Please Check your username & password", "error");

						         Swal.fire({
						          icon: 'error',
						          title: 'Transaction Failed!',
						        }).then(function(){
						            window.location = "resident.php";
						        })

						    });
						</script>
						<?php
}	





?>