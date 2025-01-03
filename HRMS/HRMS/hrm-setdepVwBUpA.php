<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
$updUId=$_SESSION['mfin'];
$UpdeId=$_SESSION['UpDepID'];
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
$udpnm=tt_inpt($_POST['dhdpnm']);
}

if(empty($udpnm) || $udpnm==''){
    header("location:hrm-setdepVwBUp.php");
    die();
}

$sqlSelectRecord = "SELECT * FROM hrm_setdepart WHERE hrm_DepNam = '$udpnm'";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);
if($sqlScriptExecution->num_rows>0) {

    echo "This Department is available";
    die();
}

$sqlSelectRecord = "SELECT * FROM hrm_setdepart WHERE hrm_DepUId = '$updUId'";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);
if($sqlScriptExecution->num_rows>0) {

    echo "This Record is available";
}
else{
    $sql = "UPDATE hrm_setdepart SET hrm_DepNam='$udpnm', hrm_DepUId = '$updUId' WHERE hrm_DepRwId ='$UpdeId'";
    if(mysqli_query($tdconton, $sql)){
        //echo "Records were updated successfully.";
        include('hrm-setdepVwBUpAVw.php');
    } 
}

?>

