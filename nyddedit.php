<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['firstname'])) {

include "dbtekconnect.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
   $OFFICECODE = $_POST['office_code'];
   $OFFICENAME = $_POST['name_office'];
   $PAYEE = $_POST['payee'];
   $DISCRIPTION = $_POST['discription'];
   $ACCOUNTCODE = $_POST['account_code'];
   $OBR = $_POST['obr'];
   $AMOUNT = $_POST['amount'];

  $sql = "UPDATE `nydd` SET `office_code`='$OFFICECODE',`name_office`='$OFFICENAME',`payee`='$PAYEE',`discription`='$DISCRIPTION',`account_code`='$ACCOUNTCODE',`obr`='$OBR', `amount`='$AMOUNT' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: nydd.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>MBO Trackings System</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    APPROPRIATION EDIT
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>ENTRY FORM Not Yet Due and Demandable Obligations (NYDDO)</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `nydd` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">AMOUNT:</label>
            <input type="text" class="form-control" name="amount" value="<?php echo $row['amount'] ?>">
          </div>

          <div class="col">
            <label class="form-label">OFFICENAME:</label>
            <input type="text" class="form-control" name="name_office" value="<?php echo $row['name_office'] ?>">
          </div>

          <div class="col">
            <label class="form-label">PAYEE</label>
            <input type="text" class="form-control" name="payee" value="<?php echo $row['payee'] ?>">
          </div>

        </div>

        <div class="col">
          <label>DISCRIPTION</label>
          <input type="text" class="form-control" name="discription" value="<?php echo $row['discription'] ?>">
            
        </div>


        <div class="mb-3">
          <label class="form-label">ACCOUNTCODE:</label>
          <input type="text" class="form-control" name="account_code" value="<?php echo $row['account_code'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">OBR:</label>
          <input type="text" class="form-control" name="obr" value="<?php echo $row['obr'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">OFFICECODE:</label>
          <input type="text" class="form-control" name="office_code" value="<?php echo $row['office_code'] ?>">
        </div>
      

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    
  </script>
  <script>
      var inputField = document.querySelector('input')
      inputField.onkeyup = function(){
         var removeChar = this.value.replace(/[^0-9\.]/g, '')
         this.value = removeChar
         var formatedNumber = this.value.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
         console.log(formatedNumber);
         this.value = formatedNumber

      }
  </script>

</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
