<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<title>Barangay Clearance</title>
</head>
<style type="text/css" media="print"> 
	@media print{
		.noprint{
		display: none; !important;
		}

	}
	
</style>
<body>
	<div class="container mt-3">
		<div class="container-fluid">
			<div class="content-wrapper">
				<?php

				$editlname_resident = $_POST['editlname_resident'];
				$editfname_resident = $_POST['editfname_resident'];
				$editmname_resident = $_POST['editmname_resident'];
				$editsuffix_resident = $_POST['editsuffix_resident'];
				$editAge = $_POST['editAge'];
				$editNationality = $_POST['editNationality'];
				$currentDate = date("Y-m-d");

$OR = rand(1000,9999);
				echo "<h6 style = text-align:center;>Republic of the Philippines<br>
				<img src=img/logo1.png width = 50px; height = 50px;>
				Province of Ilocos Sur<br>
				Municipality of Sinait</h6> <div class = line> </div>";

				echo "<h5 style = text-align:center;>OFFICE OF THE PUNONG BARANGAY</h5>
				<h3 style = text-align:center;>BARANGAY CLEARANCE</h3>";
				echo '<p>OR NUMBER: '.$ORNUMBER = $OR.$currentDate. '-' . $editlname_resident.'</p>';
				echo "<br>TO WHOM IT MAY CONCERN:";
				echo "<br><br><p class = paragraph>This is to certify that <b>".$editfname_resident." ".$editmname_resident." ".$editlname_resident." ".$editsuffix_resident." </b> , <b>" .$editAge." </b> years of age, <b> ".$editNationality." </b> and a resident of Barangay Dadalaquiten Sur, Sinait, Ilocos Sur.</p>";

				echo " <p class = paragraph> This is to certify further that he/she is known to me of good moral character and is a law abiding citizen.
				Records of the barangay has shows that he/she has not committed nor been involoved in any kind of unlawful activities in this Barangay.</p>
				";
				echo "<p class = paragraph>This Barangay Clearance is issued upon the request of the above menntioned name for <b>ALL LEGAL PURPPOSES IT MAY SERVE.</b></p>";

				echo "<p class = paragraph>Issued this <b>
				".$currentDate."</b> at the Office of Punong Barangay, Barangay Dadalaquiten Sur, Sinait, Ilocos Sur</p>";

				echo "<br><p style=margin-left:10%; margin-right:10%; >Verified by: <br><br> 
				<img src='img/signature1.png' style= 'position:absolute;width:170px;height:170px;margin-left:0px;margin-top:-50px'>MARRIETA IBUOS <br> Barangay Secretary";
				echo "<p style=margin-left:50%; margin-right:10%;>Certified by: <br><br> 
				<img src='img/signature2.png' style= 'position:absolute;width:170px;height:170px;margin-left:-20px;margin-top:-70px'>RODEL YADAO <br> Punong Barangay";

				?>
		</div>
	</div>
</div>

<style type="text/css">

	.paragraph{
		text-indent: 50px;
	}
	.container{
		border: 3px solid black;
	}
	.line{
		border-top: 2px solid black;
		margin-right: 150px;
		margin-left: 150px;
		padding-bottom: 30px;
	}
	img{
		margin-left: -90px;
		margin-right: 20px;
		position: relative;
	}
</style>
<div class="mb-5">
	<button onclick="window.print()" name="print" class="btn btn-primary noprint">Print</button>
	 <button class="btn btn-danger" type="cancel" onclick="window.location='clearance.php';return false;">Cancel</button>

</div>

</body>
</html>