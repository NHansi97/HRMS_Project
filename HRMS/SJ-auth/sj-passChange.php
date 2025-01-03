<?php
session_start();
include_once("../SJ-dbcona/dhh-jConntAB.php");
$uname = $_SESSION['username'];
if (!$_SESSION['userid']) {
    header("Location:../index.php");
    die();
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
    <title>D HELP PVT LTD</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="../SJ-assets-lib/lib/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="../SJ-assets-lib/lib/bootstrap/css/bootstrap.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../SJ-assets-lib/css/style.min.css">

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const passwordField = document.getElementById("chPassword");
        if (passwordField) {
          passwordField.value = ""; // Ensure password field is empty on page load
        }
      });
    </script>
  </head>
  <body>
    <!-- Side bar -->
    <?php include_once("../SJ-headtopfooter/sj-sidebaar.php"); ?>

    <!-- Header main -->
    <?php include_once("../SJ-headtopfooter/sj-mainheader.php"); ?>

    <div class="main main-app p-3 p-lg-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
          <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item"><a href="#">Authentication</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
          <h4 class="main-title mb-0">Change Password</h4>
        </div>
      </div>

      <!-- Change Password Form -->
      <div class="card">
        <div class="card-body">
          <form method="POST" action="sj-passChangeA.php">
            <div class="mb-4">
              <label for="chStaffID" class="form-label">Employee number</label>
              <input type="text" id="chStaffID" name="chStaffID" class="form-control" value="<?php echo $_SESSION['userid']; ?>" readonly>
            </div>
            <div class="mb-4">
              <label for="chUsername" class="form-label">Username</label>
              <input type="text" id="chUsername" name="chUsername" class="form-control" value="<?php echo $_SESSION['username']; ?>" readonly>
            </div>
            <div class="row">
              <div class="col-md-6 mb-4">
                <label for="chPassword" class="form-label d-flex justify-content-between">Current Password</label>
                <input type="password" id="chPassword" name="chlogPassw" class="form-control" placeholder="Enter current password" required autocomplete="new-password">
              </div>
              <div class="col-md-6 mb-4">
                <label for="nchPassword" class="form-label d-flex justify-content-between">New Password</label>
                <input type="password" id="nchPassword" name="nchlogPassw" class="form-control" placeholder="Enter new password" required autocomplete="new-password">
              </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button class="btn btn-primary btn-sign">Change Password</button>
            </div>
          </form>
        </div>
        <!-- Card footer -->
        <div class="card-footer">
          <?php 
          if (isset($_SESSION["pwmsg"])) {
              $message = $_SESSION['pwmsg'];
              echo $message;
              unset($_SESSION['pwmsg']); 
          }
          ?>
        </div>
      </div><!-- card -->

      <!-- Main footer -->
      <?php include_once("../SJ-headtopfooter/sj-footer.php"); ?>
    </div><!-- main -->

    <script src="../SJ-assets-lib/lib/jquery/jquery.min.js"></script>
    <script src="../SJ-assets-lib/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../SJ-assets-lib/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../SJ-assets-lib/lib/parsleyjs/parsley.min.js"></script>
    <script src="../SJ-assets-lib/js/script.js"></script>

    <?php mysqli_close($tdconton); ?>
  </body>
</html>
