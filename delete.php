<?php
include "dbtekconnect.php";
$id = $_GET["id"];
$sql = "DELETE FROM `accountspayable` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: apindex.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
