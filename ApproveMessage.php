<?php

include("condb.php");
session_start();

echo $msg_id = $_POST['approve_msgid'];

$sql = "SELECT * FROM tbl_msg where id_msg = '$msg_id'";
$res = mysqli_query($cn, $sql);
$row = mysqli_fetch_array($res);
if($res && mysqli_num_rows($res)>0)
{
		if ($row['ProfRequest'] == '1') {
			$queryUpdate = "UPDATE tbl_msg SET ProfRequest = '2', ReqReply = 'You can now Update Your Profile!', Status = '0' WHERE id_msg = '$msg_id'";
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
						          title: 'Message Sent!',
						          text: 'Profile Update Request Approved!',
						        }).then(function(){
						            window.location = "read_msg.php?category=all";
						        })

						    });
						</script>
						<?php
		}else if ($row['ClearRequest'] == '1') {
			$queryUpdate = "UPDATE tbl_msg SET ClearRequest = '2', ReqReply = 'Your barangay clearance request was approved!', Status = '0' WHERE id_msg = '$msg_id'";
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
						          title: 'Message Sent!',
						          text: 'Clearance Request Approved!',
						        }).then(function(){
						            window.location = "read_msg.php?category=all";
						        })

						    });
						</script>
		<?php
		}else if ($row['IndiRequest'] == '1') {
			$queryUpdate = "UPDATE tbl_msg SET IndiRequest = '2', ReqReply = 'Your certificate of indigency request was approved!', Status = '0' WHERE id_msg = '$msg_id'";
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
						          title: 'Message Sent!',
						          text: 'Indigency Request Approved',
						        }).then(function(){
						            window.location = "read_msg.php?category=all";
						        })

						    });
						</script>
						<?php
		}else if ($row['ResiRequest'] == '1') {
			$queryUpdate = "UPDATE tbl_msg SET ResiRequest = '2', ReqReply = 'Your certificate of residency request was approved!', Status = '0' WHERE id_msg = '$msg_id'";
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
						          title: 'Message Sent!',
						          text: 'Residency Request Approved!',
						        }).then(function(){
						            window.location = "read_msg.php?category=all";
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
						          title: 'Message not sent!',
						          text: 'Please try again later!',
						        }).then(function(){
						            window.location = "read_msg.php?category=all";
						        })

						    });
						</script>
<?php
		}
		
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
						          title: 'Message not sent!',
						          text: 'Please try again later!',
						        }).then(function(){
						            window.location = "read_msg.php?category=all";
						        })

						    });
						</script>
						<?php
}

?>