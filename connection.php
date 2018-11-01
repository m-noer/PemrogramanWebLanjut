<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "sekolahku";

// Create a fann_get_total_connections
$conn = mysqli_connect($server, $username, $password, $db);

// Check connection
if (!$conn) {
  die("Connection failed : ". mysqli_connect_error());
}

echo "Connected successfuly!";

 ?>
