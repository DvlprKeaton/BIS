<?php  
    //include('DB/admin.php');
    
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="styleform.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row px-3">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
        <div class="img-left d-none d-md-flex"></div>
        <div class="card-body">
          <h4 class=" title text-center mt-4"> Login Account </h4>
          <form action="logSuccess.php" class="form-box px-3" method="post"> 
            <div class="form-input">
              <span> <i class="fa fa-user"></i></span>
              <input type="text" name="username" placeholder="Enter username" required>
            </div>
            <div class="form-input">
              <span> <i class="fa fa-key"></i></span>
              <input type="password" name="pword" placeholder="Enter password" required>
            </div>
           
            <div class="mb-3">
              <div class="mb-3">
                <button type="submit" name="login" class="btn btn-block text-uppercase">Login</button>
                <hr class="my-4">

                <div class="text-center mb-2">
                  Don't have an account?
                  <a href="register.php" class="register-link">Register here</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
