<?php

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
if (!empty($username)){
$host = "bfv6mmxm4blwee6dpfrk-mysql.services.clever-cloud.com";
$dbusername = "uewcoqdrwb4oi3bf";
$dbpassword = "";
$dbname = "bfv6mmxm4blwee6dpfrk";

// Create connection
$conn = new mysqli ($localhost, $root, $password, $mybasetekmbo);

if (mysqli_connect_error()){
	die('Connect Error ('. mysqli_connect_errno() .')' mysqli_connect_error());
}
else{
$sql = "INSERT INTO 'registration' (username, password) values ('$username','$password')";
if ($conn->query($sql)){
	href="dashboard.php"
echo "LOGIN SUCCESSFULY";
}s
else{
echo "Error: ". $sql ."<br>". $conn->error;
}
$conn->close();
}
}
else{
echo "Password should not be empty";
die();
}

else{
echo "Username should not be empty";
die();
}
?>