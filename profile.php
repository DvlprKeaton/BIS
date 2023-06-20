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
    $res1= mysqli_fetch_assoc($result1)

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

  

    $sql = "SELECT * FROM tbl_msg WHERE msg_status=1 AND sender_id='$logid' AND Status = '0'"; 
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
          <?php

             $sql = "SELECT * FROM tbl_msg WHERE msg_status=1 AND sender_id='$logid' AND Status = '0'"; 
              $result= mysqli_query($cn,$sql);
              $row= mysqli_num_rows($result);

            
            if ($row= mysqli_num_rows($result)>0)
             {
              
              while ($res= mysqli_fetch_assoc($result))
              {
                 echo '<a class= "dropdown-item text-primary font-weight-bold">'.$res['ReqReply'].'</a>';
                 echo '<div class= "dropdown-divider"></div>';
              }
            }
            else{
              echo '<a class= "dropdown-item text-danger font-weight-bold"> There are no messages here!</a>';
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
    <?php

                    if ($res1['profile'] != null) {
                     
                    ?>
                    <img src="profile/<?php echo $res1['profile'];?>" alt="Admin" class="img-profile rounded-circle" width="150">
                    <?php
                  }else{


                    ?>
                    <img src="img/undraw_profile.svg" alt="Admin" class="img-profile rounded-circle" width="150">
                    <?php
                  }?>
                    
   
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
                    <div class="mt-3">
                        
                      <h4><?php 
                      echo "<input type='hidden' id='ID' name='ID' value='" . $res1['user_id'] . "'>";
                      echo $res1['fname']; ?></h4>
                      
                    
                    </div>
                  </div>
                </div>
              </div>
              <form action="requestProfUpdate.php">
                  <input type="submit" name="update" class="btn btn-danger" style="margin-top: 20px;"  value="Request Profile Update">
              </form>
              <form action="updateProfile.php">
                <?php

              $sql = "SELECT * FROM tbl_msg WHERE sender_id='$logid' AND ProfRequest != 0"; 
              $result= mysqli_query($cn,$sql);
              $row= mysqli_num_rows($result);
              $res2= mysqli_fetch_assoc($result);
              if ($row>0) {
              if ($res2['ProfRequest'] == '2') {
                    echo'<input type="submit" name="update" class="btn btn-primary" style="margin-top: 20px;"  value="Update Profile">';
                }else if ($res2['ProfRequest'] == '0') {
                    echo'<input type="submit" name="update" class="btn btn-primary" style="margin-top: 20px; background-color: #cccccc;
  color: #666666;"  value="Update Profile" disabled="true">';
                }else if ($res2['ProfRequest'] == '1') {
                    echo'<input type="submit" name="update" class="btn btn-primary" style="margin-top: 20px; background-color: #cccccc;
  color: #666666;"  value="Update Profile" disabled="true">';
                }else{
                    echo'<input type="submit" name="update" class="btn btn-primary" style="margin-top: 20px; background-color: #cccccc;
  color: #666666;"  value="Update Profile" disabled="true">';
                }
              
                
              }else{
                echo'<input type="submit" name="update" class="btn btn-primary" style="margin-top: 20px; background-color: #cccccc;
  color: #666666;"  value="Update Profile" disabled="true">';
              }
                
                ?>
                  
              </form>

              <form action="requestClearance.php">
                <input type="submit" name="update" class="btn btn-warning" style="margin-top: 20px;"  value="Request Barangay Clearance">
              </form>
              <form action="requestIndigency.php">
                <input type="submit" name="update" class="btn btn-warning" style="margin-top: 20px;"  value="Request Certificate of Indigency">
              </form>
              <form action="requestResidency.php">
                <input type="submit" name="update" class="btn btn-warning" style="margin-top: 20px;"  value="Request Certificate of Residency">
              </form>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $res1['lname'] .', '. $res1['fname'] .' '. $res1['mname']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php 

                        echo $res1['user_name'];

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

                     echo $res1['mobile_number'];
                    ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Voter ID</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php
                     $sql = "SELECT * FROM tbl_resident WHERE user_id = '$logid'"; 
                      $result= mysqli_query($cn,$sql);
                      $row= mysqli_num_rows($result);
                      $res= mysqli_fetch_assoc($result);

                      date_default_timezone_set("Asia/Manila");
                      $today = date("d/m/Y - l - h:i:sa");

                      if ($row>0) {
                        if ($res['id_uploadDate'] >= $today) {
                          echo 'ID validation Expired';
                       
                         
                       }else{

                        if ($res['valid_id'] != null) {
                           echo '<a href="idDownload.php?src='.$res['valid_id'].'&download=true">'.$res['valid_id'].'</a>';
                          
                       }else{
                              echo 'ID still not Validated';
                       } 
                      }

                       }else{
                        echo 'ID still not Validated';
                      }

                     
                

                    ?>
                    
                    </div>

                  </div>
                <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Voter Status</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php
                     $sql = "SELECT * FROM tbl_resident WHERE user_id = '$logid'"; 
                      $result= mysqli_query($cn,$sql);
                      $row= mysqli_num_rows($result);
                      $res= mysqli_fetch_assoc($result); 

                      if ($row>0) {

                        if ($res['voter_status'] == '0') {
                          echo 'ID still not Validated';
                      }else{
                            echo 'Validated Voter';
                      }
                      

                      }else{

                         echo 'ID still not Validated';
                      }

                      

                    ?>
                    
                    </div>

                  </div>
                   <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Barangay Clearance</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php
                     $sql = "SELECT * FROM tbl_resident WHERE user_id = '$logid'"; 
                      $result= mysqli_query($cn,$sql);
                      $row= mysqli_num_rows($result);
                      $res= mysqli_fetch_assoc($result); 


                       if ($row>0) {
                        if ($res['ClearCert'] != null) {
                        echo '<a href="certDownload.php?src='.$res['ClearCert'].'&download=true">'.$res['ClearCert'].'</a>';
                          
                      }else{
                         echo 'Certificate is not yet generated';
                      }

                       }else{
                        echo 'Certificate is not yet generated';
                       }

                      
                      

                    ?>
                    
                    </div>

                    <div class="col-sm-3">
                      <h6 class="mb-0">Certificate of Indingency</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php
                     $sql = "SELECT * FROM tbl_resident WHERE user_id = '$logid'"; 
                      $result= mysqli_query($cn,$sql);
                      $row= mysqli_num_rows($result);
                      $res= mysqli_fetch_assoc($result); 

                       if ($row>0) {
                        if ($res['IndiCert'] != null) {
                        echo '<a href="certDownload.php?src='.$res['IndiCert'].'&download=true">'.$res['IndiCert'].'</a>';
                          
                      }else{
                           echo 'Certificate is not yet generated';
                      }
                       }else{
 echo 'Certificate is not yet generated';
                       }

                      
                      

                    ?>
                    
                    </div>

                    <div class="col-sm-3">
                      <h6 class="mb-0">Certificate of Residency</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php
                     $sql = "SELECT * FROM tbl_resident WHERE user_id = '$logid'"; 
                      $result= mysqli_query($cn,$sql);
                      $row= mysqli_num_rows($result);
                      $res= mysqli_fetch_assoc($result); 

                      if ($row>0) {
                         if ($res['ResiCert'] != null) {
                         echo '<a href="certDownload.php?src='.$res['ResiCert'].'&download=true">'.$res['ResiCert'].'</a>';
                         
                      }else{
                           echo 'Certificate is not yet generated';
                      }
                      }else{
                         echo 'Certificate is not yet generated';
                      }
                     
                      

                    ?>
                    
                    </div>


                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Complain</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">

                        <form action="postComplain.php" method="POST">
                            <input hidden type="text" name="ID" value="<?php echo $logid?>">
                            <textarea id="complain" name="complain" rows="20" cols="50" placeholder="Type your complain here..."></textarea>
                            <input type="submit" class="btn btn-primary"value="Submit">
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
        </div>
                        

        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


<?php
include('includes/footer.php');
include('includes/script.php');

?>