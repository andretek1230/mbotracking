<?php
 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['firstname'])) {


include('dbtekconnect.php')
?>




<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>MBO Tracking System V1.1</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #1E88E5;">
        <button onclick="window.print();">PRINT
            <i class="fa-solid fa-print"></i>
        </button>
        <a href="dashboard.php" class="btn btn-danger">BACK TO MAIN</a>
        <marquee name="marq1" id="marq1">WELCOME TO MBO BUDGET OFFICE SYSTEM VERSION 1.0</marquee>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Search Account's Payable & NYDD </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
            <style>
            @media print {
                body * {
                    visibility: hidden;
                }
                .print.container, .print-container * {
                    visibility: visible;
                }
                .print-container {
                    position: absolute;
                    left: 0px;
                    top: 0px;
                    }
                }
            </style>
            <div class="row print-container">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th width="5%">OFFICECODE</th>
                                    <th width="5%">OFFICENAME</th>
                                    <th width="20%">PAYEE</th>
                                    <th width="20%">DISCRIPTION</th>
                                    <th width="10%">ACCOUNTCODE</th>
                                    <th width="10%">OBR</th>
                                    <th width="10%">AMOUNT</th>
                                </tr>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","mbotracking");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM `nydd` WHERE CONCAT(office_code,name_office,payee,discription,account_code,obr,amount) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td width="3%" size="12"><?= $items['id']; ?></td>
                                                    <td width="3%" onresize="12"><?= $items['office_code']; ?></td>
                                                    <td width="3%" onresize="12"><?= $items['name_office']; ?></td>
                                                    <td width="5%" onresize="11"><?= $items['payee']; ?></td>
                                                    <td width="25%" size="12"><?= $items['discription']; ?></td>
                                                    <td width="20%" onresize="12"><?= $items['account_code']; ?></td>
                                                    <td width="20%" onresize="12"><?= $items['obr']; ?></td>
                                                    <td width="10%" text-format="bold"><?= $items['amount']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
