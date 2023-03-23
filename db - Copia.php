
<?php

$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection

$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
/*
$con = mysqli_connect("localhost","root","","register");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  */
?>
