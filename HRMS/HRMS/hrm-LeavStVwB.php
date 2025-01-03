<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
include_once("../SJ-dbcona/dhh-jConntAB.php");
$_SESSION['UpLvStID']=$_GET['fidb'];

include('hrm-LeavStVwBUp.php');
?>