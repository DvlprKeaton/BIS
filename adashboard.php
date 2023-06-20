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
  include('includes/capt_navbar.php');

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

    include("condb.php");

    $sql = "SELECT * FROM tbl_msg WHERE msg_status = 0"; 
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

             $sql = "SELECT * FROM tbl_msg WHERE msg_status=0"; 
              $result= mysqli_query($cn,$sql);
              $row= mysqli_num_rows($result);

              $sql2 = "SELECT * FROM locations WHERE request=1"; 
              $result2= mysqli_query($cn,$sql2);
              $row2= mysqli_num_rows($result2);

            
            if ($row= mysqli_num_rows($result)>0)
             {
              
              while ($res= mysqli_fetch_assoc($result))
              {
                 echo '<a class= "dropdown-item text-primary font-weight-bold" href= "read_msg.php?id_msg= '.$res['id_msg'].'>">'.$res['message'].'</a>';
                 echo '<div class= "dropdown-divider"></div>';
              }
            }else if ($row2= mysqli_num_rows($result2)>0) {

              while ($res2= mysqli_fetch_assoc($result2))
              {
                 echo '<a class= "dropdown-item text-primary font-weight-bold" href= "captainMap.php?id='.$res2['id'].'">You have a pending pin request!</a>';
                 echo '<div class= "dropdown-divider"></div>';
              }
            }
            else{
              echo '<a class= "dropdown-item text-danger font-weight-bold" href= "read_msg.php"> There are no messages here!</a>';
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


<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>


  <!-- Content Row -->
  <div class="row">

    <!-- Population -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-m font-weight-bold text-primary text-uppercase mb-1">
              Resident</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php 

                $sql = "SELECT * FROM tbl_resident ORDER BY id_resident";
                $result= mysqli_query($cn,$sql);
                $row= mysqli_num_rows($result);

                echo '<h3>'.$row.'</h3>';
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-chart-line fa-4x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Officials -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-m font-weight-bold text-info text-uppercase mb-1"> Officials
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php 

                $sql = "SELECT * FROM tbl_official ORDER BY id_official";
                $result= mysqli_query($cn,$sql);
                $row= mysqli_num_rows($result);

                echo '<h3>'.$row.'</h3>';
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-4x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Male -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-m font-weight-bold text-warning text-uppercase mb-1">
              Male</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
               <?php

                $sql = "SELECT * FROM tbl_resident WHERE gender = 'Male' ";
                $result= mysqli_query($cn,$sql);
                $row= mysqli_num_rows($result);

               echo '<h3>'.$row.'</h3>';
               ?>
             </div>
           </div>
           <div class="col-auto">
            <i class="fas fa-male fa-4x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Female -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-m font-weight-bold text-warning text-uppercase mb-1">
            Female</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
             <?php

             $sql = "SELECT * FROM tbl_resident WHERE gender = 'Female' ";
                $result= mysqli_query($cn,$sql);
                $row= mysqli_num_rows($result);
             echo '<h3>'.$row.'</h3>';
             ?>
           </div>
         </div>
         <div class="col-auto">
          <i class="fas fa-female fa-4x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>


<?php
include('includes/footer.php');
include('includes/script.php');

?>