<?php

  session_start();
  if(isset($_SESSION['login'])){
    header ("Location: login.php");
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION);
    header("Location: /BarangayInfoSystem/Admin/index.php");
  }
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Home page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="style.css" rel="stylesheet" />
</head>
		<body>

			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
							<span class="sr-only">Toggle Navbar</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"> <img src="img/logo2.png"></a>
					</div>
					<div class="collapse navbar-collapse" id="navbar-collapse-main">
						<ul class="nav navbar-nav navbar-right">
							<li><a class="active" href="page.php">Home</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="contacts.php">Contacts</a></li>
						</ul>
					</div>
				</div>
			</nav>

			<div id="home">
				<div class="logo">
					<a href= "login.php"><img  src="img/logo1.png" style="position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  width: 50%; width:700px;height:700px;"></a>
				</div>
				
			</div>
			</div>
		</body>
		</html>