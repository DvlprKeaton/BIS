<?php
$host = "localhost";
$email = "root";
$pword = "";


$db_name = "dbbarangay";
$cn=mysqli_connect($host,$email,$pword,"")or die("cannot connect");
mysqli_select_db($cn,"$db_name")or die("cannot select DB");
?>