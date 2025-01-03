<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
include_once("../SJ-dbcona/dhh-jConntAB.php");


	if(isset($_POST['idNumber'])) {
		$idNumber = $_POST['idNumber'];
		$nNquery = "SELECT count(*) as cnt FROM `hrm_setdesig` WHERE hrm_DesNam='".$idNumber."'";
		$nNresult = mysqli_query($tdconton,$nNquery);	
		$nNrow = mysqli_fetch_array($nNresult,MYSQLI_ASSOC);

		if($nNrow['cnt'] == 0){
			echo '<span class="text-success">This <b>'.$idNumber.'</b> is available!</span>';

		} else {
			echo '<span class="text-danger">This <b>'.$idNumber.'</b> is already taken!</span>';

		}
	}

    mysqli_close($tdconton);
?>