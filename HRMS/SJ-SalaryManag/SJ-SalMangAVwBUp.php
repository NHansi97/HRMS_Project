<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
unset($_SESSION['mfin']);
$_SESSION['mfin']=uniqid();
$UpSalId=$_SESSION['UpSalID'];
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
    <title>Authentication - D HELP HUB</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="../SJ-assets-lib/lib/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="../SJ-assets-lib/lib/bootstrap/css/bootstrap.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../SJ-assets-lib/css/style.min.css">

  </head>
  <body>
    <!-- Side bar -->
    <?php include_once("../SJ-headtopfooter/sj-sidebaar.php");?>

    <!-- Header main -->
    <?php include_once("../SJ-headtopfooter/sj-mainheader.php");?>

    <div class="main main-app p-3 p-lg-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
          <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item"><a href="#">Authentication</a></li>
            <li class="breadcrumb-item active" aria-current="page">Salary Management</li>
          </ol>
          <h4 class="main-title mb-0">Update Salary</h4>
        </div>
      </div>


    <!-- Retriev data from database -->
     <?php
    $sqlSelectRecord = "SELECT * FROM hrm_staffmonsal WHERE SalMon_RwId = '$UpSalId'";
    $sqlScriptExecution = $tdconton->query($sqlSelectRecord);

    if($sqlScriptExecution->num_rows>0) {
    while($rowidno= $sqlScriptExecution->fetch_assoc())
    {
        $selSalRwId= $rowidno['SalMon_RwId'];
        $selEmpNo= $rowidno['Sal_empno'];
        $selEmpNam= $rowidno['Sal_empnnam'];
        $selStafnam= $rowidno['Sal_Stafnam'];
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


      <!-- sj-salMang form start -->
      <form class="needs-validation" action="SJ-SalMangAVwBUpB.php" method="POST" novalidate>
        <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="col-md-6">
                    <label for="ndempnum" class="form-label">Employee Number</label>    
                    <input class="form-control" type="text" id="ndempnum" name="ndempnum" value="<?php echo $selEmpNo; ?>" readonly>
                    </div> 
                </div>
            </div>    

            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="ndempname" class="form-label">Employee Name</label>  
                <input class="form-control" type="text" id="ndempnam" name="ndempnam" value="<?php echo $selEmpNam; ?>" readonly>
              </div>
              
              <div class="col-md-3 mb-3">
                <label for="ndstnam" class="form-label">Staff Name</label>   
                <input class="form-control" type="text" id="ndstnam" name="ndstnam" value="<?php echo $selStafnam; ?>" readonly> 
              </div> 

              <div class="col-md-3 mb-3">
                <label for="nddept" class="form-label">Department</label>   
                <input class="form-control" type="text" id="nddept" name="nddept" value="<?php echo $selDepnam; ?>" readonly> 
              </div> 

              <div class="col-md-3 mb-3">
                <label for="nddesig" class="form-label">Designation</label>   
                <input class="form-control" type="text" id="nddesig" name="nddesig" value="<?php echo $selDesignam; ?>" readonly> 
              </div> 
            </div>    

            <div class="row">
                <div class="col-md-4 mb-3 d-flex">
                    <div class="col-md-3">
                        <label for="ndstMnth" class="form-label">Month:</label>
                        <input class="form-control" type="text" id="ndstMnth" name="ndstMnth" value="<?php echo $selMonth; ?>" readonly> 
                    </div>                        
                    <div class="col-md-3 mx-2">
                        <label for="ndstyer" class="form-label">Year:</label>
                        <input class="form-control" type="number" id="ndstyer" name="ndstyer" min="2023" max="2026" value="<?php echo $selYear; ?>" readonly>
                    </div>                        
                    <div class="col-md-3">
                        <label for="ndstwrkDay" class="form-label">No Of Work Days:</label>
                        <input class="form-control" type="number" id="ndstwrkDay" name="ndstwrkDay" min="5" max="26" value="<?php echo $selWorkDys; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="ndstBasSlry" class="form-label">Basic Salary:</label>
                <input class="form-control" type="text" id="ndstBasSlry" name="ndstBasSlry" value="<?php echo $selBasic; ?>" required>
              </div>                        
              <div class="col-md-4 mb-3">
                <label for="ndstSlryIna" class="form-label">Salary Increment(A):</label>
                <input class="form-control" type="text" id="ndstSlryIna" name="ndstSlryIna" value="0" value="<?php echo $selIncreA; ?>" required>
              </div>                                                 
              <div class="col-md-4 mb-3">
                <label for="ndstSlryInb" class="form-label">Salary Increment(B):</label>
                <input class="form-control" type="text" id="ndstSlryInb" name="ndstSlryInb" value="0" value="<?php echo $selIncreB; ?>" required>
              </div>                                                 
            </div>

            <div class="row">
              <div class="col-md-3 mb-4">
                <label for="ndstAlOn" class="form-label">Special Allowance:</label>
                <input class="form-control" type="text" id="ndstAlOn" name="ndstAlOn" value="0" value="<?php echo $selSpeAllw; ?>" required>
              </div>                                                 
              <div class="col-md-3 mb-4">
                <label for="ndstAlTw" class="form-label">Expertise Allowance:</label>
                <input class="form-control" type="text" id="ndstAlTw" name="ndstAlTw" value="0" value="<?php echo $selExpAllw; ?>" required>
              </div>                                                 
            </div>

        <div class="card">
          <div class="card-body ">

            <label for="ndstAdvSlry" class="form-label" style="font-weight: bold; text-decoration: underline;">Deduction</label>

            <div class="row">
              <div class="col-md-3 mb-4">
                <label for="ndstnopy" class="form-label">No pay:</label>
                <input class="form-control" type="text" id="ndstnopy" name="ndstnopy" value="0" value="<?php echo $selNoPay; ?>" required>
              </div>
            </div>  

            <div class="row">
              <!-- <div class="col-md-3 mb-3">
                <label for="ndstDedOn" class="form-label">EPF(8%):</label>
                <input class="form-control" type="text" id="ndstDedOn" name="ndstDedOn" value="0" required>
              </div>                                                  -->
              <div class="col-md-3 mb-3">
                <label for="ndstadvnce" class="form-label">Advance:</label>
                <input class="form-control" type="text" id="ndstadvnce" name="ndstadvnce" value="0" value="<?php echo $selAdvance; ?>" required>
              </div>                                                 
              <div class="col-md-3 mb-3">
                <label for="ndstmoble" class="form-label">Mobile bill:</label>
                <input class="form-control" type="text" id="ndstmoble" name="ndstmoble" value="0" value="<?php echo $selMobBill; ?>" required>
              </div>                                                 
              <div class="col-md-3 mb-3">
                <label for="ndstlon" class="form-label">Loan:</label>
                <input class="form-control" type="text" id="ndstlon" name="ndstlon" value="0" value="<?php echo $selLoan; ?>" required>
              </div>                                               
            </div>

            <div class="row">
            <div class="col-md-6 mb-3 d-flex">
                <div class="col-md-6">
                    <label for="ndstIncmTax">Income Tax:</label>
                    <input class="form-control" type="text" id="ndstIncmTax" name="ndstIncmTax" value="0" value="<?php echo $selIncomeTx; ?>" required>
                </div>                                                 
                <div class="col-md-6 mx-2">
                    <label for="ndstHldTax">Withholding Tax:</label>
                    <input class="form-control" type="text" id="ndstHldTax" name="ndstHldTax" value="0" value="<?php echo $selWithHlTx; ?>" required>
                </div>
            </div>
            </div>
        </div>
    </div> 
            <div class="row">
                <div class="col-md-12 mb-3">
                     <button class="w-10 btn btn-primary btn-lg" type="submit" style="margin-top: 20px;">Submit</button>
                </div>
            </div>
            
          </div>
        </div>
      </form>
      <!-- sj-salMang form end -->

      <!-- Main Footer -->
      <?php include_once("../SJ-headtopfooter/sj-footer.php");?>
    </div><!-- main -->

    <script src="../SJ-assets-lib/lib/jquery/jquery.min.js"></script>
    <script src="../SJ-assets-lib/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../SJ-assets-lib/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    <script src="../SJ-assets-lib/lib/parsleyjs/parsley.min.js"></script>

    <script src="../SJ-assets-lib/js/script.js"></script>

  </body>
</html>
