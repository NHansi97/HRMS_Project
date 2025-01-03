<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
unset($_SESSION['mfin']);
$_SESSION['mfin']=uniqid();
$UplvstId=$_SESSION['UpLvStID'];
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
            <li class="breadcrumb-item active" aria-current="page">Leave Setup</li>
          </ol>
          <h4 class="main-title mb-0">Update Details of Leave Setup</h4>
        </div>
      </div>

      <!--Create New User-->
      
        

<?php
$sqlSelectRecord = "SELECT * FROM hrm_leavsetup WHERE hrm_LvSetRwId = '$UplvstId'";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);
if($sqlScriptExecution->num_rows>0) {
    while($rowidno= $sqlScriptExecution->fetch_assoc())
    {
        $selLvID= $rowidno['hrm_LeaveRwId'];
        $SelLv="SELECT * FROM hrm_setleave WHERE hrm_LeaveRwId = '$selLvID'";
        $SelLvexec=mysqli_query($tdconton,$SelLv);
        if(mysqli_num_rows($SelLvexec)>0){
            while($rowCat=mysqli_fetch_assoc($SelLvexec)){
    
            $Leavnm=$rowCat["hrm_LeaveNam"];
            
            }
        }

        $seldEPID = $rowidno['hrm_DepRwId'];
        $SeleSem="SELECT * FROM hrm_setdepart WHERE hrm_DepRwId = '$seldEPID'";
        $SeleSemexec=mysqli_query($tdconton,$SeleSem);
        if(mysqli_num_rows($SeleSemexec)>0){
            while($rowCat=mysqli_fetch_assoc($SeleSemexec)){
                            
                $depnam=$rowCat["hrm_DepNam"];
                                    
                 }
            }
        $selDesiId = $rowidno['hrm_DesRwId'];
        $SeleDES="SELECT * FROM hrm_setdesig WHERE hrm_DesRwId = '$selDesiId'";
        $SeleDESexec=mysqli_query($tdconton,$SeleDES);
        if(mysqli_num_rows($SeleDESexec)>0){
            while($rowCat=mysqli_fetch_assoc($SeleDESexec)){
    
                $desnam=$rowCat["hrm_DesNam"];
            
            }
        }
        $selGradId= $rowidno['hrm_GradRwId'];
        $SeleGrd="SELECT * FROM hrm_setgrad WHERE hrm_GradRwId = '$selGradId'";
        $SeleGrdexec=mysqli_query($tdconton,$SeleGrd);
        if(mysqli_num_rows($SeleGrdexec)>0){
            while($rowCat=mysqli_fetch_assoc($SeleGrdexec)){
    
            $Grdnam=$rowCat["hrm_GradNam"];
            
            }
        }        
        $selGendId = $rowidno['hrm_GendrRwId'];
        $SeleGn="SELECT * FROM hrm_setgendr WHERE hrm_GendrRwId = '$selGendId'";
        $SeleGnexec=mysqli_query($tdconton,$SeleGn);
        if(mysqli_num_rows($SeleGnexec)>0){
            while($rowCat=mysqli_fetch_assoc($SeleGnexec)){
    
            $Gendrnam=$rowCat["hrm_GendrNam"];
            
            }
        }
        $selCryId = $rowidno['hrm_CarryRwId'];
        $SeleCr="SELECT * FROM hrm_setcarry WHERE hrm_CarryRwId = '$selCryId'";
        $SeleCrexec=mysqli_query($tdconton,$SeleCr);
        if(mysqli_num_rows($SeleCrexec)>0){
            while($rowCat=mysqli_fetch_assoc($SeleCrexec)){
    
            $Caryovnam=$rowCat["hrm_CarryNam"];
            
            }
        }
        $selValiId= $rowidno['hrm_ValidRwId'];
        $Selevl="SELECT * FROM hrm_setvalid WHERE hrm_ValidRwId = '$selValiId'";
        $Selevlexec=mysqli_query($tdconton,$Selevl);
        if(mysqli_num_rows($Selevlexec)>0){
            while($rowCat=mysqli_fetch_assoc($Selevlexec)){
    
            $Valinam=$rowCat["hrm_ValidNam"];

            
            }
        }
        $selTotDy = $rowidno['hrm_LvSetTotDay'];
        $selPrcPrMN = $rowidno['hrm_LvSetPrMnth'];
        $selEncDy= $rowidno['hrm_LvSetEncDy'];
        $selmnFreq = $rowidno['hrm_LvSetMnthfre'];
        $selBridId = $rowidno['hrm_BridRwId'];
        $SeleSem="SELECT * FROM hrm_setbridge WHERE hrm_BridRwId = '$selBridId'";
        $SeleSemexec=mysqli_query($tdconton,$SeleSem);
        if(mysqli_num_rows($SeleSemexec)>0){
            while($rowCat=mysqli_fetch_assoc($SeleSemexec)){
    
            $Bridgnam=$rowCat["hrm_BridNam"];
            
            }
        }
		
    }
}
?>
                <form class="needs-validation" action="hrm-LeavStVwBUpA.php" method="POST" novalidate autocomplete="off">
                <div class="card">
                    <div class="card-body">

                    <div class="row">
                    <div class="col-md-6 mb-3">
                            <label for="ndmnthfre" class="form_label">Leave Setup Id :</label>
                            <input type="text" id="ndmnthfre" name="ndmnthfre" value="<?php echo $UplvstId; ?>" readonly>
                    </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="dlvnam" class="form_label">Leave Name :</label>
                                <select class="form-select" name="dlvnam" id="dlvnam" required>
                            <option value="" selected><?php echo $Leavnm; ?></option>
                                <?php
                                $SelLv="SELECT * FROM hrm_setleave ORDER BY hrm_LeaveRwId DESC";
                                $SelLvexec=mysqli_query($tdconton,$SelLv);
                                if(mysqli_num_rows($SelLvexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($SelLvexec)){
                            
                                    echo "<option value='".$rowCat["hrm_LeaveRwId"]."'>".$rowCat["hrm_LeaveNam"]."</option>";
                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>

                            <div class="col-md-6 mb-3">
                            <label for="ddepnam" class="form_label">Department :</label>
                                <select class="form-select" name="ddepnam" id="ddepnam" required>
                            <option value="" selected><?php echo $depnam; ?></option>
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
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="ddesnam" class="form_label">Designation :</label>
                                <select class="form-select" name="ddesnam" id="ddesnam" required>
                            <option value="" selected><?php echo $desnam;  ?></option>
                                <?php
                                $SeleDES="SELECT * FROM hrm_setdesig ORDER BY hrm_DesRwId DESC";
                                $SeleDESexec=mysqli_query($tdconton,$SeleDES);
                                if(mysqli_num_rows($SeleDESexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($SeleDESexec)){
                            
                                    echo "<option value='".$rowCat["hrm_DesRwId"]."'>".$rowCat["hrm_DesNam"]."</option>";
                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>

                            <div class="col-md-6 mb-3">
                            <label for="dgrnam" class="form_label">Grade :</label>
                                <select class="form-select" name="dgrnam" id="dgrnam" required>
                            <option value="" selected><?php echo $Grdnam; ?></option>
                                <?php
                                $SeleGrd="SELECT * FROM hrm_setgrad ORDER BY hrm_GradRwId DESC";
                                $SeleGrdexec=mysqli_query($tdconton,$SeleGrd);
                                if(mysqli_num_rows($SeleGrdexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($SeleGrdexec)){
                            
                                    echo "<option value='".$rowCat["hrm_GradRwId"]."'>".$rowCat["hrm_GradNam"]."</option>";
                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="dgennam" class="form_label">Gender :</label>
                            <select class="form-select" name="dgennam" id="dgennam" required>
                            <option value="" selected><?php echo $Gendrnam; ?></option>
                                <?php
                                $SeleGn="SELECT * FROM hrm_setgendr ORDER BY hrm_GendrRwId DESC";
                                $SeleGnexec=mysqli_query($tdconton,$SeleGn);
                                if(mysqli_num_rows($SeleGnexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($SeleGnexec)){
                            
                                    echo "<option value='".$rowCat["hrm_GendrRwId"]."'>".$rowCat["hrm_GendrNam"]."</option>";
                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>

                            <div class="col-md-6 mb-3">
                            <label for="dcrynam" class="form_label">Caryy Over :</label>
                                <select class="form-select" name="dcrynam" id="dcrynam" required>
                            <option value="" selected><?php echo $Caryovnam; ?></option>
                                <?php
                                $SeleCr="SELECT * FROM hrm_setcarry ORDER BY hrm_CarryRwId DESC";
                                $SeleCrexec=mysqli_query($tdconton,$SeleCr);
                                if(mysqli_num_rows($SeleCrexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($SeleCrexec)){
                            
                                    echo "<option value='".$rowCat["hrm_CarryRwId"]."'>".$rowCat["hrm_CarryNam"]."</option>";
                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="dvalnam" class="form_label">Validity :</label>
                                <select class="form-select" name="dvalnam" id="dvalnam" required>
                            <option value="" selected><?php echo $Valinam; ?></option>
                                <?php
                                $Selevl="SELECT * FROM hrm_setvalid ORDER BY hrm_ValidRwId DESC";
                                $Selevlexec=mysqli_query($tdconton,$Selevl);
                                if(mysqli_num_rows($Selevlexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($Selevlexec)){
                            
                                    echo "<option value='".$rowCat["hrm_ValidRwId"]."'>".$rowCat["hrm_ValidNam"]."</option>";

                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                            <label for="dtotdy" class="form_label">Total Days :</label>
                            <input type="number" id="dtotdy" name="dtotdy" min="0" max="30" value="<?php echo $selTotDy; ?>" required>
                            </div>
        
                            <div class="col-md-3 mb-3">
                            <label for="dprmnth" class="form_label">Per Month :</label>
                            <input type="number" id="dprmnth" name="dprmnth" min="0" max="30" value="<?php echo $selPrcPrMN; ?>" required>
                            </div>
                            </div>
                        </div>

                        <hr>

                        <h><b>Encashment Details</b></h>
                        <br>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="dencshdy" class="form_label">Encashment Days :</label>
                            <input type="number" id="dencshdy" name="dencshdy" min="0" max="30" value="<?php echo $selEncDy; ?>" required>
                            </div>

                            <div class="col-md-6 mb-3">
                            <label for="dmnthfre" class="form_label">Month Frequency :</label>
                            <input type="number" id="dmnthfre" name="dmnthfre" min="0" max="30" value="<?php echo $selmnFreq; ?>" required>Day(s)
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                            <label for="dbridg" class="form_label">Bridging :</label>
                                <select class="form-select" name="dbridg" id="dbridg" required>
                            <option value="" selected><?php echo $Bridgnam; ?></option>
                                <?php
                                $SeleSem="SELECT * FROM hrm_setbridge ORDER BY hrm_BridRwId DESC";
                                $SeleSemexec=mysqli_query($tdconton,$SeleSem);
                                if(mysqli_num_rows($SeleSemexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($SeleSemexec)){
                            
                                    echo "<option value='".$rowCat["hrm_BridRwId"]."'>".$rowCat["hrm_BridNam"]."</option>";
                                    
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
