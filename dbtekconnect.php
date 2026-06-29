<?php
$servername = "bfv6mmxm4blwee6dpfrk-mysql.services.clever-cloud.com";
$username = "uewcoqdrwb4oi3bf";
$password = "oWfWVz2VkRZ5ZeCc7F3w";
$dbname = "bfv6mmxm4blwee6dpfrk";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>
