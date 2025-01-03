<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
$uplUId=$_SESSION['mfin'];
$UpLvId=$_SESSION['UpLvID'];
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
$ulvnm=tt_inpt($_POST['dhlvnm']);
}

if(empty($ulvnm) || $ulvnm==''){
    header("location:hrm-setleavVwBUp.php");
    die();
}

$sqlSelectRecord = "SELECT * FROM hrm_setleave WHERE hrm_LeaveUnId = '$uplUId' OR hrm_LeaveNam='$ulvnm'";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);
if($sqlScriptExecution->num_rows>0) {

    echo "This Leave name is available";
}
else{
    $sql = "UPDATE hrm_setleave SET hrm_LeaveNam='$ulvnm', hrm_LeaveUnId= '$uplUId' WHERE hrm_LeaveRwId ='$UpLvId'";
    if(mysqli_query($tdconton, $sql)){
        //echo "Records were updated successfully.";
        include('hrm-setleavVwBUpAVw.php');
    } 
}

?>

