<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
$VwlvstId=$_SESSION['ViwLvStID'];
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
          <h4 class="main-title mb-0">View Single Data of Leave Setup</h4>
        </div>
      </div>

      <!--Create New User-->
      
        


<?php
$sqlSelectRecord = "SELECT * FROM hrm_leavsetup WHERE hrm_LvSetRwId = '$VwlvstId'";
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
<?php

echo "Leave Name : $Leavnm"; echo "<br>";
echo "Department : $depnam"; echo "<br>";
echo "Designation : $desnam"; echo "<br>";//
echo "Grade : $Grdnam"; echo "<br>";
echo "Gender : $Gendrnam"; echo "<br>";//
echo "Caryy Over : $Caryovnam"; echo "<br>";
echo "Validity : $Valinam"; echo "<br>";
echo "Total Days : $selTotDy"; echo "<br>";
echo "Per Month : $selPrcPrMN"; echo "<br>";
echo "Encashment Days : $selEncDy"; echo "<br>";
echo "Month Frequency : $selmnFreq"; echo "<br>";
echo "Bridging : $Bridgnam"; echo "<br>";
echo "<br>";

mysqli_close($tdconton);

?>




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
