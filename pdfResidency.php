<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<title>Certificate of Residency</title>
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
$currentDate = date("Y-m-d");

$OR = rand(1000,9999);
echo "<h6 style = text-align:center;>Republic of the Philippines<br>
				<img src=img/logo1.png width = 50px; height = 50px;>
				Province of Ilocos Sur<br>
				Municipality of Sinait</h6> <div class = line> </div>";

echo "<h5 style = text-align:center;>OFFICE OF THE PUNONG BARANGAY</h5>";

echo "<h1 style = text-align:center;>Certificate of Residency<br><br></h1>";
echo '<p>OR NUMBER: '.$ORNUMBER = $OR.$currentDate. '-' . $editlname_resident.'</p>';
 echo "<h3>TO WHOM IT MAY CONCERN, </h3>";

echo "<p class = paragraph>This is to certify that <b>".$editfname_resident." ".$editmname_resident." ".$editlname_resident." ".$editsuffix_resident." </b>  is a bonafide resident of Barangay Dadalaquiten Sur, Sinait, Ilocos Sur.<p>";
echo "<p>This Certification is issued upon the request of the above-mentioned resident for General Purposes.<br><br> Issued this <b>".$currentDate."</b>.<p>";
echo "<br><p style=margin-left:10%; margin-right:10%; >Verified by: <br><br> 
				<img src='img/signature1.png' style= 'position:absolute;width:170px;height:170px;margin-left:0px;margin-top:-50px'>MARRIETA IBUOS <br> Barangay Secretary";
				echo "<p style=margin-left:50%; margin-right:10%;>Certified by: <br><br> 
				<img src='img/signature2.png' style= 'position:absolute;width:170px;height:170px;margin-left:-20px;margin-top:-70px'>RODEL YADAO <br> Punong Barangay";
echo "<div class = space></div>"
?>
		</div>
	</div>
</div>
<div class="mb-3">
	<button onclick="window.print()" name="print" class="btn btn-primary noprint">Print</button>
	<button class="btn btn-danger" type="cancel" onclick="window.location='residency.php';return false;">Cancel</button>
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
	.space{
		padding-bottom: 450px;
	}
</style>
</body>
</html>