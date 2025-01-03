<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
$lvRegUId=$_SESSION['mfin_token'];
$lvRegIpAdds=$_SERVER['REMOTE_ADDR'];
include_once("../SJ-dbcona/dhh-jConntAB.php");

//trim the data
function tt_inpt($dte)
{      
    
    $dte = trim($dte);
    $dte = stripslashes($dte);
    $dte = htmlspecialchars($dte);
    return $dte;
}

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
$nmStdat=tt_inpt($_POST['ndstdat']);
$nmEndat=tt_inpt($_POST['ndendat']);
$nmDepnm=tt_inpt($_POST['nddepnam']);
$nmStftyp=tt_inpt($_POST['ndstftyp']);
$nmEmpnm=tt_inpt($_POST['ndempnm']);
}
//echo $nslev;
$nmstat=1;
$nmCretdBy=1;

if(empty($nmStdat) || $nmStdat==''){

    header("location:hrm-LevRegi.php");
    die();
}

$SelDet = "SELECT * FROM hrm_leavreg WHERE LeavReg_UnId = '$lvRegUId' ";
$SelDetExec = $tdconton->query($SelDet);
if($SelDetExec->num_rows>0) {

	echo "This Records were available";
  die();
}
else{

$SqlData="INSERT INTO hrm_leavreg(LeavReg_StDat,LeavReg_EnDat,hrm_DepRwId,Staf_RwId,Emp_RwId,LeavReg_Stats,LeavReg_UnId,LeavReg_IpAds,LeavReg_CretdBy)
VALUES ('".$nmStdat."','".$nmEndat."','".$nmDepnm."','".$nmStftyp."','".$nmEmpnm."','".$nmstat."','".$lvRegUId."','".$lvRegIpAdds."','".$nmCretdBy."')";

if (mysqli_query($tdconton,$SqlData))
{
    $LvrglLast_id= mysqli_insert_id($tdconton);
}

}

$sqlSelectRecord = "SELECT * FROM hrm_leavreg WHERE LeavReg_RwId = '$LvrglLast_id'";
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
          <h4 class="main-title mb-0">View, added details of Leave Register</h4>
        </div>
      </div>

      <!--Create New User-->
      
        


      

<?php
echo "From Date : $selLvRgStdat"; echo "<br>";
echo "To Date : $selLvRgEndat"; echo "<br>";
echo "Department : $depnam"; echo "<br>";
echo "Staff Type : $Stafnm"; echo "<br>";
echo "Employee Name : $Empnm"; echo "<br>";

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
