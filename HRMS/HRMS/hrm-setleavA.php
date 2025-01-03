<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
unset($_SESSION['mfin_token']);
$_SESSION['MUID']=uniqid();
include_once("../SJ-dbcona/dhh-jConntAB.php");

//trim the data
function tt_inpt($dte)
{      
    
    $dte = trim($dte);
    $dte = stripslashes($dte);
    $dte = htmlspecialchars($dte);
    return $dte;
}

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
$nlevnam=tt_inpt($_POST['hrlevnm']);
}

$nlevCretdBy=1;

if(empty($nlevnam) || $nlevnam==''){
    header("location:hrm-setleav.php");
    die();
}

$Sel = "SELECT * FROM hrm_setleave WHERE hrm_LeaveNam='$nlevnam'";
$SelExec = $tdconton->query($Sel);
if($SelExec->num_rows>0) {

    header("location:hrm-setleav.php");
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
            <li class="breadcrumb-item active" aria-current="page">Leave Name</li>
          </ol>
          <h4 class="main-title mb-0">Add Leave Name</h4>
        </div>
      </div>

      <!--Create New User-->
      
        






    <form class="needs-validation" action="hrm-setleavAB.php" method="POST" autocomplete="off" novalidate>
                <div class="card">
                    <div class="card-body">
           
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="hrlvnm">Leave Name :</label>
                            <input type="text" id="hrlvnm" name="hrlvnm" maxlength="100" value="<?php echo $nlevnam; ?>" readonly>
                            <div id="id_result">
                            </div>
                        </div>

                        <!--Ajax-->
                        <script>
                            //javascript function
                            $(document).ready(function() {                              
                                $('#hrlvnm').on('keyup', function() { //function is run with the keyup of the keyboard
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
