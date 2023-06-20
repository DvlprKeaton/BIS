<?php
include('condb.php');
	

	$user_id = $_POST['ID'];

	$sql1 = "SELECT * FROM complaintbl WHERE user_id = '$user_id'"; 
    $result1= mysqli_query($cn,$sql1);
    $row1= mysqli_num_rows($result1);
    $res1= mysqli_fetch_assoc($result1);

    if ($row1>0) {
    	$queryUpdate = "UPDATE complaintbl SET Status='0' WHERE user_id = '$user_id'";
   		$sqlUpdate = mysqli_query($cn, $queryUpdate);
   		?>

   		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<script>
    window.addEventListener('load', function(){
        //Swal.fire("Login Success!", "Redirect to the dashboard", "success");
         //Swal.fire("Login Failed!", "Please Check your username & password", "error");

         Swal.fire({
          icon: 'success',
          title: 'Complain Setteled!',
        }).then(function(){
            window.location = "lscomplain.php";
        })

    });
</script>
<?php
    }else{
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
            window.location = "Profile.php";
        })

    });
</script>
	<?php		
    }
	


	
	
	

?>