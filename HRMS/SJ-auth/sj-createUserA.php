<?php session_start();
include_once("../SJ-dbcona/dhh-jConntAB.php");
$uname=$_SESSION['username'];
if(!$_SESSION['userid']) {
 header("Location:../index.php");
 die();
}

$staffId=$username=$pasword=$userole="";
$status=0;
//trim the data
function tt_inpt($dte)
{      
    $dte = trim($dte);
    $dte = stripslashes($dte);
    $dte = htmlspecialchars($dte);
    return $dte;
}
//Insert New User
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
$useId=tt_inpt($_POST['crtStfID']);
$username=tt_inpt($_POST['crtUsrname']);
$pasword=tt_inpt(md5($_POST['crtPassword']));
$compasword=tt_inpt(md5($_POST['ConfPassword']));
$userole=tt_inpt($_POST['crtrole']);
}

        // Check if passwords match
        if ($pasword !== $compasword) {
            $msgpass = "<p class='text-danger'>Passwords do not match</p>";
            $_SESSION['msg'] = $msgpass;
            header("Location: sj-createUser.php");
            exit();
        }
if(empty($useId) || $useId==''){
    header("location:sj-createUser.php");
    die();
}
$sqlstaffid = "SELECT * FROM sj_dhh_login WHERE SJ_DHH_UserID='$useId'";
$sqlusername = "SELECT * FROM sj_dhh_login WHERE SJ_DHH_UserName='$username'";

$scriptExecutionid = $tdconton->query($sqlstaffid);
$scriptExecutionname = $tdconton->query($sqlusername);

if($scriptExecutionid->num_rows>0){
    $msg = "<p class='text-danger'>Empolyee number Exist</p>";
    $_SESSION['msg'] = $msg;
    header("location:sj-createUser.php");
}elseif ($scriptExecutionname->num_rows>0) {
    $msg= "<p class='text-danger'>Username Exist</p>";
    $_SESSION['msg'] = $msg;
    header("location:sj-createUser.php");
}else {
    $sqlUser="INSERT INTO sj_dhh_login(SJ_DHH_UserID,SJ_DHH_UserName,SJ_DHH_Password,SJ_DHH_Status,SJ_DHH_Prive)
    VALUES ('".$useId."','".$username."','".$pasword."','".$status."','".$userole."')";

    $scriptExecutionuse = $tdconton->query($sqlUser);
    $msg = "<p class='text-success'>New User Created Successfully</p>";
    $_SESSION['msg'] = $msg;
    header("location:sj-createUser.php");
}
mysqli_close($tdconton);
?>