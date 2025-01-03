<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
$HolUId=$_SESSION['mfin'];
$HolIpAdds=$_SERVER['REMOTE_ADDR'];
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
$nHolin=tt_inpt($_POST['ndholnam']);
$nHoliDesp=tt_inpt($_POST['ndholdesp']);
}

$nHoliCretdBy=1;

if(empty($nHolin) || $nHolin==''){
    header("location:hrm-holi.php");
    die();
}

$SelDet = "SELECT * FROM hrm_holidy WHERE hrm_HoliUniId='$HolUId'";
$SelDetExec = $tdconton->query($SelDet);
if($SelDetExec->num_rows>0) {

	echo "This Records were available";
}

else{

$SqlData="INSERT INTO hrm_holidy(hrm_HoliName,hrm_HoliDescrip,hrm_HoliUniId,hrm_HoliIpAdds,hrm_HoliCretdBy)
VALUES ('".$nHolin."','".$nHoliDesp."','".$HolUId."','".$HolIpAdds."','".$nHoliCretdBy."')";

if (mysqli_query($tdconton,$SqlData))
{
    $holLast_id= mysqli_insert_id($tdconton);
}

}

$sqlSelectRecord = "SELECT * FROM hrm_holidy WHERE hrm_HoliRwId = '$holLast_id'";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);
if($sqlScriptExecution->num_rows>0) {
    while($rowidno= $sqlScriptExecution->fetch_assoc())
    {
        $selHliTd= $rowidno['hrm_HoliRwId'];
        $selHliNam = $rowidno['hrm_HoliName'];
        $selHliDesp = $rowidno['hrm_HoliDescrip'];
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
            <li class="breadcrumb-item active" aria-current="page">Holiday</li>
          </ol>
          <h4 class="main-title mb-0">View, added details of Holiday</h4>
        </div>
      </div>

      <!--Create New User-->
      
        





<?php
// First Name was change to ID No

echo "Holiday Name  : $selHliNam"; echo "<br>";
echo "Description : $selHliDesp"; echo "<br>";
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




