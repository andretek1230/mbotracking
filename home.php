<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['firstname'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1 style="color: darkblue;">Hello, <?php echo $_SESSION['firstname']; ?></h1>
     <a href="dashboard.php">Click to CONTINUE TO Dashboard</a>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>