<?php  session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
$upUId=$_SESSION['mfin'];
$UpHolId=$_SESSION['EdHoliID'];
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
$uHolnm=tt_inpt($_POST['dhHlinm']);
$uHoldep=tt_inpt($_POST['dhHlides']);
}

if(empty($uHolnm) || $uHolnm==''){
    header("location:hrm-holiVwBUp.php");
    die();
}

$sqlSelectRecord = "SELECT * FROM hrm_holidy WHERE hrm_HoliUniId = '$upUId'";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);
if($sqlScriptExecution->num_rows>0) {

    echo "This Record is available";
}
else{
    $sql = "UPDATE hrm_holidy SET hrm_HoliName='$uHolnm', hrm_HoliDescrip='$uHoldep', hrm_HoliUniId = '$upUId' WHERE hrm_HoliRwId ='$UpHolId'";
    if(mysqli_query($tdconton, $sql)){
        //echo "Records were updated successfully.";
        include('hrm-holiVwBUpBV.php');
    } 
}

?>

