<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
if($_SESSION['privilege'] != 1){
  header("location:../index.php");
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
    <meta name="author" content="Themepixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../SJ-assets-lib/img/favicon.png">

    <title>Dashboard | D HELP HUB</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="../SJ-assets-lib/lib/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="../SJ-assets-lib/lib/cryptofont/css/cryptofont.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../SJ-assets-lib/css/style.min.css">

  </head>
  <body>
    <!--side bar-->
    <?php include_once("../SJ-headtopfooter/sj-sidebaar.php");?>

    <!--header-main-->
    <?php include_once("../SJ-headtopfooter/sj-mainheader.php");?>

    <div class="body main main-app p-3 p-lg-4">
      <div class="d-md-flex align-items-center justify-content-between mb-4">
        <div>
          <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">HRMS</li>
          </ol>
          <h4 class="main-title mb-0">Welcome to Dashboard</h4>
        </div>
        <div class="d-flex gap-2 mt-3 mt-md-0">
          <button type="button" class="btn btn-white d-flex align-items-center gap-2"><i class="ri-share-line fs-18 lh-1"></i>Share</button>
          <button type="button" class="btn btn-white d-flex align-items-center gap-2"><i class="ri-printer-line fs-18 lh-1"></i>Print</button>
          <button type="button" class="btn btn-primary d-flex align-items-center gap-2"><i class="ri-bar-chart-2-line fs-18 lh-1"></i>Generate<span class="d-none d-sm-inline"> Report</span></button>
        </div>
      </div>

      <div class="row g-3" style="margin-bottom: 30px;">
        <!-- Salary Management -->
        <div class="col-sm-6 col-xl-6">
          <div 
            class="card card-one d-flex flex-column justify-content-center align-items-center text-center"
            style="background-image: url('../SJ-assets-lib/img/Salary.jpg'); background-size: cover; background-position: center; height: 300px; cursor: pointer; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);"
            onclick="window.location.href='../SJ-SalaryManag/SJ-SalMangAVw.php';">
            <div 
              class="card-header border-0 bg-transparent"
              style="background-color: white; padding: 15px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
              <h6 class="card-title mb-0" style="color: black; font-weight: bold; font-size: 24px;">Salary Management</h6>
            </div>
          </div>
        </div>
        <!-- Leave Register -->
        <div class="col-sm-6 col-xl-6">
          <div 
            class="card card-one d-flex flex-column justify-content-center align-items-center text-center"
            style="background-image: url('../SJ-assets-lib/img/leave.png'); background-size: cover; background-position: center; height: 300px; cursor: pointer; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);"
            onclick="window.location.href='../HRMS/hrm-LevRegiVw.php';">
          <div 
            class="card-header border-0 bg-transparent"
            style="background-color: white; padding: 15px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <h6 class="card-title mb-0" style="color: black; font-weight: bold; font-size: 24px;">Leave Register</h6>
          </div>
          </div>
        </div>
      </div>

    <div class="row g-3">
        <!--Departments-->
        <div class="col-sm-6 col-xl-4">
          <div class="card card-one">
            <div class="card-header">
              <h6 class="card-title align-items-center text-center">Departments</h6>
            </div><!-- card-header -->
            <div class="card-body">
              <table class="table table-five">
                <tbody>
                  <?php
                  $sqlSelectRecord = "SELECT * FROM hrm_setdepart";
                  $sqlScriptExecution = $tdconton->query($sqlSelectRecord);
                  if($sqlScriptExecution->num_rows>0) {
                      while($rowidno= $sqlScriptExecution->fetch_assoc())
                      {
                  ?>
                      <tr>
                      <td><?php echo $rowidno['hrm_DepNam'];  ?></td>
                      </tr>

                  <?php
                      }
                  }
                  ?>                  
                </tbody>
              </table>
            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- col -->

        <!--Staff Overview-->
        <div class="col-sm-6 col-xl-4">
          <div class="card card-one">
            <div class="card-header">
              <h6 class="card-title">Staff Overview</h6>
            </div><!-- card-header -->
            <div class="card-body">
              <ul class="list-group list-group-one">
                <?php
                // Query to fetch all staff types from the database
                $sqlStaffTypes = "SELECT * FROM hrm_setstaf";
                $resultStaffTypes = $tdconton->query($sqlStaffTypes);

                // Check if any staff types exist
                if ($resultStaffTypes->num_rows > 0) {
                    while ($staffRow = $resultStaffTypes->fetch_assoc()) {
                        $staffName = $staffRow['Staf_Nam'];
                        $StaffId = $staffRow['Staf_RwId'];

                        // Query to count employees for the current staff type
                        $sqlEmployeeCount = "SELECT COUNT(*) AS total_count FROM hrm_setemp WHERE Emp_StaffId = '$StaffId'";
                        $resultEmployeeCount = $tdconton->query($sqlEmployeeCount);
                        $employeeCount = 0;

                        // Fetch the count result
                        if ($resultEmployeeCount->num_rows > 0) {
                            $countRow = $resultEmployeeCount->fetch_assoc();
                            $employeeCount = $countRow['total_count'];
                        }
                ?>
                <li class="list-group-item px-0 d-flex align-items-center gap-2">
                  <!-- Display staff name -->
                  <div class="avatar bg-gray-300 text-secondary">
                    <i class="ri-group-line"></i>
                  </div>
                  <div>
                    <h6 class="mb-0"><?php echo $staffName; ?></h6>
                  </div>
                  <!-- Display employee count -->
                  <div class="ms-auto text-end">
                    <h6 class="ff-numerals mb-0"><?php echo $employeeCount; ?> Employees</h6>
                  </div>
                </li>
                <?php
                    }
                } else {
                    // If no staff types exist
                    echo '<li class="list-group-item text-center">No staff types found.</li>';
                }
                ?>
              </ul>
            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- col -->

        <div class="col-sm-6 col-xl-4">
          <div class="card card-one"
            style="background-image: url('../SJ-assets-lib/img/insuarance.jpg'); background-size: cover; background-position: center; height: 300px; cursor: pointer; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h6 class="card-title text-white" style="background-color: rgba(0, 0, 0, 0.6); padding: 5px 10px; border-radius: 5px;">
                Employee Insurance
              </h6>
            </div>
            <!-- card-header -->
            <div class="card-body">
              <ul class="list-group list-group-one">
                <!-- Health Insurance Plan -->
                <li class="list-group-item px-0 d-flex align-items-center gap-2">
                  <!-- Health Insurance Icon -->
                  <div class="avatar bg-orange text-white" style="font-size: 24px;">
                    <i class="ri-heart-pulse-line"></i> <!-- Using the health insurance icon -->
                  </div>
                  <!-- Insurance Details -->
                  <div class="d-flex align-items-center">
                    <h6 class="mb-0 me-2">Employee Health Insurance Scheme - 24/25</h6>
                  </div>
                  <!-- PDF Icon -->
                  <div class="ms-auto">
                    <a href="../SJ-assets-lib/pdf/Insurance.pdf" download title="Download Health Insurance Plan">
                      <i class="ri-file-pdf-line text-danger" style="font-size: 24px;"></i>
                    </a>
                  </div>
                </li>
              </ul>
            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- col -->
      </div><!-- row -->

      <!--main-footer-->
      <?php include_once("../SJ-headtopfooter/sj-footer.php");?>
    </div><!-- main -->


    <script src="../SJ-assets-lib/lib/jquery/jquery.min.js"></script>
    <script src="../SJ-assets-lib/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../SJ-assets-lib/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../SJ-assets-lib/lib/jquery.flot/jquery.flot.js"></script>
    <script src="../SJ-assets-lib/lib/jquery.flot/jquery.flot.stack.js"></script>
    <script src="../SJ-assets-lib/lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="../SJ-assets-lib/lib/chart.js/chart.min.js"></script>

    <script src="../SJ-assets-lib/js/script.js"></script>
    <script src="../SJ-assets-lib/js/db.data.js"></script>
    <script src="../SJ-assets-lib/js/db.crypto.js"></script>

  </body>
</html>
