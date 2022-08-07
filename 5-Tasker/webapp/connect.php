<?php
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "elenanicolae";
$dBName = "taskerdb";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
  }
?>