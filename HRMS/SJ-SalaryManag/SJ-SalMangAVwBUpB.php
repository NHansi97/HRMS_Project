<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
$UpSalId=$_SESSION['UpSalID'];
include_once("../SJ-dbcona/dhh-jConntAB.php");
$upUId=$_SESSION['mfin'];

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
    $salempno=tt_inpt($_POST['ndempnum']); 
    $salemnam=tt_inpt($_POST['ndempnam']); 
    $salstaf=tt_inpt($_POST['ndstnam']);
    $saldept=tt_inpt($_POST['nddept']); 
    $saldesig=tt_inpt($_POST['nddesig']); 
    $salmnth=tt_inpt($_POST['ndstMnth']);
    $salyer=tt_inpt($_POST['ndstyer']);
    $salWrkdys=tt_inpt($_POST['ndstwrkDay']);
    $salBasSlry=tt_inpt($_POST['ndstBasSlry']);
    $salInca=tt_inpt($_POST['ndstSlryIna']);
    $salIncb=tt_inpt($_POST['ndstSlryInb']);
    $salAlwOn=tt_inpt($_POST['ndstAlOn']);
    $salAlwTw=tt_inpt($_POST['ndstAlTw']);
    $salnopy=tt_inpt($_POST['ndstnopy']);
    $saladvnc=tt_inpt($_POST['ndstadvnce']);
    $salmobl=tt_inpt($_POST['ndstmoble']);
    $salloan=tt_inpt($_POST['ndstlon']);
    $salIncTax=tt_inpt($_POST['ndstIncmTax']);
    $salHldTax=tt_inpt($_POST['ndstHldTax']);
}

if(empty($salBasSlry) || $salBasSlry==''){
    header("location:SJ-SalMangAVwBUp.php");
    die();
}

$salGrsSlry=($salBasSlry+$salInca+$salIncb+$salAlwOn+$salAlwTw);

//EPF 8% (Basic salary + Salary Increment A + Salary Increment B)*8%
$salEpfEight=(($salBasSlry+$salInca+$salIncb)*(8/100));

//Total Deductions  ==  Salary Advance + EPF 8% + Deduction One + Deduction Two + Deduction Three + Deduction Four + Income Tax +With Holding Tax )
$salTotDed=($salnopy+$salEpfEight+$saladvnc+$salmobl+$salloan+$salIncTax+$salHldTax);

//Net Salary  = Gross salary - Total Deductions
$salNetSlry=($salGrsSlry-$salTotDed);

$SelSal = "SELECT * FROM hrm_staffmonsal WHERE SalMon_UnqId='$upUId'";
$SelSalExec = $tdconton->query($SelSal);
if($SelSalExec->num_rows>0) {

	echo "This Records were available";
}
else{
    $sql = "UPDATE hrm_staffmonsal SET Sal_Workdays='$salWrkdys', Sal_BasicSlry='$salBasSlry', Sal_IncreA='$salInca', Sal_IncreB='$salIncb', Sal_SpeAllow='$salAlwOn', Sal_ExpAllow='$salAlwTw', Sal_Gross='$salGrsSlry', Sal_EPF='$salEpfEight', Sal_NoPay='$salnopy', Sal_Advance='$saladvnc', Sal_MobleBill='$salmobl', Sal_Loan='$salloan', Sal_IncmTax='$salIncTax', Sal_WithHldTax='$salHldTax', Sal_DedTot='$salTotDed', Sal_SalryNet='$salNetSlry', SalMon_UnqId='$upUId' WHERE SalMon_RwId='$UpSalId'";
    if(mysqli_query($tdconton, $sql)){
        //echo "Records were updated successfully.";
        include('SJ-SalMangAVwBUpV.php');                                                                                                                                                                                                                                                                                                                                               
    } 
}

?>
