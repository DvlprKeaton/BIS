					<?php
					
include("condb.php");



					if (isset($_POST['edit'])) {
						$editIdOfficial = $_POST['editIdOfficial'];
						$editlname_official = $_POST['editlname_official'];
                        $editfname_official = $_POST['editfname_official'];
                        $editmname_official = $_POST['editmname_official'];
                        $editsuffix_official = $_POST['editsuffix_official'];
						$editPosition = $_POST['editPosition'];
                        $editusername = $_POST['editusername'];
                        $editpassword = $_POST['editpassword'];
                        $editdob = $_POST['editdob'];
                        $editcnum = $_POST['editcnum'];
						
					}

					if (isset($_POST['update'])) {
						$updateIdOfficial = $_POST['updateIdOfficial'];
						$updatelname_official = $_POST['updatelname_official'];
                        $updatefname_official = $_POST['updatefname_official'];
                        $updatemname_official = $_POST['updatemname_official'];
                        $updatesuffix_official = $_POST['updatesuffix_official'];
                        $updateusername = $_POST['updateusername'];
                        $updatepassword = $_POST['updatepassword'];
                        $updatedob = $_POST['updatedob'];
                        $updatecnum = $_POST['updatecnum'];
						$updatePosition = $_POST['updatePosition'];

						if ($_POST['updatepassword'] === $_POST['conpass']){

                        $age = date_diff(date_create($updatedob), date_create('today'))->y;

                        $hash_pword=password_hash($updatepassword, PASSWORD_DEFAULT);

                        $year = date("Y");
                            $sql2 = "UPDATE `tbluser` SET `lname`='$updatelname_official',`fname`='$updatefname_official',`mname`='$updatemname_official',`suffix`='$updatesuffix_official',`birthdate`='$updatedob',`age`='$age',`position`='$updatePosition',`mobile_number`='$updatecnum',`user_name`='$updateusername',`user_password`='$hash_pword',`Status`='1' WHERE user_id ='$updateIdOfficial'";
                        $result = mysqli_query($cn, $sql2);
                        
                            echo "<script>alert('Successfully created!')</script>";
                            echo "<script>window.location.href = 'aofficial.php'</script>";
                        }else{

                            echo "<script>alert('Password is not the same!')</script>";
                            echo "<script>window.location.href = 'aofficial.php'</script>";

                        }

						
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

<form action="updateUser.php" method="post">
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
    <label  class="form-label">Username</label>
    <input type="text"  name="updateusername" class="form-control" placeholder="Username" value = "<?php echo $editusername ?>">
  </div>
  <div class="mb-3">
    <label  class="form-label">Password</label>
    <input type="password"  name="updatepassword" class="form-control" placeholder="Password" required>
  </div>
  <div class="mb-3">
    <label  class="form-label">Confirm Password</label>
    <input type="password"  name="conpass" class="form-control" placeholder="Confirm Password" required>
  </div>
  <div class="mb-3">
  <label  class="form-label">Birthdate</label>
  <input type="date" name="updatedob" class="form-control" placeholder="Select your birthdate" value = "<?php echo $editdob ?>" required>
  </div>
  <div class="mb-3">
    <label  class="form-label">Contact #</label>
    <input type="text"  name="updatecnum" class="form-control" placeholder="Contact #" value = "<?php echo $editcnum ?>">
  </div>
  <div class="mb-3">
    <label class="input-group-text">Position</label>
						</div>
						<select name="updatePosition" class="custom-select" id="inputGroupSelect01">
							<option value="<?php echo $editPosition ?>"><?php echo $editPosition ?></option>
							<option value="Punong Barangay">Punong Barangay</option>
							<option value="Secretary">Secretary</option>
						</select>
  </div>

 	<br><button type="submit" class="btn btn-outline-primary" name="update">Update</button>
	<input type="hidden" name="updateIdOfficial" value = "<?php echo $editIdOfficial ?>"/>
    <button class="btn btn-danger" type="cancel" onclick="window.location='aofficial.php';return false;">Cancel</button> <br>
							
</form>
<?php

include('includes/script.php');

?>
