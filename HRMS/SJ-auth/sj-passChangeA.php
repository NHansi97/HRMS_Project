<?php session_start();
include_once("../SJ-dbcona/dhh-jConntAB.php");
if(!$_SESSION['userid']) {
  header("Location:../index.php");
}
$staff= $_SESSION['userid'];
$userid = $_SESSION['username'];
$pasword=$npasword="";
//trim the data
function tt_inpt($dte)
{      
    $dte = trim($dte);
    $dte = stripslashes($dte);
    $dte = htmlspecialchars($dte);
    return $dte;
}
//Change Password
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
$pasword=tt_inpt(md5($_POST['chlogPassw']));
$npasword=tt_inpt(md5($_POST['nchlogPassw']));
}

if(empty($pasword) || $npasword==''){
    header("location:sj-passChange.php");
    die();
}

$sqlPass = "SELECT * FROM sj_dhh_login WHERE SJ_DHH_UserID='$staff'";
$scriptExecutionpass = $tdconton->query($sqlPass);

if($scriptExecutionpass->num_rows>0) {
    while($rowidno=$scriptExecutionpass->fetch_assoc())
    {
        $lrowid= $rowidno['SJ_DHH_RowID'];
        $lstaffid = $rowidno['SJ_DHH_UserID'];
        $luserid = $rowidno['SJ_DHH_UserName'];
        $lpassw = $rowidno['SJ_DHH_Password'];
        $lroleu = $rowidno['SJ_DHH_Prive'];
        $lstatus = $rowidno['SJ_DHH_Status'];
    }
    if($staff==$lstaffid && $userid==$luserid){
        if($pasword==$lpassw){
            if ($pasword != $npasword) {
                $sqlNewPass="UPDATE sj_dhh_login SET SJ_DHH_Password='$npasword' WHERE SJ_DHH_RowID='$lrowid'";
                $scriptExecutionpass = $tdconton->query($sqlNewPass);
                $pwmsg = "<p class='text-success'>Password Change Successfully<br>Sign in Again</p>";
                $_SESSION['pwmsg'] = $pwmsg;
                header("location:../index.php");
            }else{
                $pwmsg= "<p class='text-danger'>New Password Same As Current Password</p>";
                $_SESSION['pwmsg'] = $pwmsg;
                header("location:sj-passChange.php");
            }
        }else {
            $pwmsg= "<p class='text-danger'>Invalid Login</p>";
            $_SESSION['pwmsg'] = $pwmsg;
            header("location:sj-passChange.php");
        }
    }else{
        header("location:SJ-login/index.php");
    }
}else{
    $pwmsg= "<p class='text-danger'>No Record</p>";
    $_SESSION['pwmsg'] = $pwmsg;
    header("location:sj-passChange.php");
}
mysqli_close($tdconton);
?>