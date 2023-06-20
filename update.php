					<?php
					include("condb.php");

					if (isset($_POST['edit'])) {
						$editId = $_POST['editId'];
						$editlname_resident = $_POST['editlname_resident'];
						$editfname_resident = $_POST['editfname_resident'];
						$editmname_resident = $_POST['editmname_resident'];
						$editsuffix_resident = $_POST['editsuffix_resident'];
						$editBirthdate_resident = $_POST['editBirthdate_resident'];
						$editGender = $_POST['editGender'];
						$editPurok = $_POST['editPurok'];
						$editCivilStatus = $_POST['editCivilStatus'];
						$editNationality = $_POST['editNationality'];
					}

					if (isset($_POST['update'])) {
						$updateId = $_POST['updateId'];
						$updatelname_resident = $_POST['updatelname_resident'];
						$updatefname_resident = $_POST['updatefname_resident'];
						$updatemname_resident = $_POST['updatemname_resident'];
						$updatesuffix_resident = $_POST['updatesuffix_resident'];
						$updateBirthdate_resident = $_POST['updateBirthdate_resident'];
						$updateGender = $_POST['updateGender'];
						$updatePurok = $_POST['updatePurok'];
						$updateVoterStatus = $_POST['updateVoterStatus'];
						$updateCivilStatus = $_POST['updateCivilStatus'];
						$updateNationality = $_POST['updateNationality'];


						$age = date_diff(date_create($updateBirthdate_resident), date_create('today'))->y;

						$queryUpdate = "UPDATE tbl_resident SET lname_resident = '$updatelname_resident',fname_resident = '$updatefname_resident' , mname_resident = '$updatemname_resident' , suffix_resident = '$updatesuffix_resident' , birthdate_resident = '$updateBirthdate_resident', age = '$age', gender = '$updateGender', purok = '$updatePurok', voter_status = '$updateVoterStatus', civil_status = '$updateCivilStatus', nationality = '$updateNationality' WHERE id_resident = '$updateId'";
						$sqlUpdate = mysqli_query($cn, $queryUpdate);
						echo "<script>alert('Successfully updated!')</script>";
						echo "<script>window.location.href = 'resident.php'</script>";
					}

					?>
					<?php
include('includes/header.php');
include('includes/navbar.php');
?>
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

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
						
							<form action="update.php" method="post">
							<h4>UPDATE RESIDENTS</h4>
							<div class="mb-3">
    						<label  class="form-label">Last Name</label>
							<input type="text" name="updatelname_resident" class="form-control" placeholder="Enter your last name" value = "<?php echo $editlname_resident ?>" required>
							</div>
							<div class="mb-3">
    						<label  class="form-label">First Name</label>
							<input type="text" name="updatefname_resident" class="form-control" placeholder="Enter your first name" value = "<?php echo $editfname_resident ?>" required>
							</div>
							<div class="mb-3">
    						<label  class="form-label">Middle Name</label>
							<input type="text" name="updatemname_resident" class="form-control" placeholder="Enter your middle name" value = "<?php echo $editmname_resident ?>" required>
							</div>
							<div class="mb-3">
    						<label  class="form-label">Suffix</label>
							<input type="text" name="updatesuffix_resident" class="form-control" placeholder="Enter your suffix" value = "<?php echo $editsuffix_resident ?>" >
							</div>
							<div class="mb-3">
    						<label  class="form-label">Birthdate</label>
							<input type="date" name="updateBirthdate_resident" class="form-control" placeholder="Select your birthdate" value = "<?php echo $editbirthdate_resident ?>" required>
							</div>
							<div class="mb-3">
    						<label  class="form-label">Gender</label>
							<select name="updateGender" class="form-control" value = "<?php echo $editGender ?>" required>
							<option value=" "> <?php echo $editGender ?></option>
							<option value="male">Male</option>
							<option value="female"> Female </option>
							</select>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text">Purok</label>
								</div>
								<select name="updatePurok" class="custom-select" value = "<?php echo $editPurok ?>" id="inputGroupSelect01">
									<option selected><?php echo $editPurok ?></option>
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
								<select name="updateCivilStatus" class="custom-select" value = "<?php echo $editCivilStatus ?>" id="inputGroupSelect01">
									<option selected><?php echo $editCivilStatus ?></option>
									<option value="Single">Single</option>
									<option value="Married">Married</option>
									<option value="Separated">Separated</option>
									<option value="Divorced">Divorced</option>
									<option value="Widowed">Widowed</option>
								</select>
							</div>
							<div class="mb-3">
    						<label  class="form-label">Nationality</label>
							<input type="text" name="updateNationality" class="form-control" placeholder="Enter your Nationality" value = "<?php echo $editNationality ?>" required>
							</div>
							<button type="submit" class="btn btn-outline-primary" name="update">Update</button>
							<input type="hidden" name="updateId" value = "<?php echo $editId ?>"/>
							<button class="btn btn-danger" type="cancel" onclick="window.location='resident.php';return false;">Cancel</button>
							
							</form>
					</div>

