<?php
session_start();
$dbconnection = mysqli_connect('192.53.173.13', 'hcurtuuech', 'VjB3yuJNrs', 'hcurtuuech');
mysqli_set_charset($dbconnection, "utf8");
if (!$dbconnection) {
	die("Could not connect: " . mysqli_connect_error());
}
?>

