<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
$uplrUnId=$_SESSION['mfin'];
$UplrgId=$_SESSION['UplrID'];
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
    $sstrtdat=tt_inpt($_POST['dstdat']);
    $sendat=tt_inpt($_POST['dendat']);
    $sdpnm=tt_inpt($_POST['ddepnam']);
    $sstftyp=tt_inpt($_POST['dstftyp']);
    $semplnm=tt_inpt($_POST['dempnm']);
}

//echo "grd".$sgrd;
if(empty($semplnm) || $semplnm==''){
    header("location:hrm-LevRegiVwBUp.php");
    die();
}

$sqlSelectRecord = "SELECT * FROM hrm_leavreg WHERE LeavReg_UnId = '$uplrUnId'";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);
if($sqlScriptExecution->num_rows>0) {

    echo "This Record is available";
}
else{
    $sql = "UPDATE hrm_leavreg SET LeavReg_StDat='$sstrtdat', LeavReg_EnDat='$sendat', hrm_DepRwId='$sdpnm', Staf_RwId='$sstftyp', Emp_RwId='$semplnm', LeavReg_UnId = '$uplrUnId' WHERE LeavReg_RwId = '$UplrgId' ";
    if(mysqli_query($tdconton, $sql)){

         include('hrm-LevRegiVwBUpAV.php');
    } 
}

?>

