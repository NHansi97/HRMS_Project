<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
include_once("../SJ-dbcona/dhh-jConntAB.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../SJ-assets-lib/img/favicon.png">
    <title>Authentication - D HELP Private Limited</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="../SJ-assets-lib/lib/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="../SJ-assets-lib/lib/bootstrap/css/bootstrap.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../SJ-assets-lib/css/style.min.css">

    <style>
    th, td {
    text-align: center; /* Aligns text to the center */
    }
    </style>

  </head>
  <body>
    <!--side bar-->
    <?php include_once("../SJ-headtopfooter/sj-sidebaar.php");?>

    <!--header-main-->
    <?php include_once("../SJ-headtopfooter/sj-mainheader.php");?>

    <div class="main main-app p-3 p-lg-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
          <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item"><a href="#">Authentication</a></li>
            <li class="breadcrumb-item active" aria-current="page">View All Salary Data</li>
          </ol>
          <h4 class="main-title mb-0">View All Salary Data</h4>
        </div>
      </div>


<!-- Employee Number:
Employee Name:
Designation: -->

<!--  First Name was change to ID No -->
<table class="table">
  <tr>
    <th>Year / Month</th>
    <th>Emp. No.</th>
    <th>Basic Salary</th>
    <th>Total Increments && Allowance</th>
    <th>Gross Salary</th>
    <th>EPF(8%)</th>
    <th>No Pay</th>
    <th>Advance</th>
    <th>Mobile Bill</th>
    <th>Loan</th>
    <th>Income Tax</th>
    <th>With Holding Tax</th>
    <th>Net Salary</th>
    <th>Actions</th>
  </tr>

  <tr>
    <?php

$sqlSelectRecord = "SELECT * FROM hrm_staffmonsal ORDER BY SalMon_RwId DESC";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);

while($rowidno= $sqlScriptExecution->fetch_assoc())
{
    
    ?>

    <td><?php echo $rowidno['Sal_year']; ?> / <?php echo $rowidno['Sal_Month']; ?></td>
    <td><?php echo $rowidno['Sal_empno'];  ?></td>
    <td><?php echo $rowidno['Sal_BasicSlry'];  ?></td>
    <td><?php echo number_format(($rowidno['Sal_IncreA'] + $rowidno['Sal_IncreB'] + $rowidno['Sal_SpeAllow'] + $rowidno['Sal_ExpAllow']), 2); ?></td>
    <td><?php echo $rowidno['Sal_Gross'];  ?></td>
    <td><?php echo $rowidno['Sal_EPF'];  ?></td>
    <td><?php echo $rowidno['Sal_NoPay'];  ?></td>
    <td><?php echo $rowidno['Sal_Advance'];  ?></td>
    <td><?php echo $rowidno['Sal_MobleBill'];  ?></td>
    <td><?php echo $rowidno['Sal_Loan'];  ?></td>
    <td><?php echo $rowidno['Sal_IncmTax'];  ?></td>
    <td><?php echo $rowidno['Sal_WithHldTax'];  ?></td>
    <td><?php echo $rowidno['Sal_SalryNet'];  ?></td>
    <td class="tn">
    <a href="SJ-SalMangAVwA.php?fido=<?php echo $rowidno['SalMon_RwId']; ?>" class="btn btn-success" role="button">View</a>
    <a href="SJ-SalMangAVwB.php?fidt=<?php echo $rowidno['SalMon_RwId']; ?>" class="btn btn-primary" role="button">Edit</a>
    <a href="SJ-SalMangAVwC.php?fidtr=<?php echo $rowidno['SalMon_RwId']; ?>" class="btn btn-danger" role="button">Delete</a>
    </td>

  </tr>

  <?php   
}


?>
</table>

      <!--main-footer-->
      <?php include_once("../SJ-headtopfooter/sj-footer.php");?>
    </div><!-- main -->


    <script src="../SJ-assets-lib/lib/jquery/jquery.min.js"></script>
    <script src="../SJ-assets-lib/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../SJ-assets-lib/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    <script src="../SJ-assets-lib/lib/parsleyjs/parsley.min.js"></script>

    <script src="../SJ-assets-lib/js/script.js"></script>

  </body>
</html>
