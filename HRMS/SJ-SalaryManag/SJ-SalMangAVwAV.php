<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}

include_once("../SJ-dbcona/dhh-jConntAB.php");

$VwSalId=$_SESSION['ViwSalID'];


$sqlSelectRecord = "SELECT * FROM hrm_staffmonsal WHERE SalMon_RwId = '$VwSalId'";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);

if($sqlScriptExecution->num_rows>0) {
    while($rowidno= $sqlScriptExecution->fetch_assoc())
    {
        $selSalRwId= $rowidno['SalMon_RwId'];
        $selEmpNo= $rowidno['Sal_empno'];
        $selEmpNam= $rowidno['Sal_empnnam'];

        $selStafnam= $rowidno['Sal_Stafnam'];
        // $SeleStaff="SELECT * FROM hrm_setstaf WHERE Staf_RwId='$selStafRwId'";
        // $SeleStaffexec=mysqli_query($tdconton,$SeleStaff);
        // if(mysqli_num_rows($SeleStaffexec)>0){
        //     while($rowCat=mysqli_fetch_assoc($SeleStaffexec)){
    
        //     $SelStafNam=$rowCat['Staf_Nam'];
            
        //     }
        // }

        $selDepnam= $rowidno['Sal_Depnam'];
        $selDesignam= $rowidno['Sal_Desnam'];
        $selMonth= $rowidno['Sal_Month'];
        $selYear= $rowidno['Sal_year'];
        $selWorkDys= $rowidno['Sal_Workdays'];
        $selBasic= $rowidno['Sal_BasicSlry'];
        $selIncreA= $rowidno['Sal_IncreA'];
        $selIncreB= $rowidno['Sal_IncreB'];
        $selSpeAllw= $rowidno['Sal_SpeAllow'];
        $selExpAllw= $rowidno['Sal_ExpAllow'];
        $selGros= $rowidno['Sal_Gross'];
        $selEpf= $rowidno['Sal_EPF'];
        $selNoPay= $rowidno['Sal_NoPay']; 
        $selAdvance= $rowidno['Sal_Advance'];
        $selMobBill= $rowidno['Sal_MobleBill'];
        $selLoan= $rowidno['Sal_Loan'];
        $selIncomeTx= $rowidno['Sal_IncmTax'];
        $selWithHlTx= $rowidno['Sal_WithHldTax'];
        $selDedTot= $rowidno['Sal_DedTot'];
        $selNetSal= $rowidno['Sal_SalryNet'];

    }
}
// First Name was change to ID No

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
            <li class="breadcrumb-item active" aria-current="page">View Salary Slip.</li>
          </ol>
          <h4 class="main-title mb-0">View Salary Slip.</h4>
        </div>
      </div>

<!-- Create New User -->
<div class="card" style="width: 800px; margin: 20px auto;">
    <div class="card-body">
        <div style="text-align: center;">
            <h2 style="color:rgb(93, 148, 230);">D HELP Private Limited</h2>
            <h3>Salary Slip <?php echo $selYear; ?> - <?php echo $selMonth; ?></h3>
        </div>
        <div>
            <p><strong>Employee Number:</strong> <?php echo $selEmpNo; ?></p>
            <p><strong>Employee Name:</strong> <?php echo $selEmpNam; ?></p>
            <p><strong>Designation:</strong> <?php echo $selDesignam; ?></p>
        </div>
        <hr>
        <div>
            <p><strong>Basic Salary:</strong> <?php echo number_format($selBasic, 2); ?></p>
            <p><strong>Salary Increment (A):</strong> <?php echo number_format($selIncreA, 2); ?></p>
            <p><strong>Salary Increment (B):</strong> <?php echo number_format($selIncreB, 2); ?></p>
            <p><strong>Special Allowance:</strong> <?php echo number_format($selSpeAllw, 2); ?></p>
            <p><strong>Expertise Allowance:</strong> <?php echo number_format($selExpAllw, 2); ?></p>
            <p><strong>Gross Salary:</strong> <?php echo number_format($selGros, 2); ?></p>
        </div>
        <hr>
        <div>
            <h4>Deductions</h4>
            <p><strong>EPF (8%):</strong> <?php echo number_format($selEpf, 2); ?></p>
            <p><strong>No Pay:</strong> <?php echo number_format($selNoPay, 2); ?></p>
            <p><strong>Advance:</strong> <?php echo number_format($selAdvance, 2); ?></p>
            <p><strong>Mobile Bill:</strong> <?php echo number_format($selMobBill, 2); ?></p>
            <p><strong>Loan:</strong> <?php echo number_format($selLoan, 2); ?></p>
            <p><strong>Income Tax:</strong> <?php echo number_format($selIncomeTx, 2); ?></p>
            <p><strong>Withholding Tax:</strong> <?php echo number_format($selWithHlTx, 2); ?></p>
            <p><strong>Total Deductions:</strong> <?php echo number_format($selDedTot, 2); ?></p>
        </div>
        <hr>
        <div>
            <p><strong>Net Salary:</strong> <?php echo number_format($selNetSal, 2); ?></p>
        </div>
        <hr>
    </div>
</div>
      

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





















