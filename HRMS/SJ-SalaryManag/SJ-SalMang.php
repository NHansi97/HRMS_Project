<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
unset($_SESSION['mfin_token']);
$_SESSION['mfin_token'] = uniqid();
include_once("../SJ-dbcona/dhh-jConntAB.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
    <!-- Side bar -->
    <?php include_once("../SJ-headtopfooter/sj-sidebaar.php");?>

    <!-- Header main -->
    <?php include_once("../SJ-headtopfooter/sj-mainheader.php");?>

    <div class="main main-app p-3 p-lg-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
          <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item"><a href="#">Authentication</a></li>
            <li class="breadcrumb-item active" aria-current="page">Salary Management</li>
          </ol>
          <h4 class="main-title mb-0">Create Salary</h4>
        </div>
      </div>

      <!-- sj-salMang form start -->
      <form class="needs-validation" action="SJ-SalMangA.php" method="POST" novalidate>
        <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="col-md-6">
                    <label for="ndempnum" class="form-label">Employee Number</label>    
                    <select class="form-select" name="ndempnum" id="ndempnum">
                    <option value="" selected>---SELECT---</option>
                    <?php
                    $SeleEmp = "SELECT * FROM hrm_setemp ORDER BY Emp_RwId DESC";
                    $SeleEmpexec = mysqli_query($tdconton, $SeleEmp);
                    if (mysqli_num_rows($SeleEmpexec) > 0) {
                      while ($rowCat = mysqli_fetch_assoc($SeleEmpexec)) {
                          echo "<option value='" . $rowCat["Emp_Num"] . "'>" . $rowCat["Emp_Num"] . "</option>";
                      }
                    }
                    ?>
                </select>
              </div> 
                </div>
            </div>    

            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="ndempname" class="form-label">Employee Name</label>  
                <input class="form-control" type="text" id="ndempnam" name="ndempnam" readonly>
              </div>
              
              <div class="col-md-3 mb-3">
                <label for="ndstnam" class="form-label">Staff Name</label>   
                <input class="form-control" type="text" id="ndstnam" name="ndstnam" readonly> 
              </div> 

              <div class="col-md-3 mb-3">
                <label for="nddept" class="form-label">Department</label>   
                <input class="form-control" type="text" id="nddept" name="nddept" readonly> 
              </div> 

              <div class="col-md-3 mb-3">
                <label for="nddesig" class="form-label">Designation</label>   
                <input class="form-control" type="text" id="nddesig" name="nddesig" readonly> 
              </div> 
            </div>    

            <div class="row">
                <div class="col-md-4 mb-3 d-flex">
                    <div class="col-md-3">
                        <label for="ndstMnth" class="form-label">Month:</label>
                        <input class="form-control" type="text" id="ndstMnth" name="ndstMnth" readonly> 
                    </div>                        
                    <div class="col-md-3 mx-2">
                        <label for="ndstyer" class="form-label">Year:</label>
                        <input class="form-control" type="number" id="ndstyer" name="ndstyer" min="2023" max="2026" required>
                    </div>                        
                    <div class="col-md-3">
                        <label for="ndstwrkDay" class="form-label">No Of Work Days:</label>
                        <input class="form-control" type="number" id="ndstwrkDay" name="ndstwrkDay" min="5" max="26" required>
                    </div>
                </div>
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="ndstBasSlry" class="form-label">Basic Salary:</label>
                <input class="form-control" type="text" id="ndstBasSlry" name="ndstBasSlry" required>
              </div>                        
              <div class="col-md-4 mb-3">
                <label for="ndstSlryIna" class="form-label">Salary Increment(A):</label>
                <input class="form-control" type="text" id="ndstSlryIna" name="ndstSlryIna" value="0" required>
              </div>                                                 
              <div class="col-md-4 mb-3">
                <label for="ndstSlryInb" class="form-label">Salary Increment(B):</label>
                <input class="form-control" type="text" id="ndstSlryInb" name="ndstSlryInb" value="0" required>
              </div>                                                 
            </div>

            <div class="row">
              <div class="col-md-3 mb-4">
                <label for="ndstAlOn" class="form-label">Special Allowance:</label>
                <input class="form-control" type="text" id="ndstAlOn" name="ndstAlOn" value="0" required>
              </div>                                                 
              <div class="col-md-3 mb-4">
                <label for="ndstAlTw" class="form-label">Expertise Allowance:</label>
                <input class="form-control" type="text" id="ndstAlTw" name="ndstAlTw" value="0" required>
              </div>                                                 
            </div>


        <div class="card">
          <div class="card-body ">

            <label for="ndstAdvSlry" class="form-label" style="font-weight: bold; text-decoration: underline;">Deduction</label>

            <div class="row">
              <div class="col-md-3 mb-4">
                <label for="ndstnopy" class="form-label">No pay:</label>
                <input class="form-control" type="text" id="ndstnopy" name="ndstnopy" value="0" required>
              </div>
            </div>  

            <div class="row">
              <!-- <div class="col-md-3 mb-3">
                <label for="ndstDedOn" class="form-label">EPF(8%):</label>
                <input class="form-control" type="text" id="ndstDedOn" name="ndstDedOn" value="0" required>
              </div>                                                  -->
              <div class="col-md-3 mb-3">
                <label for="ndstadvnce" class="form-label">Advance:</label>
                <input class="form-control" type="text" id="ndstadvnce" name="ndstadvnce" value="0" required>
              </div>                                                 
              <div class="col-md-3 mb-3">
                <label for="ndstmoble" class="form-label">Mobile bill:</label>
                <input class="form-control" type="text" id="ndstmoble" name="ndstmoble" value="0" required>
              </div>                                                 
              <div class="col-md-3 mb-3">
                <label for="ndstlon" class="form-label">Loan:</label>
                <input class="form-control" type="text" id="ndstlon" name="ndstlon" value="0" required>
              </div>                                               
            </div>

            <div class="row">
            <div class="col-md-6 mb-3 d-flex">
                <div class="col-md-6">
                    <label for="ndstIncmTax">Income Tax:</label>
                    <input class="form-control" type="text" id="ndstIncmTax" name="ndstIncmTax" value="0" required>
                </div>                                                 
                <div class="col-md-6 mx-2">
                    <label for="ndstHldTax">Withholding Tax:</label>
                    <input class="form-control" type="text" id="ndstHldTax" name="ndstHldTax" value="0" required>
                </div>
            </div>
            </div>
        </div>
    </div> 
            <div class="row">
                <div class="col-md-12 mb-3">
                     <button class="w-10 btn btn-primary btn-lg" type="submit" style="margin-top: 20px;">Submit</button>
                </div>
            </div>
            
          </div>
        </div>
      </form>
      <!-- sj-salMang form end -->

      <!-- Main Footer -->
      <?php include_once("../SJ-headtopfooter/sj-footer.php");?>
    </div><!-- main -->

    <script src="../SJ-assets-lib/lib/jquery/jquery.min.js"></script>
    <script src="../SJ-assets-lib/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../SJ-assets-lib/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    <script src="../SJ-assets-lib/lib/parsleyjs/parsley.min.js"></script>

    <script src="../SJ-assets-lib/js/script.js"></script>

    <script>
    $(document).ready(function() {
    // When the employee number changes
        $('#ndempnum').on('change', function() {
            var empNum = $(this).val(); // Get selected employee number

            if (empNum !== "") {
            // AJAX request to fetch the employee name and staff name
            $.ajax({
                url: 'SJ-SalMangAjx.php', // PHP file to process the request
                type: 'POST',
                data: { empNum: empNum }, // Sending empNum as data
                dataType: 'json', // Expecting JSON response
                success: function(response) {
                    if (response.error) {
                        alert(response.error); // Handle errors
                    } else {
                        // Update the employee name and staff name textboxes with the response
                        $('#ndempnam').val(response.empName);
                        $('#ndstnam').val(response.staffName); 
                        $('#nddesig').val(response.designation); 
                        $('#nddept').val(response.department); 
                    }
                },
                error: function() {
                    alert('Error fetching employee details!');
                }
                });
            } else {
            // Clear the employee name and staff name if no selection
            $('#ndempnam').val('');
            $('#ndstnam').val('');
            $('#nddesig').val('');
            $('#nddept').val('');
            }
        });
    });
    </script>

    <script>
        $(document).ready(function() {
        // Get the current date
        var currentDate = new Date();
    
        // Get the current month (Note: JavaScript months are zero-indexed, so January is 0, February is 1, etc.)
        var currentMonth = currentDate.getMonth() + 1; // Adding 1 to get the actual month number

        var currentYear = currentDate.getFullYear();

        if(currentMonth==1){
            currentMontht='January';
        }
        else if(currentMonth==2){
            currentMontht='February';
        }
        else if(currentMonth==3){
            currentMontht='march';
        }
        else if(currentMonth==4){
            currentMontht='April';
        }
        else if(currentMonth==5){
            currentMontht='May';
        }
        else if(currentMonth==6){
            currentMontht='June';
        }
        else if(currentMonth==7){
            currentMontht='July';
        }
        else if(currentMonth==8){
            currentMontht='August';
        }
        else if(currentMonth==9){
            currentMontht='September';
        }
        else if(currentMonth==10){
            currentMontht='October';
        }
        else if(currentMonth==11){
            currentMontht='November';
        }
        else{
            currentMontht='December';
        }

        // Set the value of the month input field (using its ID)
        $('#ndstMnth').val(currentMontht);
        $('#ndstyer').val(currentYear);
        });

    </script>

  </body>
</html>
