<?php  
    include('condb.php');
?>
<!DOCTYPE html>
<html  lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styleform.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <title>Register Form</title>
</head>
<body>
  <div class="container">
    <div class="row px-1">
      <div class="col-lg-10 col-xl-20 card flex-row mx-auto px-0">
        <div class="img-left d-none d-md-flex"></div>
            <div class="card-body">
              <h4 class=" title text-center mt-4"> Register Account </h4>
              <form class="form-box px-3" action="createResident.php" method="POST" >
                <div class="form-input">
                      <span> <i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control"  name="lname" pattern="[a-zA]+" placeholder="Enter Lastname" style="text-transform: capitalize;" style="text-transform: capitalize;"required />
                  </div>
                  <div class="form-input">
                      <span> <i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control"  name="fname" pattern="[a-zA-Z0-9]+" placeholder="Enter Firstname" style="text-transform: capitalize; "required />
                  </div>
                  <div class="form-input">
                      <span> <i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control"  name="mname" pattern="[a-zA-Z0-9]+" placeholder="Enter Middlename" style="text-transform: capitalize;" required />
                  </div>
                  <div class="form-input">
                    <span> <i class="fa fa-envelope-o"></i></span>
                    <input type="number" class="form-control"  name="cnum" placeholder="Enter Contact #" required />
                  </div>
                  <div class="form-input">
                    <span> <i class="fa fa-calendar"></i></span>
                    <input type="date" name="dob" id="dob" class="form-control"></input>
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
            <div class="form-input">
              <span><i class="fa fa-flag"></i></span>
              <input type="text" name="nationality" class="form-control" placeholder="Enter your nationality" style="text-transform: capitalize;" required>
            </div>
                        
                    <div class="form-input">
                      <span> <i class="fa fa-user"></i></span>
                      <input type="text" class="form-control"  name="username" placeholder="Enter username" style="text-transform: capitalize;" required />
                  </div>
                  <div class="form-input">
                       <span> <i class="fa fa-key"></i></span>
                      <input type="password"  name="password"class="form-control" aria-describedby="passwordHelpBlock" placeholder="Enter password" required >
                      </div>
                      <div class="form-input">
                       <span> <i class="fa fa-key"></i></span>
                      <input type="password"  name="conpassword"class="form-control" aria-describedby="passwordHelpBlock" placeholder="Confirm Password" required >
                      </div>

                      <label for="myfile">Upload Valid ID:</label>
                        <br>
                        <input type="file" id="myfile" name="myfile" required>
                  <button type="submit" name="register"  class="btn btn-block text-uppercase">Register</button>
                  <hr class="my-4">
                  
                <div class="text-center mb-2">
                  Have an account already?
                  <a href="login.php" class="login-link">Login here</a>
                </div>
              </form>
            </div>
      </div>
    </div>
  </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
    </html>
