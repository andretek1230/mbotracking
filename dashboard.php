<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['firstname'])) {

 ?>

<!DOCTYPE html>
<html lang="en-us">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/andrestyle.css">
  <link rel="stylesheet" type="text/css" href="css/dashstylemode.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=search" />



  <title>MBO Tracking System V1.1</title>

</head>
<body style="background-image: url('img/background1.png');">

  <label>
    <input type="checkbox">
    <div class="toggle">
      <span class="top_line common"></span>
      <span class="middle_line common"></span>
      <span class="bottom_line common"></span>
    </div>

    <div class="slide">
      <h1>MENU</h1>
      <ul>
        <li><a href="dashboard.php" id="dashboard" name="dashboard"><i class="fas fa-tv"></i>dashboard</a></li>
        <li><a href="#" id="obr-reg" name="obr-reg"><i class="far fa-user"></i>OBR</a></li>
        <li><a href="#" id="psmoeecap" name="psmooecap-minus"><i class="far fa-user"></i>MINUS DISBURSE</a></li>
        <li><a href="#" id="prby-office" name="prby-office"><i class="far fa-user"></i>PR</a></li>
        <li><a href="#" id="search" name="search"><i class="far fa-user"></i>Search</a></li>
        <li><a href="#" name="status" id="status"><i class="fab fa-gripfire"></i>status</a></li>
        <li><a href="/profile/dashboard1.php" id="profile" name="profile"><i class="far fa-user"></i>profile</a></li>
        <li><a href="#" id="settings" name="settings"><i class="fas fa-cogs"></i>settings</a></li>
        <li><a href="logout.php" type="exit"name="exit" id="exit"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
      </ul>
    </div>
  </label>
<nav>
  <label class="mbo">Welcome, <?php echo $_SESSION['firstname']; ?></label>
  <ul>
    <li><a class="active" href="apindex.php" >Accounts Payables</li>
    <li><a href="nydd.php">Not Yet Due & Demandable</li>
    <li><a href="#">SAAOB</li>
    <li><a href="#">Obligation Entry</li>
  </ul>
</nav>


</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>

