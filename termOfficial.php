	<?php

	session_start();
	if(isset($_SESSION['userlogin'])){
		header ("Location: loginResident.php");
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION);
		header("Location:index.php");
	}
	
include("condb.php");


	if (isset($_GET['id_msg'])) 
	{
		$main_id = $_GET['id_msg'];
		$sql_update = mysqli_query($cn, "UPDATE tbl_msg SET msg_status=1 WHERE id_msg = '$main_id'");
	}

	//require('./readOfficial.php');

	include('includes/header.php');
	include('includes/navbar.php');
	?>
	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" />


	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">
		<div id="content">
			<!-- Topbar -->
			<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

				<!-- Sidebar Toggle (Topbar) -->
				<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
					<i class="fa fa-bars"></i>
				</button>



				<!-- Topbar Navbar -->
				<ul class="navbar-nav ml-auto">

					<!-- Nav Item - Search Dropdown (Visible Only XS) -->
					<li class="nav-item dropdown no-arrow d-sm-none">
						<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-search fa-fw"></i>
					</a>
				</li>
				<?php

			    include("condb.php");

			    $sql = "SELECT * FROM tbl_msg WHERE msg_status=1 AND Status = '1'"; 
			    $result= mysqli_query($cn,$sql);
			    $row= mysqli_num_rows($result);
			    ?>

				<li class="nav-item dropdown no-arrow mx-1">
					<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-envelope fa-fw"></i>
						<span class="badge badge-danger badge-counter"> <?php echo $row; ?></span>
					</a>
					<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
					aria-labelledby="alertsDropdown">
					<h6 class="dropdown-header">Request</h6>
					<a class="dropdown-item d-flex align-items-center" href="#">
						<div class="mr-3">
							<?php

             $sql = "SELECT * FROM tbl_msg WHERE msg_status=1 AND Status = '1'"; 
              $result= mysqli_query($cn,$sql);
              $row= mysqli_num_rows($result);

            
            if ($row= mysqli_num_rows($result)>0)
             {
              
              while ($res= mysqli_fetch_assoc($result))
              {
                 echo '<a class= "dropdown-item text-primary font-weight-bold" href= "read_msg.php?category=all">'.$res['message'].'</a>';
                 echo '<div class= "dropdown-divider"></div>';
              }
            }
            else{
              echo '<a class= "dropdown-item text-danger font-weight-bold" href= "read_msg.php?category=all"> There are no messages here!</a>';
            }
          ?>
						</div>
					</a>
				</div>
			</li>
			<div class="topbar-divider d-none d-sm-block"></div>

			
			<li class="nav-item dropdown no-arrow">
				<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
				data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="mr-2 d-none d-lg-inline text-gray-600 small">
					<?php  
      echo ($_SESSION['logun']); ?>
				</span>
				<img src="img/admin.png" class="img-profile rounded-circle">
			</a>
			<!-- Dropdown - User Information -->
			<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
			aria-labelledby="userDropdown">
			<a class="dropdown-item" href="index.php">
				<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
				Logout
			</a>
		</div>
	</li>

</ul>

</nav>
<!-- End of Topbar -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Officials</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="createOfficials.php" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" name="lname_official" class="form-control" placeholder="Enter your last name" required>
					</div>
					<div class="form-group">
						<label>First Name</label>
						<input type="text" name="fname_official" class="form-control" placeholder="Enter your First name" required>
					</div>
					<div class="form-group">
						<label>Middle Name</label>
						<input type="text" name="mname_official" class="form-control" placeholder="Enter your Middle name" required>
					</div>
					<div class="form-group">
						<label>Suffix</label>
						<input type="text" name="suffix_official" class="form-control" placeholder="Enter suffix name">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text">Position</label>
						</div>
						<select name="position" class="custom-select" id="inputGroupSelect01">
							<option value=" "> </option>
							<option value="PunongBarangay">Punong Barangay</option>
							<option value="Kagawad">Kagawad</option>
							<option value="Secretary">Secretary</option>
							<option value="Treasurer">Treasurer</option>
							<option value="Treasurer">SK Chairman</option>
							<option value="Treasurer">Tanod</option>
						</select>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" name="create" class="btn btn-primary"> SAVE</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="userModaL" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add User</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="createUser.php" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" name="lname_official" class="form-control" placeholder="Enter your last name" required>
					</div>
					<div class="form-group">
						<label>First Name</label>
						<input type="text" name="fname_official" class="form-control" placeholder="Enter your First name" required>
					</div>
					<div class="form-group">
						<label>Middle Name</label>
						<input type="text" name="mname_official" class="form-control" placeholder="Enter your Middle name" required>
					</div>
					<div class="form-group">
						<label>Suffix</label>
						<input type="text" name="suffix_official" class="form-control" placeholder="Enter suffix name">
					</div>
					<div class="col-6">
             <label for="">Date of Birth</label>
                          <input type="date" name ="dob" class="form-control" required="">
                        </div>
          <div class="col-12">
                                  <label for="">Contact #</label>
                          <input type="text" id ="cnum" name ="cnum" class="form-control" placeholder="Contact Number">
                        </div>
           <div class="col-6">
                                  <label for="">Username</label>
                          <input type="text" name = "username" pattern="[A-Za-z0-9]+" class="form-control" placeholder="Enter Username" required>
                        </div>
                        <div class="col-6">
                                  <label for="">Password</label>
                          <input type="password" name ="password" class="form-control" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"required>
                        </div>
                        <div class="col-6">
                                  <label for="">Confirm Password</label>
                          <input type="password" name ="conpassword" class="form-control" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"required>
                        </div>
                        <hr>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text">Position</label>
						</div>
						<select name="position" class="custom-select" id="inputGroupSelect01">
							<option value=" "> </option>
							<option value="Punong Barangay">Punong Barangay</option>
							<option value="Secretary">Secretary</option>
						</select>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" name="create" class="btn btn-primary"> SAVE</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Officials Profile
				
			</h6>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>OFFICIAL ID</th>
						<th>FULLNAME</th>
						<th>POSITION</th>
						<th>START TERM</th>
						<th>END TERM</th>

					</tr>
				</thead>
				<?php 

						date_default_timezone_set("Asia/Manila");
						$year = date('Y');
						$sql = "SELECT * FROM tbl_official WHERE Status = '1' AND eTerm < $year";
						$res = mysqli_query($cn, $sql);
						while ($results = mysqli_fetch_array($res)) { ?>
					<tr>
						<td><?php echo $results ['id_official']?></td>
						<td><?php echo $results ['lname_official'], ", ", $results ['fname_official'], " ", $results ['mname_official'], " ", $results ['suffix_official'] ?></td>
						<td><?php echo $results ['position'] ?></td>
							<td><?php echo $results ['sTerm'] ?></td>
								<td><?php echo $results ['eTerm'] ?></td>

						<td>

							<form action="updateOfficial.php" method="post">
								
								<input type="hidden" name="editIdOfficial" value="<?php echo $results ['id_official'] ?>">
								<input type="hidden" name="editlname_official" value="<?php echo $results ['lname_official'] ?>">
								<input type="hidden" name="editfname_official" value="<?php echo $results ['fname_official'] ?>">
								<input type="hidden" name="editmname_official" value="<?php echo $results ['mname_official'] ?>">
								<input type="hidden" name="editsuffix_official" value="<?php echo $results ['suffix_official'] ?>">
								<input type="hidden" name="editPosition" value="<?php echo $results ['position'] ?>">
							</form>

						</td>
						<td>
							
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>

		</div>
	</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>  
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>  
	$(document).ready(function(){  
		$('#dataTable').DataTable();  
	});  
</script>
<?php 

include ('includes/footer.php');

?>
