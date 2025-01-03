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

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.tn{
    text-align: center;
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
            <li class="breadcrumb-item active" aria-current="page">Leave Register</li>
          </ol>
          <h4 class="main-title mb-0">View, All details of Leave Register</h4>
        </div>
      </div>

      <!--Create New User-->
      
        



      <!--Search according to leave name-->

<form class="needs-validation" action="hrm-LevRegiVw.php" method="POST" autocomplete="off" novalidate>
    <div class="card">
        <div class="card-body">

        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="nempnm" class="form_label">Employee Name :</label>
                <select class="form-select" name="nempnm" id="nempnm" required>
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

            
                <button class="w-20 btn btn-primary btn-lg" type="submit">Submit</button>
        
        </div>
    </div>   
</form>
<!--end search-->
<?php

//trim the data
function tt_inpt($dte)
{      
    
    $dte = trim($dte);
    $dte = stripslashes($dte);
    $dte = htmlspecialchars($dte);
    return $dte;
}

$ndempnm = "";

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
$ndempnm=tt_inpt($_POST['nempnm']);
}

?>




<!--  First Name was change to ID No -->
<table>
    <thead>
    <tr>
    <th>Employee Name</th>
    <th>From Date</th>
    <th>To Date</th>
    <th>Department</th>
    <th>Staff Type</th>
    <th>Actions</th>
  </tr>
</thead>

    <tbody>
    <tr>
    <?php
$sqlSelectRecord = "SELECT * FROM hrm_leavreg WHERE Emp_RwId = '$ndempnm'";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);
if($sqlScriptExecution->num_rows>0) {
    while($rowidno= $sqlScriptExecution->fetch_assoc())
    {
        $selLvRgId= $rowidno['LeavReg_RwId'];
        ?>

        <td>
        <?php
                $selLvRgEmp= $rowidno['Emp_RwId'];
                $SeleGrd="SELECT * FROM hrm_setemp WHERE Emp_RwId = '$selLvRgEmp'";
                $SeleGrdexec=mysqli_query($tdconton,$SeleGrd);
                if(mysqli_num_rows($SeleGrdexec)>0){
                    while($rowCat=mysqli_fetch_assoc($SeleGrdexec)){
            
                        echo $rowCat["Emp_Nam"];
                    
                    }
                } 
        ?>
        </td>
        <td><?php echo $rowidno['LeavReg_StDat']; ?></td>
        <td><?php echo $rowidno['LeavReg_EnDat']; ?></td>
        <td>
            <?php
            $seldEPID = $rowidno['hrm_DepRwId'];
            $SeleSem="SELECT * FROM hrm_setdepart WHERE hrm_DepRwId = '$seldEPID'";
            $SeleSemexec=mysqli_query($tdconton,$SeleSem);
            if(mysqli_num_rows($SeleSemexec)>0){
                while($rowCat=mysqli_fetch_assoc($SeleSemexec)){
                                
                    echo $rowCat["hrm_DepNam"];
                                        
                    }
                }
            ?>
        </td>
        
        <td>
            <?php
        $selstfId = $rowidno['Staf_RwId'];
        $SeleDES="SELECT * FROM hrm_setstaf WHERE Staf_RwId = '$selstfId'";
        $SeleDESexec=mysqli_query($tdconton,$SeleDES);
        if(mysqli_num_rows($SeleDESexec)>0){
            while($rowCat=mysqli_fetch_assoc($SeleDESexec)){
    
                echo $rowCat["Staf_Nam"];
            
            }
        }

            ?>
        </td>

		
    <td class="tn">
    <div class="dropdown">
               <button class="ellipsis-btn">&#8942;</button>
               <div class="dropdown-content">
                  <a href="hrm-LevRegiVwA.php?fida=<?php echo $rowidno['LeavReg_RwId']; ?>">Single View</a>
                  <a href="hrm-LevRegiVwB.php?fidb=<?php echo $rowidno['LeavReg_RwId']; ?>">Edit</a>
                  <a href="hrm-LevRegiVwC.php?fidc=<?php echo $rowidno['LeavReg_RwId']; ?>">Delete</a>
               </div>
            </div>
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
