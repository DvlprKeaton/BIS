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
       
      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-search fa-fw"></i>
        </a>
    </li>

<?php 

    $sql_get = mysqli_query($cn, "SELECT * FROM tbl_msg WHERE msg_status=0");
    $count = mysqli_num_rows($sql_get);
    ?>

    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw"></i>
        <span class="badge badge-danger badge-counter"> <?php echo $count; ?></span>
      </a>
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
      aria-labelledby="alertsDropdown">
      <h6 class="dropdown-header">Messages</h6>
      <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="mr-3">
          <?php   
            $sql_get_msg = mysqli_query($cn, "SELECT * FROM tbl_msg WHERE msg_status=0");
            if (mysqli_num_rows($sql_get_msg)>0)
             {
              
              while ($result= mysqli_fetch_assoc($sql_get_msg))
              {
                 echo '<a class= "dropdown-item text-primary font-weight-bold" href= "read_msg.php?id_msg= '.$result['id_msg'].'>">'.$result['message'].'</a>';
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


<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Messages</h1>
  </div>

  <div class="container">
    <div class="row">
      <div class="table-responsive">
        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
          <tr>
            <th>Serial Number</th>
            <th>Name</th>
            <th>Message</th>
            <th>Date</th>
            <th>Approve</th>
          </tr>
          <?php 
          $sql_get_status = mysqli_query($cn, "SELECT * FROM tbl_msg WHERE msg_status=1");
          while ($main_id = mysqli_fetch_assoc($sql_get_status)):
           {
           } ?>
            <tr>
              <td><?php echo $main_id ['id_msg'] ?></td>
              <td><?php echo $main_id ['sender_name'] ?></td>
              <td><?php echo $main_id ['message'] ?></td>
              <td><?php echo $main_id ['msg_date'] ?></td>
              <td>
                <form action="ApproveMessage.php" method="post">
                  <button type="submit" class="btn btn-success" name="approve"><i class="fa fa-thumbs-up"></i></button>
                    <input type="hidden" name="approve_msgid" value="<?php echo $main_id['id_msg']?>">
                </form>
              </td>
            </tr>
          <?php endwhile ?>
          </table>
        </div>
      </div>

    </div>
  </div>
  <?php

  include('includes/script.php');

?>