<?php session_start();

include_once("SJ-dbcona/dhh-jConntAB.php");

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
$LogUname=tt_inpt($_POST['logUsername']);
$LogPWord=tt_inpt(md5($_POST['logPassw']));
//$LogPWord=tt_inpt(md5($_POST['logPassw']));
}

if(empty($LogUname) || $LogUname==''){
    header("location:index.php");
    die();
}

        $sqlstaffnam = "SELECT * FROM sj_dhh_login WHERE SJ_DHH_UserName='$LogUname'";
        $scriptExecutionname = $tdconton->query($sqlstaffnam);
        if($scriptExecutionname->num_rows>0) {
            while($rowidno=$scriptExecutionname->fetch_assoc())
            {
                $lstaffid = $rowidno['SJ_DHH_UserID'];
                $ndusernam = $rowidno['SJ_DHH_UserName'];
                $ndpassw = $rowidno['SJ_DHH_Password'];
                $ndroleu = $rowidno['SJ_DHH_Prive'];
            }
        }
        
        $_SESSION['username']=$ndusernam;
        $_SESSION['password']=$ndpassw;
        $_SESSION['privilege']=$ndroleu;
        $_SESSION['userid']=$lstaffid;
        
        if(($ndusernam == $LogUname) && ($ndpassw == $LogPWord)) {
            
                echo "Login Successfull";
                header("location:dashboard/index.php");
            }else {
        
            $msg= "<p class='text-danger'>Invalid Login</p>";
            $_SESSION['error'] = $msg;
            header("location:index.php");
        }

        ////////////////
mysqli_close($tdconton);
?>