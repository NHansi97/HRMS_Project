<?php //session_start();
$uname=$_SESSION['username'];
 if(!$_SESSION['userid']) {
  header("Location:../index.php");
  die();
}
if($_SESSION['privilege'] != 1){
  header("location:../index.php");
}
?>

<div class="sidebar">
    <div class="sidebar-header">
    <a href="../" class="sidebar-logo">D HELP PVT LTD</a>
    </div><!-- sidebar-header -->
    <div id="sidebarMenu" class="sidebar-body">
    <div class="nav-group show">
        <a href="#" class="nav-label">Dashboard</a>
        <ul class="nav nav-sidebar">
        <li class="nav-item">
            <a href="../dashboard/index.php" class="nav-link active"><i class="ri-coin-fill"></i> <span>Dashboard</span></a>
        </li>
        </ul>
    </div><!-- nav-group -->
    <div class="nav-group show">
        <a href="#" class="nav-label">Pages</a>
        <ul class="nav nav-sidebar">
        <li class="nav-item">
            <a href="" class="nav-link has-sub"><i class="ri-lock-2-line"></i> <span>Authentication</span></a>
            <nav class="nav nav-sub">
            <a href="../SJ-auth/sj-createUser.php" class="nav-sub-link">Create User</a>
            <a href="../SJ-auth/sj-passChange.php" class="nav-sub-link">Change Password</a>
            </nav>
        </li>
        </ul>
    </div><!-- nav-group -->
    
    <div class="nav-group show">
        <a href="#" class="nav-label">HRMS</a>
        <ul class="nav nav-sidebar">
        <li class="nav-item">
            <a href="" class="nav-link has-sub"><i class="ri-file-text-line"></i> <span>Salary Management</span></a>
            <nav class="nav nav-sub">
            <a href="../SJ-SalaryManag/SJ-SalMang.php" class="nav-sub-link">Add Salary Details</a>
            <a href="../SJ-SalaryManag/SJ-SalMangAVw.php" class="nav-sub-link">View all Salary Details</a>
            </nav>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link has-sub"><i class="ri-file-text-line"></i> <span>Leave Register</span></a>
            <nav class="nav nav-sub">
            <a href="../HRMS/hrm-LevRegi.php" class="nav-sub-link">Add Leave Register</a>
            <a href="../HRMS/hrm-LevRegiVw.php" class="nav-sub-link">View all Leave Register</a>
            </nav>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link has-sub"><i class="ri-file-text-line"></i> <span>Holidays</span></a>
            <nav class="nav nav-sub">
            <a href="../HRMS/hrm-holi.php" class="nav-sub-link">Add Holiday</a>
            <a href="../HRMS/hrm-holiVw.php" class="nav-sub-link">View all Holidays</a>
            </nav>
        </li>
        <!-- <li class="nav-item">
            <a href="" class="nav-link has-sub"><i class="ri-file-text-line"></i> <span>Leave Setup</span></a>
            <nav class="nav nav-sub">
            <a href="../HRMS/hrm-LeavSt.php" class="nav-sub-link">Add Leave Setup</a>
            <a href="../HRMS/hrm-LeavStVw.php" class="nav-sub-link">View all Leave Setup</a>
            </nav>
        </li> -->
        <li class="nav-item">
            <a href="" class="nav-link has-sub"><i class="ri-file-text-line"></i> <span>Department</span></a>
            <nav class="nav nav-sub">
            <a href="../HRMS/hrm-setdep.php" class="nav-sub-link">Add Department</a>
            <a href="../HRMS/hrm-setdepVw.php" class="nav-sub-link">View all Department</a>
            </nav>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link has-sub"><i class="ri-file-text-line"></i> <span>Designation</span></a>
            <nav class="nav nav-sub">
            <a href="../HRMS/hrm-setdesg.php" class="nav-sub-link">Add Designation</a>
            <a href="../HRMS/hrm-setdesgVw.php" class="nav-sub-link">View all Designations</a>
            </nav>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link has-sub"><i class="ri-file-text-line"></i> <span>Leave</span></a>
            <nav class="nav nav-sub">
            <a href="../HRMS/hrm-setleav.php" class="nav-sub-link">Add Leave</a>
            <a href="../HRMS/hrm-setleavVw.php" class="nav-sub-link">View all Leave</a>
            </nav>
        </li>
        </ul>
    </div><!-- nav-group -->

    </div><!-- sidebar-body -->
    <div class="sidebar-footer">
    <div class="sidebar-footer-top">
        <div class="sidebar-footer-thumb">
        <img src="https://via.placeholder.com/500/4c5366/fff" alt="">
        </div><!-- sidebar-footer-thumb -->
        <div class="sidebar-footer-body">
        <h6><a href="#"><?php echo $uname;?></a></h6>
        <p>Premium Member</p>
        </div><!-- sidebar-footer-body -->
        <a id="sidebarFooterMenu" href="" class="dropdown-link"><i class="ri-arrow-down-s-line"></i></a>
    </div><!-- sidebar-footer-top -->
    <div class="sidebar-footer-menu">
        <nav class="nav">
        <a href=""><i class="ri-edit-2-line"></i> Edit Profile</a>
        <a href=""><i class="ri-profile-line"></i> View Profile</a>
        </nav>
        <hr>
        <nav class="nav">
        <a href=""><i class="ri-question-line"></i> Help Center</a>
        <a href=""><i class="ri-lock-line"></i> Privacy Settings</a>
        <a href=""><i class="ri-user-settings-line"></i> Account Settings</a>
        <a href="../SJ-auth/sj-logout.php"><i class="ri-logout-box-r-line"></i> Log Out</a>
        </nav>
    </div><!-- sidebar-footer-menu -->
    </div><!-- sidebar-footer -->
</div><!-- sidebar -->