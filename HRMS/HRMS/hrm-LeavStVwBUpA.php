<?php  session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
$upUId=$_SESSION['mfin'];
$UplvstId=$_SESSION['UpLvStID'];
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
    $slev=tt_inpt($_POST['dlvnam']);
    $sdprt=tt_inpt($_POST['ddepnam']);
    $sdesg=tt_inpt($_POST['ddesnam']);
    $sgrd=tt_inpt($_POST['dgrnam']);
    $sgend=tt_inpt($_POST['dgennam']);
    $scryov=tt_inpt($_POST['dcrynam']);
    $svali=tt_inpt($_POST['dvalnam']);
    $sltotdy=tt_inpt($_POST['dtotdy']);
    $sprcpmn=tt_inpt($_POST['dprmnth']);
    $sencshdy=tt_inpt($_POST['dencshdy']);
    $smntfreq=tt_inpt($_POST['dmnthfre']);
    $sbrdg=tt_inpt($_POST['dbridg']);
}

//echo "grd".$sgrd;
if(empty($slev) || $slev==''){
    header("location:hrm-LeavStVwBUp.php");
    die();
}

$sqlSelectRecord = "SELECT * FROM hrm_leavsetup WHERE hrm_LvSetUnId = '$upUId'";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);
if($sqlScriptExecution->num_rows>0) {

    echo "This Record is available";
}
else{
    $sql = "UPDATE hrm_leavsetup SET hrm_LeaveRwId='$slev', hrm_DesRwId='$sdesg', hrm_GendrRwId='$sgend', hrm_ValidRwId='$svali', hrm_LvSetPrMnth='$sprcpmn', hrm_DepRwId='$sdprt', hrm_GradRwId='$sgrd', hrm_CarryRwId='$scryov', hrm_LvSetTotDay='$sltotdy', hrm_LvSetEncDy='$sencshdy', hrm_BridRwId='$sbrdg', hrm_LvSetMnthfre='$smntfreq', hrm_LvSetUnId = '$upUId' WHERE hrm_LvSetRwId ='$UplvstId'";
    if(mysqli_query($tdconton, $sql)){
        //echo "Records were updated successfully.";
       // include('hrm-LeavStVwBUpAVw.php');
    } 
}

?>

