<?php

include ("condb.php");


$ID = $_POST['deleteIdOfficial'];

$sql = "SELECT * from tbl_official WHERE Status='1' AND id_official ='$ID'";
$result = mysqli_query($cn,$sql);
$row= mysqli_num_rows($result);
$res = mysqli_fetch_array($result);



if ($row>0) {
$sql = "UPDATE tbl_official SET Status = '0' WHERE id_official = '$ID'";
$res = mysqli_query($cn, $sql);
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
			<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
			<script>
			    window.addEventListener('load', function(){
			        //Swal.fire("Login Success!", "Redirect to the dashboard", "success");
			         //Swal.fire("Login Failed!", "Please Check your username & password", "error");

			         Swal.fire({
			          icon: 'success',
			          title: 'Removed Successfully!',
			        }).then(function(){
			            window.location = "aofficial.php";
			        })

			    });
			</script>
<?php
}else {
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
			            window.location = "aofficial.php";
			        })

			    });
			</script>
<?php
}


?>