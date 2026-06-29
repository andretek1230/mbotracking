<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['firstname'])) {

include "dbtekconnect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="css/dashstylemode.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=search" />

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>MBO NYDD</title>
</head>
<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #1E88E5;">
    <a href="dashboard.php" class="btn btn-dark mb-3" style="background-color: #18e36a">Dashboard</a>
    <a href="logout.php" class="btn btn-dark mb-3" style="background-color: #18e36a">Logout</a>
    <h3>Not Yet Due and Demandable Obligations (NYDD)</h3>
  </nav>
  <!-- MARQUEE MOVING TEXT ABOVE-->
  <marquee class="form-label">Design & Edit by: @AndreTekSystem Solution <br> Municipal Budget Officer: Ms. Grace G. Magcanta, CPA</marquee>

  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="nyddadd.php" class="btn btn-dark mb-3" style="background-color: #18e36a">Add NEW NYDD</a>
    <a href="nyddsearch.php" class="btn btn-dark mb-3" style="background-color: #8e5af8">SEARCH & PRINT</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">OFFICECODE</th>
          <th scope="col">OFFICENAME</th>
          <th scope="col">PAYEE</th>
          <th scope="col">DISCRIPTION</th>
          <th scope="col">ACCOUNT CODE</th>
          <th scope="col" width="20%">OBR</th>
          <th scope="col">AMOUNT</th>
          <th scope="col">ACTION</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `nydd`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["office_code"] ?></td>
            <td><?php echo $row["name_office"] ?></td>
            <td><?php echo $row["payee"] ?></td>
            <td><?php echo $row["discription"] ?></td>
            <td><?php echo $row["account_code"] ?></td>
            <td><?php echo $row["obr"] ?></td>
            <td><?php echo $row["amount"] ?></td>
            <td>
              <a href="nyddedit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="nydddelete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <script type="text/javascript">
    var inputField = document.querySelector('input')

    inputField.onkeyup = function(){
    var removeChar = this.value.replace(/[^0-9\.]/g, '')
    //console.log(removeChar);
    var removeDot = removeChar.replace(/\./g, '')
    this.value = removeChar

    var formatedNumber = this.value.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    console.log(formatedNumber);
    this.value = formatedNumber
    }

  </script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>


</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
