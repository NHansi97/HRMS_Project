<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
unset($_SESSION['mfin']);
$_SESSION['mfin']=uniqid();
$UpLvId=$_SESSION['UpLvID'];
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


    <script src="js/jquery.min.js"></script>
    <link rel="canonical" href="#">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">



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
            <li class="breadcrumb-item active" aria-current="page">Leave</li>
          </ol>
          <h4 class="main-title mb-0">Update Details of Leave</h4>
        </div>
      </div>

      <!--Create New User-->
      
        








      


<?php
$sqlSelectRecord = "SELECT * FROM hrm_setleave WHERE hrm_LeaveRwId = '$UpLvId'";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);
if($sqlScriptExecution->num_rows>0) {
    while($rowidno= $sqlScriptExecution->fetch_assoc())
    {
        $selLvTd= $rowidno['hrm_LeaveRwId'];
        $selLvNm = $rowidno['hrm_LeaveNam'];
    }
}
?>
                <form class="needs-validation" action="hrm-setleavVwBUpA.php" method="POST" novalidate autocomplete="off">

            
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="dhlvId">Leave Id :</label>
                            <input type="text" id="dhlvId" name="dhlvId" value="<?php echo $UpLvId; ?>" readonly>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="dhlvnm">Leave Name :</label>
                            <input type="text" id="dhlvnm" name="dhlvnm" value="<?php echo $selLvNm; ?>" maxlength="255" required>
                            <div id="id_result">
                            </div>
                        </div>

                        <!--Ajax-->
                        <script>
                            //javascript function
                            $(document).ready(function() {                              
                                $('#dhlvnm').on('keyup', function() { //function is run with the keyup of the keyboard
                                        var idNumber = $(this).val().trim();
                                        if (idNumber != '') {
                                            $.ajax({
                                                url: 'hrm-setleavAjx.php',
                                                type: 'post',
                                                data: {
                                                  idNumber: idNumber
                                                },
                                                success: function(response) {
                                                    $('#id_result').html(response);
                                                }
                                            });
                                        } else {
                                            $("#id_result").html("");
                                        }
                                    });
                            });
                            </script>
                        <!--end ajax-->

                        <div>
                        <button class="w-20 btn btn-primary" type="submit">Update details of Leave</button>
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
