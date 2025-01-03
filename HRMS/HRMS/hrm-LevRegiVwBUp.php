<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
unset($_SESSION['mfin']);
$_SESSION['mfin']=uniqid();
$UplrgId=$_SESSION['UplrID'];
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
            <li class="breadcrumb-item active" aria-current="page">Leave Register</li>
          </ol>
          <h4 class="main-title mb-0">Update Details of Leave Register</h4>
        </div>
      </div>

      <!--Create New User-->
      
        
      
<?php
$sqlSelectRecord = "SELECT * FROM hrm_leavreg WHERE LeavReg_RwId = '$UplrgId'";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);
if($sqlScriptExecution->num_rows>0) {
    while($rowidno= $sqlScriptExecution->fetch_assoc())
    {
        $selLvRgId= $rowidno['LeavReg_RwId'];
        $selLvRgStdat= $rowidno['LeavReg_StDat'];
        $selLvRgEndat= $rowidno['LeavReg_EnDat'];

        $seldEPID = $rowidno['hrm_DepRwId'];
        $SeleSem="SELECT * FROM hrm_setdepart WHERE hrm_DepRwId = '$seldEPID'";
        $SeleSemexec=mysqli_query($tdconton,$SeleSem);
        if(mysqli_num_rows($SeleSemexec)>0){
            while($rowCat=mysqli_fetch_assoc($SeleSemexec)){
                            
                $depnam=$rowCat["hrm_DepNam"];
                                    
                 }
            }

        $selstfId = $rowidno['Staf_RwId'];
        $SeleDES="SELECT * FROM hrm_setstaf WHERE Staf_RwId = '$selstfId'";
        $SeleDESexec=mysqli_query($tdconton,$SeleDES);
        if(mysqli_num_rows($SeleDESexec)>0){
            while($rowCat=mysqli_fetch_assoc($SeleDESexec)){
    
                $Stafnm=$rowCat["Staf_Nam"];
            
            }
        }

        $selLvRgEmp= $rowidno['Emp_RwId'];
        $SeleGrd="SELECT * FROM hrm_setemp WHERE Emp_RwId = '$selLvRgEmp'";
        $SeleGrdexec=mysqli_query($tdconton,$SeleGrd);
        if(mysqli_num_rows($SeleGrdexec)>0){
            while($rowCat=mysqli_fetch_assoc($SeleGrdexec)){
    
                $Empnm=$rowCat["Emp_Nam"];
            
            }
        }
        
		
    }
}
?>
                <form class="needs-validation" action="hrm-LevRegiVwBUpA.php" method="POST" novalidate autocomplete="off">
                <div class="card">
                    <div class="card-body">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                        <label for="dstd" class="form_label">ID :</label>
                        <input type="text" name="dstd" id="dstd" value="<?php echo $UplrgId; ?>" readonly >
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="dstdat" class="form_label">From Date :</label>
                            <input type="date" name="dstdat" id="dstdat" value="<?php echo $selLvRgStdat; ?>" required >
                            </div>

                            <div class="col-md-6 mb-3">
                            <label for="dendat" class="form_label">To Date :</label>
                            <input type="date" name="dendat" id="dendat" value="<?php echo $selLvRgEndat; ?>" required >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="ddepnam" class="form_label">Department :</label>
                                <select class="form-select" name="ddepnam" id="ddepnam" required>
                            <option value="" selected>---<?php echo $depnam; ?>---</option>
                                <?php
                                $SeleSem="SELECT * FROM hrm_setdepart ORDER BY hrm_DepRwId DESC";
                                $SeleSemexec=mysqli_query($tdconton,$SeleSem);
                                if(mysqli_num_rows($SeleSemexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($SeleSemexec)){
                            
                                    echo "<option value='".$rowCat["hrm_DepRwId"]."'>".$rowCat["hrm_DepNam"]."</option>";
                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>

                            <div class="col-md-6 mb-3">
                            <label for="dstftyp" class="form_label">Staff Type :</label>
                                <select class="form-select" name="dstftyp" id="dstftyp" required>
                            <option value="" selected>---<?php echo $Stafnm; ?>---</option>
                                <?php
                                $SeleDES="SELECT * FROM hrm_setstaf ORDER BY Staf_RwId DESC";
                                $SeleDESexec=mysqli_query($tdconton,$SeleDES);
                                if(mysqli_num_rows($SeleDESexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($SeleDESexec)){
                            
                                    echo "<option value='".$rowCat["Staf_RwId"]."'>".$rowCat["Staf_Nam"]."</option>";
                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="dempnm" class="form_label">Employee Name :</label>
                                <select class="form-select" name="dempnm" id="dempnm" required>
                            <option value="" selected>---<?php echo $Empnm; ?>---</option>
                                <?php
                                $SeleGrd="SELECT * FROM hrm_setemp ORDER BY Emp_RwId DESC";
                                $SeleGrdexec=mysqli_query($tdconton,$SeleGrd);
                                if(mysqli_num_rows($SeleGrdexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($SeleGrdexec)){
                            
                                    echo "<option value='".$rowCat["Emp_RwId"]."'>".$rowCat["Emp_Nam"]."</option>";
                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>
                        </div>

                        <button class="w-18 btn btn-primary btn-lg" type="submit">Update details</button>

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
