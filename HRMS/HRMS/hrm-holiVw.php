<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
include_once("../SJ-dbcona/dhh-jConntAB.php");
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
            <li class="breadcrumb-item active" aria-current="page">Holidays</li>
          </ol>
          <h4 class="main-title mb-0">View, All details of Holidays</h4>
        </div>
      </div>

      <!--Create New User-->
      
        




<!--  First Name was change to ID No -->
<table>
  <tr>
    <th>Holiday Name</th>
    <th>Description</th>
    <th>Actions</th>
  </tr>

  <tr>
    <?php
$sqlSelectRecord = "SELECT * FROM hrm_holidy ORDER BY hrm_HoliRwId DESC";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);
if($sqlScriptExecution->num_rows>0) {
    while($rowidno= $sqlScriptExecution->fetch_assoc())
    {
        ?>
    </td>
    <td><?php echo $rowidno['hrm_HoliName']; ?></td>
    <td><?php echo $rowidno['hrm_HoliDescrip']; ?></td>
    <td class="tn">
    <a href="hrm-holiVwA.php?fido=<?php echo $rowidno['hrm_HoliRwId']; ?>" class="btn btn-success" role="button">View</a>
    <a href="hrm-holiVwB.php?fidt=<?php echo $rowidno['hrm_HoliRwId']; ?>" class="btn btn-primary" role="button">Edit</a>
    <a href="hrm-holiVwC.php?fidtr=<?php echo $rowidno['hrm_HoliRwId']; ?>" class="btn btn-danger" role="button">Delete</a>
    </td>

</td>

  </tr>

  <?php
    }
}
?>
</table>

<hr>
<?php
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