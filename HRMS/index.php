<?php session_start(); 
include_once("SJ-dbcona/dhh-jConntAB.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="Themepixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="SJ-assets-lib/img/favicon.png">

    <title>Login - D HELP PVT LTD</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="SJ-assets-lib/lib/remixicon/fonts/remixicon.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="SJ-assets-lib/css/style.min.css">
  </head>
  <body class="page-sign d-block py-0">

    <div class="row g-0">
      <div class="col-md-7 col-lg-5 col-xl-4 col-wrapper">
        <div class="card card-sign">
          <div class="card-header">
            <a href="#" class="header-logo mb-5">D HELP PVT LTD</a>
            <h3 class="card-title">Sign In</h3>
            <p class="card-text">Welcome back! Please signin to continue.</p>
          </div><!-- card-header -->
          <div class="card-body">
            <form action="indexAJ.php" method="POST">
                <div class="mb-4">
                <label for="iUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="iUsername" name="logUsername" placeholder="Enter your username">
                </div>
                <div class="mb-4">
                <label for="iPword" class="form-label d-flex justify-content-between">Password <a href="">Forgot password?</a></label>
                <input type="password" class="form-control" id="iPword" name="logPassw" placeholder="Enter your password">
                </div>
                <!-- error message when login failed -->
                <?php
                if(isset($_SESSION["error"])) {
                  $error = $_SESSION["error"];
                  echo " 
                  <div class='mb-4'>
                    <div class='col text-danger text-center'>" .$error. "</div>
                  </div>";
                  session_unset();
                  session_destroy();
                } /*
                if(isset($_SESSION["pwmsg"])) {
                  $pwmsg = $_SESSION['pwmsg'];
                  echo " 
                  <div class='mb-4'>
                    <div class='col text-center'>" .$pwmsg. "</div>
                  </div>";
                  session_unset();
                  session_destroy();
                }*/
               ?>
               <!---->
                <button class="btn btn-primary btn-sign">Sign In</button>
            </form>

            <div class="divider"><span>or sign in with</span></div>

            <div class="row gx-2">
              <div class="col"><button class="btn btn-facebook"><i class="ri-facebook-fill"></i> Facebook</button></div>
              <div class="col"><button class="btn btn-google"><i class="ri-google-fill"></i> Google</button></div>
            </div><!-- row -->
          </div><!-- card-body -->
          <div class="card-footer">
            <!-- Don't have an account? <a href="sign-up-2.html">Create an Account</a> -->
          </div><!-- card-footer -->
        </div><!-- card -->
      </div><!-- col -->
      <div class="col d-none d-lg-block"><img src="SJ-assets-lib/img/Main.avif" class="auth-img" alt=""></div>
    </div><!-- row -->

    <script src="SJ-assets-lib/lib/jquery/jquery.min.js"></script>
    <script src="SJ-assets-lib/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
      'use script'

      var skinMode = localStorage.getItem('skin-mode');
      if(skinMode) {
        $('html').attr('data-skin', 'dark');
      }
    </script>
  </body>
</html>
