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
            <li class="breadcrumb-item active" aria-current="page">Leave Setup</li>
          </ol>
          <h4 class="main-title mb-0">View, All details of Leave Setup</h4>
        </div>
      </div>

      <!--Create New User-->
      
        



      <!--Search according to leave name-->

<form class="needs-validation" action="hrm-LeavStVw.php" method="POST" autocomplete="off" novalidate>
    <div class="card">
        <div class="card-body">

        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="nlvnam" class="form_label">Search By :</label>
                <select class="form-select" name="nlvnam" id="nlvnam" required>
                <option value="" selected>--Leave Name--</option>
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

$ndslev = "";

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
$ndslev=tt_inpt($_POST['nlvnam']);
}

?>




<!--  First Name was change to ID No -->
<table>
    <thead>
    <tr>
    <th>Leave Name</th>
    <th>Department</th>
    <th>Designation</th>
    <th>Grade</th>
    <th>Gender</th>
    <th>Caryy Over</th>
    <th>Validity</th>
    <th>Total Days</th>
    <th>Per Month</th>
    <th>Encashment Days</th>
    <th>Month Frequency</th>
    <th>Bridging</th>
    <th>Actions</th>
  </tr>
</thead>

    <tbody>
    <tr>
    <?php
$sqlSelectRecord = "SELECT * FROM hrm_leavsetup WHERE hrm_LeaveRwId = '$ndslev'";
$sqlScriptExecution = $tdconton->query($sqlSelectRecord);
if($sqlScriptExecution->num_rows>0) {
    while($rowidno= $sqlScriptExecution->fetch_assoc())
    {
        ?>
    <td>
        
        <?php 
        //echo $ndslev;
        $selLvID= $rowidno['hrm_LeaveRwId'];
        $SelLv="SELECT * FROM hrm_setleave WHERE hrm_LeaveRwId = '$selLvID'";
        $SelLvexec=mysqli_query($tdconton,$SelLv);
        if(mysqli_num_rows($SelLvexec)>0){
            while($rowCat=mysqli_fetch_assoc($SelLvexec)){
    
            echo $rowCat["hrm_LeaveNam"];
            
            }
        } 
        ?>
    </td>
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
        $selDesiId = $rowidno['hrm_DesRwId'];
        $SeleDES="SELECT * FROM hrm_setdesig WHERE hrm_DesRwId = '$selDesiId'";
        $SeleDESexec=mysqli_query($tdconton,$SeleDES);
        if(mysqli_num_rows($SeleDESexec)>0){
            while($rowCat=mysqli_fetch_assoc($SeleDESexec)){
    
                echo $rowCat["hrm_DesNam"];
            
            }
        }
        ?>
    </td>
    <td>
        <?php
        $selGradId= $rowidno['hrm_GradRwId'];
        $SeleGrd="SELECT * FROM hrm_setgrad WHERE hrm_GradRwId = '$selGradId'";
        $SeleGrdexec=mysqli_query($tdconton,$SeleGrd);
        if(mysqli_num_rows($SeleGrdexec)>0){
            while($rowCat=mysqli_fetch_assoc($SeleGrdexec)){
    
            echo $rowCat["hrm_GradNam"];
            
            }
        }      
        ?>
    </td>
    <td>
        <?php 
                $selGendId = $rowidno['hrm_GendrRwId'];
                $SeleGn="SELECT * FROM hrm_setgendr WHERE hrm_GendrRwId = '$selGendId'";
                $SeleGnexec=mysqli_query($tdconton,$SeleGn);
                if(mysqli_num_rows($SeleGnexec)>0){
                    while($rowCat=mysqli_fetch_assoc($SeleGnexec)){
            
                    echo $rowCat["hrm_GendrNam"];
                    
                    }
                }
        ?>
    </td>
    <td>
        <?php
        $selCryId = $rowidno['hrm_CarryRwId'];
        $SeleCr="SELECT * FROM hrm_setcarry WHERE hrm_CarryRwId = '$selCryId'";
        $SeleCrexec=mysqli_query($tdconton,$SeleCr);
        if(mysqli_num_rows($SeleCrexec)>0){
            while($rowCat=mysqli_fetch_assoc($SeleCrexec)){
    
            echo $rowCat["hrm_CarryNam"];
            
            }
        }
        ?>
    </td>
    <td>
        <?php
        $selValiId= $rowidno['hrm_ValidRwId'];
        $Selevl="SELECT * FROM hrm_setvalid WHERE hrm_ValidRwId = '$selValiId'";
        $Selevlexec=mysqli_query($tdconton,$Selevl);
        if(mysqli_num_rows($Selevlexec)>0){
            while($rowCat=mysqli_fetch_assoc($Selevlexec)){
    
            echo $rowCat["hrm_ValidNam"];

            
            }
        }
        ?>
    </td>
    <td><?php echo $rowidno["hrm_LvSetTotDay"]; ?></td>
    <td><?php echo $rowidno["hrm_LvSetPrMnth"]; ?></td>
    <td><?php echo $rowidno["hrm_LvSetEncDy"]; ?></td>
    <td><?php echo $rowidno["hrm_LvSetMnthfre"]; ?></td>
    <td>
        <?php
         $selBridId = $rowidno['hrm_BridRwId'];
         $SeleSem="SELECT * FROM hrm_setbridge WHERE hrm_BridRwId = '$selBridId'";
         $SeleSemexec=mysqli_query($tdconton,$SeleSem);
         if(mysqli_num_rows($SeleSemexec)>0){
             while($rowCat=mysqli_fetch_assoc($SeleSemexec)){
     
             echo $rowCat["hrm_BridNam"];
             
             }
         }
         ?>
    </td>
    <td class="tn">
    <div class="dropdown">
               <button class="ellipsis-btn">&#8942;</button>
               <div class="dropdown-content">
                  <a href="hrm-LeavStVwA.php?fida=<?php echo $rowidno['hrm_LvSetRwId']; ?>">Single View</a>
                  <a href="hrm-LeavStVwB.php?fidb=<?php echo $rowidno['hrm_LvSetRwId']; ?>">Edit</a>
                  <a href="hrm-LeavStVwC.php?fidc=<?php echo $rowidno['hrm_LvSetRwId']; ?>">Delete</a>
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
