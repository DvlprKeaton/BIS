<?php
include("condb.php");

	$lname_official = $_POST['lname_official'];
	$fname_official = $_POST['fname_official'];
	$mname_official = $_POST['mname_official'];
	$suffix_official = $_POST['suffix_official'];
	$position = $_POST['position'];
	$dob = $_POST['dob'];
	$cnum = $_POST['cnum'];
	$uname = $_POST['username'];
	$pword = $_POST['password'];
	$conpword = $_POST['conpassword'];

$sql = "SELECT * FROM tbluser where user_name = '$uname' AND Status = '1'";
$res = mysqli_query($cn, $sql);
if($res && mysqli_num_rows($res)>0)
{
  echo "<script>document.location = 'usernameAlready.php'</script>";
}else{

	$sql2 = "SELECT * FROM tbluser where position = '$position' AND Status = '1'";
	$res2 = mysqli_query($cn, $sql2);
	$row = mysqli_fetch_array($res2);

	if ($res2 && mysqli_num_rows($res2)>0) {
		?>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<script>
    window.addEventListener('load', function(){
        //Swal.fire("Login Success!", "Redirect to the dashboard", "success");
         //Swal.fire("Login Failed!", "Please Check your username & password", "error");

         Swal.fire({
          icon: 'error',
          title: 'Adding of Official Failed!',
          text: '<?php echo $position?> is already taken',
        }).then(function(){
            window.location = "official.php";
        })

    });
</script>

		<?php
		
	}else{

		if ($_POST['password'] === $_POST['conpassword']){

			$age = date_diff(date_create($dob), date_create('today'))->y;

			$hash_pword=password_hash($pword, PASSWORD_DEFAULT);

			$year = date("Y");
				$sql2 = "INSERT INTO tbluser (`lname`, `fname`, `mname`, `suffix`, `birthdate`, `age`, `position`, `mobile_number`, `user_name`, `user_password`, `Status`) VALUE ('$lname_official','$fname_official','$mname_official','$suffix_official','$dob','$age','$position','$cnum','$uname','$hash_pword','1')";
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
			          title: 'Successfully Created!',
			        }).then(function(){
			            window.location = "official.php";
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
			          title: 'Password is not the same!',
			        }).then(function(){
			            window.location = "official.php";
			        })

			    });
			</script>
<?php
	}
		
	}

	
}		

		
		
	

?>