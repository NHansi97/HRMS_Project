<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
unset($_SESSION['mfin']);
$_SESSION['mfin']=uniqid();
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
            <li class="breadcrumb-item active" aria-current="page">HOLIDAYS</li>
          </ol>
          <h4 class="main-title mb-0">Add Holidays with Description</h4>
        </div>
      </div>

      
        



      

    <form class="needs-validation" action="hrm-holiA.php" method="POST" autocomplete="off" novalidate>
                <div class="card">
                    <div class="card-body">
                
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="ndholnam">Holiday Name :</label>
                            <input type="text" id="ndholnam" name="ndholnam" maxlength="255" required>
                            </div>

                            <div class="col-md-6 mb-3">
                            <label for="ndholdesp">Description :</label>
                            <input type="text" id="ndholdesp" name="ndholdesp" maxlength="255" required>
                            </div>
                        </div>
                        
                        <button class="w-10 btn btn-primary btn-lg" type="submit">Submit</button>
                    </div>
                </div>
                     
                    </form>
    
</body>
</html>















      
    
      

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
