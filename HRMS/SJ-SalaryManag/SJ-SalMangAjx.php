<?php
include_once("../SJ-dbcona/dhh-jConntAB.php");

if (isset($_POST['empNum'])) {
    $empNum = mysqli_real_escape_string($tdconton, $_POST['empNum']); // Sanitize input

    // Query to fetch the employee name and staff id
    $query = "SELECT * FROM hrm_setemp WHERE Emp_Num='$empNum'"; 
    $result = mysqli_query($tdconton, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $empName = $row['Emp_Nam'];
        $empStaffId = $row['Emp_StaffId'];
        $empDesigId = $row['Emp_DesigId']; 
        $empDepId = $row['Emp_DepId'];

        // Query to fetch the staff name based on Emp_StaffId
        $querytw = "SELECT Staf_Nam FROM hrm_setstaf WHERE Staf_RwId='$empStaffId'"; 
        $resulttw = mysqli_query($tdconton, $querytw);
        if ($resulttw && mysqli_num_rows($resulttw) > 0) {
            $rowt = mysqli_fetch_assoc($resulttw);
            $staffName = $rowt['Staf_Nam'];
        } else {
            echo json_encode(['error' => 'Staff not found']);
            exit; // Stop further execution
        }

        // Query to fetch the designation based on Emp_DesigId
        $querytr = "SELECT hrm_DesNam FROM hrm_setdesig WHERE hrm_DesRwId='$empDesigId'"; 
        $resulttr = mysqli_query($tdconton, $querytr);
        if ($resulttr && mysqli_num_rows($resulttr) > 0) {
            $rowr = mysqli_fetch_assoc($resulttr);
            $designation = $rowr['hrm_DesNam'];
        } else {
            echo json_encode(['error' => 'Designation not found']);
            exit; // Stop further execution
        }

        // Query to fetch the department based on Emp_DesigId
        $querytf = "SELECT hrm_DepNam FROM hrm_setdepart WHERE hrm_DepRwId='$empDepId'"; 
        $resulttf = mysqli_query($tdconton, $querytf);
        if ($resulttf && mysqli_num_rows($resulttf) > 0) {
            $rowf = mysqli_fetch_assoc($resulttf);
            $department = $rowf['hrm_DepNam'];
        } else {
            echo json_encode(['error' => 'Department not found']);
            exit; // Stop further execution
        }

        // Return employee details as JSON
        echo json_encode([
            'empName' => $empName, 
            'staffName' => $staffName, 
            'designation' => $designation,
            'department' => $department
        ]);
    } else {
        echo json_encode(['error' => 'Employee not found']);
    }
} else {
    echo json_encode(['error' => 'No empNum provided']);
}
?>
