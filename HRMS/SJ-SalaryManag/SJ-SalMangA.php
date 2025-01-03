<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
$SalUId=$_SESSION['mfin_token'];
$SalIpAdds=$_SERVER['REMOTE_ADDR'];
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

//To extract only month without year
//$month = date("m", strtotime($salmnth));

//revert to the index when the records are empty or null
if(empty($salempno) || $salempno==''){  //also need to add basic salary and no. of working days
    header("location:SJ-SalMang.php");
    die();
}

if(empty($salBasSlry) || $salBasSlry==''){  //also need to add basic salary and no. of working days
    header("location:SJ-SalMang.php");
    die();
}

$SelSalp = "SELECT * FROM hrm_staffmonsal WHERE Sal_empno='$salempno'";
$SelSalExecp = $tdconton->query($SelSalp);
if($SelSalExecp->num_rows>0) {

	echo "This employee salary for this month already has included";
    header("location:SJ-SalMang.php");
    die();

}

$salCretdBy=1;

$salGrsSlry=($salBasSlry+$salInca+$salIncb+$salAlwOn+$salAlwTw);

//EPF 8% (Basic salary + Salary Increment A + Salary Increment B)*8%
$salEpfEight=(($salBasSlry+$salInca+$salIncb)*(8/100));

//Total Deductions  ==  Salary Advance + EPF 8% + Deduction One + Deduction Two + Deduction Three + Deduction Four + Income Tax +With Holding Tax )
$salTotDed=($salnopy+$salEpfEight+$saladvnc+$salmobl+$salloan+$salIncTax+$salHldTax);

//Net Salary  = Gross salary - Total Deductions
$salNetSlry=($salGrsSlry-$salTotDed);




$SelSal = "SELECT * FROM hrm_staffmonsal WHERE SalMon_UnqId='$SalUId'";
$SelSalExec = $tdconton->query($SelSal);
if($SelSalExec->num_rows>0) {

	echo "This Records were available";
}
else{

$SqlSalData="INSERT INTO hrm_staffmonsal(Sal_empno,Sal_empnnam,Sal_Stafnam,Sal_Depnam,Sal_Desnam,Sal_Month,Sal_year,Sal_Workdays,Sal_BasicSlry,Sal_IncreA,Sal_IncreB,Sal_SpeAllow,Sal_ExpAllow,Sal_Gross,Sal_EPF,Sal_NoPay,Sal_Advance,Sal_MobleBill,Sal_Loan,Sal_IncmTax,Sal_WithHldTax,Sal_DedTot,Sal_SalryNet,SalMon_UnqId,SalMon_IPadds,SalMon_CretdBy)
VALUES ('".$salempno."','".$salemnam."','".$salstaf."','".$saldept."','".$saldesig."','".$salmnth."','".$salyer."','".$salWrkdys."','".$salBasSlry."','".$salInca."','".$salIncb."','".$salAlwOn."','".$salAlwTw."','".$salGrsSlry."','".$salEpfEight."','".$salnopy."','".$saladvnc."','".$salmobl."','".$salloan."','".$salIncTax."','".$salHldTax."','".$salTotDed."','".$salNetSlry."','".$SalUId."','".$SalIpAdds."','".$salCretdBy."')";

if (mysqli_query($tdconton,$SqlSalData))
{
    $SalLast_id= mysqli_insert_id($tdconton);
    $_SESSION['SalLast_id']=$SalLast_id;
    header("location:SJ-SalMangAAVw.php");

}

}
 ?>
