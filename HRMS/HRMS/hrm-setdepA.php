<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
$depUId=$_SESSION['mfin'];
$depIpAdds=$_SERVER['REMOTE_ADDR'];
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
$ndepnam=tt_inpt($_POST['hrdepnm']);
}

$ndepCretdBy=1;

if(empty($ndepnam) || $ndepnam==''){
    header("location:hrm-setdep.php");
    die();
}

$SelDe = "SELECT * FROM hrm_setdepart WHERE hrm_DepNam = '$ndepnam'";
$SelDeExec = $tdconton->query($SelDe);
if($SelDeExec->num_rows>0) {

	echo "This Department name was available";
  header("location:hrm-setdep.php");
    die();
}

$SelDet = "SELECT * FROM hrm_setdepart WHERE hrm_DepUId = '$depUId'";
$SelDetExec = $tdconton->query($SelDet);
if($SelDetExec->num_rows>0) {

	echo "This Records were available";
}

else{

$SqlData="INSERT INTO hrm_setdepart(hrm_DepNam,hrm_DepUId,hrm_DepIpAds,hrm_DepCretdBy)
VALUES ('".$ndepnam."','".$depUId."','".$depIpAdds."','".$ndepCretdBy."')";

if (mysqli_query($tdconton,$SqlData))
{
    $depLast_id= mysqli_insert_id($tdconton);
}

}

$sqlSelectRecord = "SELECT * FROM hrm_setdepart WHERE hrm_DepRwId = '$depLast_id'";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);
if($sqlScriptExecution->num_rows>0) {
    while($rowidno= $sqlScriptExecution->fetch_assoc())
    {
        $seldepTd= $rowidno['hrm_DepRwId'];
        $seldepNm = $rowidno['hrm_DepNam'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../SJ-assets-lib/img/favicon.png">
    <title>Authentication - D HELP HUB</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="../SJ-assets-lib/lib/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="../SJ-assets-lib/lib/bootstrap/css/bootstrap.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../SJ-assets-lib/css/style.min.css">
  </head>
  <body>
    <!--side bar-->
    <?php include_once("../SJ-headtopfooter/sj-sidebaar.php");?>

    <!--header-main-->
    <?php include_once("../SJ-headtopfooter/sj-mainheader.php");?>

    <div class="main main-app p-3 p-lg-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
          <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item"><a href="#">Authentication</a></li>
            <li class="breadcrumb-item active" aria-current="page">Department</li>
          </ol>
          <h4 class="main-title mb-0">View Department</h4>
        </div>
      </div>

      <!--Create New User-->
      
        



<?php
// First Name was change to ID No
echo "<br>";
echo "<br>";
echo "Department  : $seldepNm"; echo "<br>";
echo "<br>";

mysqli_close($tdconton);

?>





      
      

      <!--main-footer-->
      <?php include_once("../SJ-headtopfooter/sj-footer.php");?>
    </div><!-- main -->


    <script src="../SJ-assets-lib/lib/jquery/jquery.min.js"></script>
    <script src="../SJ-assets-lib/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../SJ-assets-lib/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    <script src="../SJ-assets-lib/lib/parsleyjs/parsley.min.js"></script>

    <script src="../SJ-assets-lib/js/script.js"></script>

  </body>
</html>
