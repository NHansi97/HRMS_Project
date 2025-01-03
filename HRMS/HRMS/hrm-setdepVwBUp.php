<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
unset($_SESSION['mfin']);
$_SESSION['mfin']=uniqid();
$UpdeId=$_SESSION['UpDepID'];
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
    <!--side bar-->
    <?php include_once("../SJ-headtopfooter/sj-sidebaar.php");?>

    <!--header-main-->
    <?php include_once("../SJ-headtopfooter/sj-mainheader.php");?>

    <div class="main main-app p-3 p-lg-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
          <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item"><a href="#">Authentication</a></li>
            <li class="breadcrumb-item active" aria-current="page">Department</li>
          </ol>
          <h4 class="main-title mb-0">Update Details of Department</h4>
        </div>
      </div>

      <!--Create New User-->
      
        


<?php
$sqlSelectRecord = "SELECT * FROM hrm_setdepart WHERE hrm_DepRwId = '$UpdeId'";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);
if($sqlScriptExecution->num_rows>0) {
    while($rowidno= $sqlScriptExecution->fetch_assoc())
    {
        $seldepTd= $rowidno['hrm_DepRwId'];
        $seldepNm = $rowidno['hrm_DepNam'];
    }
}
?>
                <form class="needs-validation" action="hrm-setdepVwBUpA.php" method="POST" novalidate autocomplete="off">
            
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="dhdpId">Department Id :</label>
                            <input type="text" id="dhdpId" name="dhdpId" value="<?php echo $UpdeId; ?>" readonly>
            
                            </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="dhdpnm">Department Name :</label>
                            <input type="text" id="dhdpnm" name="dhdpnm" value="<?php echo $seldepNm; ?>" maxlength="255" required>
            
                            </div>

                            <div>
                            <button class="w-30 btn btn-primary btn-lg" type="submit">Update details of Department</button>
                            </div>

                    </form>











      
      

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
