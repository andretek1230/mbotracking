<?php
include "dbtekconnect.php";
$id = $_GET["id"];
$sql = "DELETE FROM `nydd` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
  }
  .then((willDelete) => {
  if (willDelete) {
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    };
  } else {
    swal("Your imaginary file is safe!");
  }
  };
  header("Location: nydd.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}

