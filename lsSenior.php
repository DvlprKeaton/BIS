	<?php

	session_start();
	if(isset($_SESSION['userlogin'])){
		header ("Location: loginResident.php");
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION);
		header("Location: index.php");
	}
	//include 'DB/server.php';

	if (isset($_GET['id_msg'])) 
	{
		$main_id = $_GET['id_msg'];
		$sql_update = mysqli_query($db, "UPDATE tbl_msg SET msg_status=1 WHERE id_msg = '$main_id'");
	}

	//require('./read.php');

	include('includes/header.php');
	include('includes/navbar.php');
	?>

	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" />


	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
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

			    $sql = "SELECT * FROM tbl_msg WHERE msg_status=1 AND Status = 1"; 
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

             $sql = "SELECT * FROM tbl_msg WHERE msg_status=1 AND Status = 1"; 
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
	</ul>
	</nav>

	<!-- End of Topbar -->
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Residents</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="create.php" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" name="lname_resident" class="form-control" placeholder="Enter your last name" required>
						</div>
						<div class="form-group">
							<label>First Name</label>
							<input type="text" name="fname_resident" class="form-control" placeholder="Enter your first name" required>
						</div>
						<div class="form-group">
							<label>Middle Name</label>
							<input type="text" name="mname_resident" class="form-control" placeholder="Enter your middle name" required>
						</div>
						<div class="form-group">
							<label>Suffix</label>
							<input type="text" name="suffix_resident" class="form-control" placeholder="Enter suffix name" >
						</div>
						<div class="form-group">
							<label>Birthdate</label>
							<input type="date" name="birthdate_resident" class="form-control" placeholder="Select your birthdate" required>
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text">Gender</label>
							</div>
							<select name="gender" class="custom-select" id="inputGroupSelect01" required>
								<option selected>SELECT GENDER</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text">Purok</label>
							</div>
							<select name="purok" class="custom-select" id="inputGroupSelect01" required>
								<option selected>SELECT PUROK</option>
								<option value="PurokUno">Purok Uno</option>
								<option value="PurokDos">Purok Dos</option>
								<option value="PurokTres">Purok Tres</option>
								<option value="PurokKwatro">Purok Kwatro</option>
								<option value="PurokSinco">Purok Sinco</option>
								<option value="PurokSais">Purok Sais</option>
							</select>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text">Civil Status</label>
							</div>
							<select name="civil_status" class="custom-select" id="inputGroupSelect01" required>
								<option selected>SELECT CIVIL STATUS</option>
								<option value="Single">Single</option>
								<option value="Married">Married</option>
								<option value="Separated">Separated</option>
								<option value="Divorced">Divorced</option>
								<option value="Widowed">Widowed</option>
							</select>
						</div>
						<div class="form-group">
							<label>Nationality</label>
							<input type="text" name="nationality" class="form-control" placeholder="Enter your nationality" required>
						</div>

						<label>
	                      <label for="myfile">Upload Valid ID:</label>
	                      <br>
	                      <input type="file" id="myfile" name="myfile" required>
	                    </label>
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
				<h6 class="m-0 font-weight-bold text-primary">Residents Profile
					
				</h6>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>RESIDENT ID</th>
							<th>FULLNAME</th>
							<th>AGE</th>
							<th>GENDER</th>
							<th>PUROK</th>
							<th>VOTER STATUS</th>			
							<th>VALID ID</th>
							<th>CIVIL STATUS</th>
							<th>NATIONALITY</th>
							<th>VALIDATE VOTER</th>
						</tr>
					</thead>
					<?php 
						
						$sql = "SELECT * FROM tbl_resident WHERE Status = '1' AND age >= 60";
                  		$result = mysqli_query($cn, $sql);
                  		$row= mysqli_num_rows($result);
						while ($results = mysqli_fetch_array($result)) { ?>

						<tr>
							<td><?php echo $results ['id_resident'] ?></td>
							<td><?php echo $results ['lname_resident'], ", " , $results ['fname_resident'], " ", $results ['mname_resident'], " ", $results ['suffix_resident'] ?></td>
							<td><?php echo $results ['age'] ?></td>
							<td><?php echo $results ['gender'] ?></td>
							<td><?php echo $results ['purok'] ?></td>
							<td><?php echo $results ['voter_status'] ?></td>
							<?php
								if ($results['valid_id'] != null) {
			                    echo '<td><a href="idDownload.php?src='.$results['valid_id'].'">'.$results['valid_id'].'</a></td>';
			                  }else{
			                     echo "<td>ID was not Uploaded</td> ";
			                  }?>
										<td><?php echo $results ['civil_status'] ?></td>
							<td><?php echo $results ['nationality'] ?></td>
							<td>
								
							</td>
							<td>
								<form action="update.php" method="post">
									
									<input type="hidden" name="editId" value="<?php echo $results ['id_resident'] ?>">
									<input type="hidden" name="editlname_resident" value="<?php echo $results ['lname_resident'] ?>">
									<input type="hidden" name="editfname_resident" value="<?php echo $results ['fname_resident'] ?>">
									<input type="hidden" name="editmname_resident" value="<?php echo $results ['mname_resident'] ?>">
									<input type="hidden" name="editsuffix_resident" value="<?php echo $results ['suffix_resident'] ?>">
									<input type="hidden" name="editBirthdate_resident" value="<?php echo $results ['birthdate_resident'] ?>">
									<input type="hidden" name="editGender" value="<?php echo $results ['gender'] ?>">
									<input type="hidden" name="editPurok" value="<?php echo $results ['purok'] ?>">
									<input type="hidden" name="editCivilStatus" value="<?php echo $results ['civil_status'] ?>">
									<input type="hidden" name="editNationality" value="<?php echo $results ['nationality'] ?>">
								</form>

							</td>
							<td>
								<form action="delete.php" method="post">
									
								</form>
							</td>

						</tr>
					<?php } ?>
				</table>
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