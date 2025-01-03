<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
unset($_SESSION['mfin_token']);
$_SESSION['mfin_token']=uniqid();
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
            <li class="breadcrumb-item active" aria-current="page">Leave Register</li>
          </ol>
          <h4 class="main-title mb-0">Create Leave Register</h4>
        </div>
      </div>

      <!--Create New User-->
      
        



    <form class="needs-validation" action="hrm-LevRegiA.php" method="POST" autocomplete="off" novalidate>
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="ndstdat" class="form_label">From Date :</label>
                            <input type="date" name="ndstdat" id="ndstdat" value="<?php echo date('Y-m-d'); ?>" required >
                            </div>

                            <div class="col-md-6 mb-3">
                            <label for="ndendat" class="form_label">To Date :</label>
                            <input type="date" name="ndendat" id="ndendat" value="<?php echo date('Y-m-d'); ?>" required >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="nddepnam" class="form_label">Department :</label>
                                <select class="form-select" name="nddepnam" id="nddepnam" required>
                            <option value="" selected>---SELECT---</option>
                                <?php
                                $SeleSem="SELECT * FROM hrm_setdepart ORDER BY hrm_DepRwId DESC";
                                $SeleSemexec=mysqli_query($tdconton,$SeleSem);
                                if(mysqli_num_rows($SeleSemexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($SeleSemexec)){
                            
                                    echo "<option value='".$rowCat["hrm_DepRwId"]."'>".$rowCat["hrm_DepNam"]."</option>";
                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>

                            <div class="col-md-6 mb-3">
                            <label for="ndstftyp" class="form_label">Staff Type :</label>
                                <select class="form-select" name="ndstftyp" id="ndstftyp" required>
                            <option value="" selected>---SELECT---</option>
                                <?php
                                $SeleDES="SELECT * FROM hrm_setstaf ORDER BY Staf_RwId DESC";
                                $SeleDESexec=mysqli_query($tdconton,$SeleDES);
                                if(mysqli_num_rows($SeleDESexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($SeleDESexec)){
                            
                                    echo "<option value='".$rowCat["Staf_RwId"]."'>".$rowCat["Staf_Nam"]."</option>";
                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="ndempnm" class="form_label">Employee Name :</label>
                                <select class="form-select" name="ndempnm" id="ndempnm" required>
                            <option value="" selected>---SELECT---</option>
                                <?php
                                $SeleGrd="SELECT * FROM hrm_setemp ORDER BY Emp_RwId DESC";
                                $SeleGrdexec=mysqli_query($tdconton,$SeleGrd);
                                if(mysqli_num_rows($SeleGrdexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($SeleGrdexec)){
                            
                                    echo "<option value='".$rowCat["Emp_RwId"]."'>".$rowCat["Emp_Nam"]."</option>";
                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>
                        </div>

                        <div>
                        <button class="w-10 btn btn-primary btn-lg" type="submit">Submit</button>
                            </div>
                    </div>
                </div>
                     
                    </form>









      
      

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
