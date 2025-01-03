<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
$updesUId=$_SESSION['mfin'];
$UpdesId=$_SESSION['UpDesID'];
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
$udsnm=tt_inpt($_POST['dhdsnm']);
}

if(empty($udsnm) || $udsnm==''){
    header("location:hrm-setdesgVwBUp.php");
    die();
}

$sqlSelectRecord = "SELECT * FROM hrm_setdesig WHERE hrm_DesNam = '$udsnm'";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);
if($sqlScriptExecution->num_rows>0) {

    echo "This Designation name is available";
    die();
}

$sqlSelectRecord = "SELECT * FROM hrm_setdesig WHERE hrm_DesUnId = '$updesUId'";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);
if($sqlScriptExecution->num_rows>0) {

    echo "This Record is available";
}
else{
    $sql = "UPDATE hrm_setdesig SET hrm_DesNam='$udsnm', hrm_DesUnId = '$updesUId' WHERE hrm_DesRwId ='$UpdesId'";
    if(mysqli_query($tdconton, $sql)){
        //echo "Records were updated successfully.";
        include('hrm-setdesgVwBUpAVw.php');
    } 
}

?>

