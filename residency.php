	<?php

	session_start();
	  if(isset($_SESSION['login'])){
	    header ("Location: login.php");
	  }

	  if (isset($_GET['logout'])) {
	    session_destroy();
	    unset($_SESSION);
	    header("Location: /BarangayInfoSystem/firstpage/page.php");
	  }

	//require('./read.php');

	include("condb.php");
	include('includes/header.php');
	include('includes/navbar.php');
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
	<script src="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"></script>  
	<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>            
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" />

	<!-- Content Wrapper -->
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
					<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-search fa-fw"></i>
				</a>
				<?php 

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
				              echo '<a class= "dropdown-item text-danger font-weight-bold" href= "read_msg.php"> There are no messages here!</a>';
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
			<a class="dropdown-item" href="index.php?logout=true">
				<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
				Logout
			</a>
			</div>
			</li>
			</ul>
	</nav>
	<!-- End of Topbar -->
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>RESIDENT ID</th>
						<th>FULLNAME</th>
						<th>BIRTHDATE</th>
						<th>AGE</th>
						<th>GENDER</th>
						<th>PUROK</th>
						<th>VOTER STATUS</th>
						<th>CIVIL STATUS</th>
						<th>NATIONALITY</th>
						<th>PRINT</th>
						<th>SEND</th>
					</tr>
				</thead>
				<?php $logid = $_SESSION['logid'];
					$sql = "SELECT * FROM tbl_resident WHERE Status = '1'";
                  		$result = mysqli_query($cn, $sql);
					while ($results = mysqli_fetch_array($result)) { ?>

					<tr>
						<td><?php echo $results ['id_resident'] ?></td>
						<td><?php echo $results ['lname_resident'], ", ", $results ['fname_resident'], " ", $results ['mname_resident'], " ", $results ['suffix_resident'] ?></td>
						<td><?php echo $results ['birthdate_resident'] ?></td>
						<td><?php echo $results ['age'] ?></td>
						<td><?php echo $results ['gender'] ?></td>
						<td><?php echo $results ['purok'] ?></td>
						<td><?php echo $results ['voter_status'] ?></td>
						<td><?php echo $results ['civil_status'] ?></td>
						<td><?php echo $results ['nationality'] ?></td>
						<td>
							<form action="pdfResidency.php" method="post">
								<button type="submit" class="btn btn-primary" name="generate"> <i class="fas fa-print"></i></button> 
								<input type="hidden" name="editId" value="<?php echo $results ['id_resident'] ?>">
								<input type="hidden" name="editlname_resident" value="<?php echo $results ['lname_resident'] ?>">
								<input type="hidden" name="editfname_resident" value="<?php echo $results ['fname_resident'] ?>">
								<input type="hidden" name="editmname_resident" value="<?php echo $results ['mname_resident'] ?>">
								<input type="hidden" name="editsuffix_resident" value="<?php echo $results ['suffix_resident'] ?>">
								<input type="hidden" name="editBirthdate_resident" value="<?php echo $results ['birthdate_resident'] ?>">
								<input type="hidden" name="editAge" value="<?php echo $results ['age'] ?>">
								<input type="hidden" name="editGender" value="<?php echo $results ['gender'] ?>">
								<input type="hidden" name="editPurok" value="<?php echo $results ['purok'] ?>">
								<input type="hidden" name="editVoterStatus" value="<?php echo $results ['voter_status'] ?>">
								<input type="hidden" name="editCivilStatus" value="<?php echo $results ['civil_status'] ?>">
								<input type="hidden" name="editNationality" value="<?php echo $results ['nationality'] ?>">
							</form>

						</td>
						<form action="uploadResidency.php" method="post" enctype="multipart/form-data">
					<td>
						<input hidden type="text" name="ID" value="<?php echo $results ['id_resident'] ?>">
						<label>
                        <label for="myfile">Upload Certificate of Residency:</label>
                        <br>
                        <input type="file" id="myfile" name="myfile" required>


                      </label>
						
					</td>
					<td>
						<button type="submit" class="btn btn-success" name="generate"> <i class="fa fa-upload"></i></button> 
					</td>
					</form>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
	<script>  
	$(document).ready(function(){  
		$('#dataTable').DataTable();  
	});  
</script> 
	<?php
	include('includes/footer.php');
	?>
