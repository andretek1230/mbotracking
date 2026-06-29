<?php

$sname= "bfv6mmxm4blwee6dpfrk-mysql.services.clever-cloud.com";
$unmae= "uewcoqdrwb4oi3bf";
$password = "oWfWVz2VkRZ5ZeCc7F3w";
$db_name = "bfv6mmxm4blwee6dpfrk";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}