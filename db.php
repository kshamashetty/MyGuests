<?php

$servername = "localhost";
$username = "kshamaus";
$password = "CxVW5yy2dtyydPrq";
$dbname = "kshamaus";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>