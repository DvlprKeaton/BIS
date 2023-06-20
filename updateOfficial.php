					<?php
					
include("condb.php");


					if (isset($_POST['edit'])) {
						$editIdOfficial = $_POST['editIdOfficial'];
						$editlname_official = $_POST['editlname_official'];
                        $editfname_official = $_POST['editfname_official'];
                        $editmname_official = $_POST['editmname_official'];
                        $editsuffix_official = $_POST['editsuffix_official'];
						$editPosition = $_POST['editPosition'];
						
					}

					if (isset($_POST['update'])) {
						echo $updateIdOfficial = $_POST['updateIdOfficial'];
						echo $updatelname_official = $_POST['updatelname_official'];
                        echo $updatefname_official = $_POST['updatefname_official'];
                        echo $updatemname_official = $_POST['updatemname_official'];
                        echo $updatesuffix_official = $_POST['updatesuffix_official'];

						echo $updatePosition = $_POST['updatePosition'];


						$queryUpdateOfficial = "UPDATE `tbl_official` SET `lname_official`='$updatelname_official',`fname_official`='$updatefname_official',`mname_official`='$updatemname_official',`suffix_official`='$updatesuffix_official',`position`='$updatePosition' WHERE id_official = '$updateIdOfficial'";
						$sqlUpdate = mysqli_query($cn, $queryUpdateOfficial);
                        ?>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
                        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
                        <script>
                            window.addEventListener('load', function(){
                                //Swal.fire("Login Success!", "Redirect to the dashboard", "success");
                                 //Swal.fire("Login Failed!", "Please Check your username & password", "error");

                                 Swal.fire({
                                  icon: 'success',
                                  title: 'Successfully Updated!',
                                  text: 'Profile Update Request',
                                }).then(function(){
                                    window.location = "aofficial.php";
                                })

                            });
                        </script>
                        <?php
					}

					?>
<?php
include('includes/header.php');
include('includes/capt_navbar.php');
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

<form action="updateOfficial.php" method="post">
	<h4>UPDATE OFFICIAL</h4>
  <div class="mb-3">
    <label  class="form-label">First name</label>
    <input type="text"  name="updatefname_official" class="form-control" placeholder="Enter your First name" value = "<?php echo $editfname_official ?>" required>
  </div>
  <div class="mb-3">
    <label  class="form-label">Last name</label>
    <input type="text"  name="updatelname_official" class="form-control" placeholder="Enter your Last name" value = "<?php echo $editlname_official ?>" required>
  </div>
  <div class="mb-3">
    <label  class="form-label">Middle name</label>  
    <input type="text"  name="updatemname_official" class="form-control" placeholder="Enter your Middle Name" value = "<?php echo $editmname_official ?>" >
  </div>
  <div class="mb-3">
    <label  class="form-label">Suffix name</label>
    <input type="text"  name="updatesuffix_official" class="form-control" placeholder="Suffix" value = "<?php echo $editsuffix_official ?>">
  </div>
  <div class="mb-3">
    <label class="input-group-text">Position</label>
						</div>
						<select name="updatePosition" class="custom-select" id="inputGroupSelect01" value = "<?php echo $editPosition ?>">
							<option value=" "><?php echo $editPosition ?></option>
							<option value="Punong Barangay">Punong Barangay</option>
							<option value="Kagawad">Kagawad</option>
							<option value="Secretary">Secretary</option>
							<option value="Treasurer">Treasurer</option>
                            <option value="Tanod">Tanod</option>
                            <option value="SK Chairman">SK Chairman</option>
						</select>
  </div>

 	<br>
    <input type="hidden" name="updateIdOfficial" value = "<?php echo $editIdOfficial ?>"/>
    <button type="submit" class="btn btn-outline-primary" name="update">Update</button>
    <button class="btn btn-danger" type="cancel" onclick="window.location='aofficial.php';return false;">Cancel</button> <br>
							
</form>
<?php

include('includes/script.php');

?>
