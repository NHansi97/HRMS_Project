<?php
// Start session
session_start();
$uname = $_SESSION['username'];
if (!$_SESSION['userid']) {
    header("Location: ../index.php");
    die();
}

// Initialize variables
$msg = "";
if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="../SJ-assets-lib/img/favicon.png">
    <title>Authentication - D HELP PVT LTD</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="../SJ-assets-lib/lib/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="../SJ-assets-lib/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../SJ-assets-lib/css/style.min.css">

    <script>
      document.addEventListener("DOMContentLoaded", function() {
          document.getElementById("crtUsrname").value = "";
          document.getElementById("crtPassword").value = "";
      });
    </script>
  </head>
  <body>
    <!-- Side Bar -->
    <?php include_once("../SJ-headtopfooter/sj-sidebaar.php"); ?>

    <!-- Header -->
    <?php include_once("../SJ-headtopfooter/sj-mainheader.php"); ?>

    <div class="main main-app p-3 p-lg-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
          <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item"><a href="#">Authentication</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create User</li>
          </ol>
          <h4 class="main-title mb-0">Create New User</h4>
        </div>
      </div>

      <!-- Create New User -->
      <div class="card">
        <div class="card-body">
          <form method="POST" action="sj-createUserA.php" data-parsley-validate>
            <div class="mb-4">
              <label for="crtStfID" class="form-label">Employee number</label>
              <input type="text" id="crtStfID" name="crtStfID" class="form-control" placeholder="Enter employee number" required autocomplete="off">
            </div>
            <div class="mb-4">
              <label for="crtUsrname" class="form-label">Username</label>
              <input type="text" id="crtUsrname" name="crtUsrname" class="form-control" placeholder="Enter username" required autocomplete="new-username">
            </div>
            <div class="row">
              <div class="col-md-4 mb-4">
                <label for="crtPassword" class="form-label">Password</label>
                <input type="password" id="crtPassword" name="crtPassword" class="form-control" placeholder="Enter password" required autocomplete="new-password">
              </div>
              <div class="col-md-4 mb-4">
                <label for="ConfPassword" class="form-label">Confirm Password</label>
                <input type="password" id="ConfPassword" name="ConfPassword" class="form-control" placeholder="Enter password" required autocomplete="new-password">
              </div>
              <div class="col-md-2 mb-4">
                <label class="form-label">Admin Role</label>
                <select class="form-select" name="crtrole" required>
                  <option value="" selected>--Select--</option>
                  <option value="1">Admin</option>
                  <option value="2">HR Manager</option>
                  <option value="3">Other</option>
                </select>
              </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button class="btn btn-primary btn-sign">Create</button>
            </div>
          </form>
        </div>

        <!-- Display Messages -->
        <?php if (!empty($msg)) { echo "<div class='card-footer'>{$msg}</div>"; } ?> 
        <?php if (!empty($msgpas)) { echo "<div class='card-footer'>{$msgpas}</div>"; } ?>
      </div>

      <!-- Footer -->
      <?php include_once("../SJ-headtopfooter/sj-footer.php"); ?>
    </div>

    <script src="../SJ-assets-lib/lib/jquery/jquery.min.js"></script>
    <script src="../SJ-assets-lib/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../SJ-assets-lib/lib/parsleyjs/parsley.min.js"></script>
    <script src="../SJ-assets-lib/js/script.js"></script>
  </body>
</html>