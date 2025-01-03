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
            <li class="breadcrumb-item active" aria-current="page">Leave Setup</li>
          </ol>
          <h4 class="main-title mb-0">Create Leave Setup</h4>
        </div>
      </div>

      <!--Create New User-->
      
        



    <form class="needs-validation" action="hrm-LeavStA.php" method="POST" autocomplete="off" novalidate>
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="ndlvnam" class="form_label">Leave Name :</label>
                                <select class="form-select" name="ndlvnam" id="ndlvnam" required>
                            <option value="" selected>---SELECT---</option>
                                <?php
                                $SelLv="SELECT * FROM hrm_setleave ORDER BY hrm_LeaveRwId DESC";
                                $SelLvexec=mysqli_query($tdconton,$SelLv);
                                if(mysqli_num_rows($SelLvexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($SelLvexec)){
                            
                                    echo "<option value='".$rowCat["hrm_LeaveRwId"]."'>".$rowCat["hrm_LeaveNam"]."</option>";
                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>

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
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="nddesnam" class="form_label">Designation :</label>
                                <select class="form-select" name="nddesnam" id="nddesnam" required>
                            <option value="" selected>---SELECT---</option>
                                <?php
                                $SeleDES="SELECT * FROM hrm_setdesig ORDER BY hrm_DesRwId DESC";
                                $SeleDESexec=mysqli_query($tdconton,$SeleDES);
                                if(mysqli_num_rows($SeleDESexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($SeleDESexec)){
                            
                                    echo "<option value='".$rowCat["hrm_DesRwId"]."'>".$rowCat["hrm_DesNam"]."</option>";
                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>

                            <div class="col-md-6 mb-3">
                            <label for="ndgrnam" class="form_label">Grade :</label>
                                <select class="form-select" name="ndgrnam" id="ndgrnam" required>
                            <option value="" selected>---SELECT---</option>
                                <?php
                                $SeleGrd="SELECT * FROM hrm_setgrad ORDER BY hrm_GradRwId DESC";
                                $SeleGrdexec=mysqli_query($tdconton,$SeleGrd);
                                if(mysqli_num_rows($SeleGrdexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($SeleGrdexec)){
                            
                                    echo "<option value='".$rowCat["hrm_GradRwId"]."'>".$rowCat["hrm_GradNam"]."</option>";
                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="ndgennam" class="form_label">Gender :</label>
                            <select class="form-select" name="ndgennam" id="ndgennam" required>
                            <option value="" selected>---SELECT---</option>
                                <?php
                                $SeleGn="SELECT * FROM hrm_setgendr ORDER BY hrm_GendrRwId DESC";
                                $SeleGnexec=mysqli_query($tdconton,$SeleGn);
                                if(mysqli_num_rows($SeleGnexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($SeleGnexec)){
                            
                                    echo "<option value='".$rowCat["hrm_GendrRwId"]."'>".$rowCat["hrm_GendrNam"]."</option>";
                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>

                            <div class="col-md-6 mb-3">
                            <label for="ndcrynam" class="form_label">Caryy Over :</label>
                                <select class="form-select" name="ndcrynam" id="ndcrynam" required>
                            <option value="" selected>---SELECT---</option>
                                <?php
                                $SeleCr="SELECT * FROM hrm_setcarry ORDER BY hrm_CarryRwId DESC";
                                $SeleCrexec=mysqli_query($tdconton,$SeleCr);
                                if(mysqli_num_rows($SeleCrexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($SeleCrexec)){
                            
                                    echo "<option value='".$rowCat["hrm_CarryRwId"]."'>".$rowCat["hrm_CarryNam"]."</option>";
                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="ndvalnam" class="form_label">Validity :</label>
                                <select class="form-select" name="ndvalnam" id="ndvalnam" required>
                            <option value="" selected>---SELECT---</option>
                                <?php
                                $Selevl="SELECT * FROM hrm_setvalid ORDER BY hrm_ValidRwId DESC";
                                $Selevlexec=mysqli_query($tdconton,$Selevl);
                                if(mysqli_num_rows($Selevlexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($Selevlexec)){
                            
                                    echo "<option value='".$rowCat["hrm_ValidRwId"]."'>".$rowCat["hrm_ValidNam"]."</option>";

                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                            <label for="ndtotdy" class="form_label">Total Days :</label>
                            <input type="number" id="ndtotdy" name="ndtotdy" min="0" max="30" required>
                            </div>
        
                            <div class="col-md-3 mb-3">
                            <label for="ndprmnth" class="form_label">Per Month :</label>
                            <input type="number" id="ndprmnth" name="ndprmnth" min="0" max="30" required>
                            </div>
                            </div>
                        </div>

                        <hr>

                        <h><b>Encashment Details</b></h>
                        <br>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="ndencshdy" class="form_label">Encashment Days :</label>
                            <input type="number" id="ndencshdy" name="ndencshdy" min="0" max="30" required>
                            </div>

                            <div class="col-md-6 mb-3">
                            <label for="ndmnthfre" class="form_label">Month Frequency :</label>
                            <input type="number" id="ndmnthfre" name="ndmnthfre" min="0" max="30" required>Day(s)
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                            <label for="ndbridg" class="form_label">Bridging :</label>
                                <select class="form-select" name="ndbridg" id="ndbridg" required>
                            <option value="" selected>---SELECT---</option>
                                <?php
                                $SeleSem="SELECT * FROM hrm_setbridge ORDER BY hrm_BridRwId DESC";
                                $SeleSemexec=mysqli_query($tdconton,$SeleSem);
                                if(mysqli_num_rows($SeleSemexec)>0){
                                    while($rowCat=mysqli_fetch_assoc($SeleSemexec)){
                            
                                    echo "<option value='".$rowCat["hrm_BridRwId"]."'>".$rowCat["hrm_BridNam"]."</option>";
                                    
                                    }
                                }
                                ?>
                            </select>
                            </div>
                        </div>

                        <hr>
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
