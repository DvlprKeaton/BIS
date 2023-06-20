  <?php

  session_start();
  if(isset($_SESSION['login'])){
    header ("Location: login.php");
  }
  
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION);
    header("Location: index.php");
  }

  //include('DB/admin.php');
  include('includes/header.php');
  include('includes/res_navbar.php');
    include("condb.php");

    $logid = $_SESSION['logid'];

    $sql1 = "SELECT * FROM tbluser WHERE user_id = '$logid'"; 
    $result1= mysqli_query($cn,$sql1);
    $row1= mysqli_num_rows($result1);
    $res1= mysqli_fetch_assoc($result1);



  //require 'DB/server.php';
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

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-search fa-fw"></i>
        </a>
    </li>

    <?php

  

    $sql = "SELECT * FROM tbl_msg WHERE msg_status=1 AND sender_id='$logid'"; 
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
      <h6 class="dropdown-header">Messages</h6>
      <a class="dropdown-item d-flex align-items-center" href="#">
          <?php

             $sql = "SELECT * FROM tbl_msg WHERE msg_status=1 AND sender_id='$logid'"; 
              $result= mysqli_query($cn,$sql);
              $row= mysqli_num_rows($result);

            
            if ($row= mysqli_num_rows($result)>0)
             {
              
              while ($res= mysqli_fetch_assoc($result))
              {
                 echo '<a class= "dropdown-item text-primary font-weight-bold" href= "read_msg.php?id_msg= '.$res['id_msg'].'>">'.$res['ReqReply'].'</a>';
                 echo '<div class= "dropdown-divider"></div>';
              }
            }
            else{
              echo '<a class= "dropdown-item text-danger font-weight-bold" href= "resread_msg.php"> There are no messages here!</a>';
            }
          ?>
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


<!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

               
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                   <div class="container">
    <div class="main-body">
    
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <?php

                    if ($res1['profile'] != null) {
                     
                    ?>
                    <img src="profile/<?php echo $res1['profile'];?>" alt="Admin" class="rounded-circle" width="150">
                    <?php
                  }else{


                    ?>
                    <img src="img/undraw_profile.svg" alt="Admin" class="rounded-circle" width="150">
                    <?php
                  }?>
                  <form action="uploadProfile.php" method="POST" enctype="multipart/form-data">
                    <?php 
                      echo "<input type='hidden' id='ID' name='ID' value='" . $res1['user_id'] . "'>"; ?>
                    <label>
                        <label for="myfile">Upload Profile Picture:</label>
                        <br>
                        <input type="file" id="myfile" name="myfile" required>
                      </label>
                      <button type="submit" class="btn btn-primary">Upload Profile</button>
                  </form>
                    <div class="mt-3">
                        
                      
                      
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  

                  <div class="row">
                    <form action="submitUpdate.php" method="POST" enctype="multipart/form-data">
                    <h4><?php 
                      echo "<input type='hidden' id='ID' name='ID' value='" . $res1['user_id'] . "'>"; ?></h4>

                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>

                    <div class="col-sm-9 text-secondary">
                      <?php 

                      if ($res1['lname'] != null) {
                          echo '<input type="text" name="lname" id="lname" class="form-control" placeholder="'.$res1['lname'].'"></input>';
                      }else{
                          echo '<input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last name"></input><br><br>';
                      }

                      if ($res1['fname'] != null) {
                          echo '<input type="text" name="fname" id="fname" class="form-control" placeholder="'.$res1['fname'].'"></input>';
                      }else{
                          echo '<input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First name"></input><br><br>';
                      }

                      if ($res1['mname'] != null) {
                          echo '<input type="text" name="mname" id="mname" class="form-control" placeholder="'.$res1['mname'].'"></input>';
                      }else{
                          echo '<input type="text" name="mname" id="mname" class="form-control" placeholder="Enter Middle name"></input>';
                      }
                      ?>

                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">

                      <?php 

                        echo '<input type="text" name="uname" id="uname" class="form-control" placeholder="'.$res1['user_name'].'"></input>';

                    ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">

                        <?php 


                        echo '<input type="text" name="cnum" id="cnum"class="form-control" placeholder="'.$res1['mobile_number'].'"></input>';

                    ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date of Birth</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">

                      <?php

                      $sql = "SELECT * FROM tbl_resident WHERE user_id = '$logid'"; 
                      $result= mysqli_query($cn,$sql);
                      $row= mysqli_num_rows($result);
                      $res= mysqli_fetch_assoc($result); 

                      if ($row>0) {
                        if ($res['birthdate_resident'] != null) {
                         echo '<input type="date" name="dob" id="dob" class="form-control" placeholder="'.$res['birthdate_resident'].'"></input>';
                      }else{
                         echo '<input type="date" name="dob" id="dob" class="form-control" placeholder=""></input>';
                       
                      }
                      }else{
                        echo '<input type="date" name="dob" id="dob" class="form-control" placeholder=""></input>';
                      }

                      

                    ?>
                     
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
          <button type="submit" class="btn btn-primary">Submit</button>
          </form>
                  </div>

                    
            
                </div>
              </div>
              


            </div>
          </div>

        </div>
    </div>
                   
            </div>
        </div>
                        

        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


<?php
include('includes/footer.php');
include('includes/script.php');

?>