<?php session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
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
    <meta name="author" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../SJ-assets-lib/img/favicon.png">
    <title>Authentication - D HELP HUB</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="../SJ-assets-lib/lib/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="../SJ-assets-lib/lib/bootstrap/css/bootstrap.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../SJ-assets-lib/css/style.min.css">

    <style>

/* Style for the ellipsis button */
.ellipsis-btn {
background: none;
border: none;
cursor: pointer;
font-size: 20px;
}

/* Style for the dropdown container */
.dropdown {
position: relative;
display: inline-block;
}

/* Style for the dropdown menu */
.dropdown-content {
display: none;
position: absolute;
background-color: #f9f9f9;
min-width: 160px;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
z-index: 1;
}

/* Style for the dropdown menu links */
.dropdown-content a {
padding: 12px 16px;
text-decoration: none;
display: block;
}

/* Show the dropdown menu when the ellipsis button is hovered over */
.dropdown:hover .dropdown-content {
display: block;
}

</style>
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
            <li class="breadcrumb-item active" aria-current="page">Create User</li>
          </ol>
          <h4 class="main-title mb-0"><h1>View, All details of Designation</h4>
        </div>
      </div>

      <!--Create New User-->
      
        





<!--  First Name was change to ID No -->

<table>
    <thead>
        <tr>
        <th>Designation Name</th>
        <th>Actions</th>
        </tr>
    </thead>

    <tbody>

    <tr>
    <?php
$sqlSelectRecord = "SELECT * FROM hrm_setdesig ORDER BY hrm_DesRwId DESC";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);
if($sqlScriptExecution->num_rows>0) {
    while($rowidno= $sqlScriptExecution->fetch_assoc())
    {
        ?>
    </td>
    <td><?php echo $rowidno['hrm_DesNam']; ?></td>
    <td>
            <div class="dropdown">
               <button class="ellipsis-btn">&#8942;</button>
               <div class="dropdown-content">
                  <a href="hrm-setdesgVwA.php?fida=<?php echo $rowidno['hrm_DesRwId']; ?>">Single View</a>
                  <a href="hrm-setdesgVwB.php?fidb=<?php echo $rowidno['hrm_DesRwId']; ?>">Edit</a>
                  <a href="hrm-setdesgVwC.php?fidc=<?php echo $rowidno['hrm_DesRwId']; ?>">Delete</a>
               </div>
            </div>
         </td>

</td>

  </tr>

  <?php
    }
}
?>
    </tbody>
</table>

<hr>
<?php
mysqli_close($tdconton);
?>














      
      

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
