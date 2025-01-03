<?php
header("Content-Type: application/json");
include_once("SJ-dbcona/dhh-jConntAB.php");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        handleGet($pdo);
        break;
    case 'POST':
        handlePost($pdo, $input);
        break;
    case 'PUT':
        handlePut($pdo, $input);
        break;
    case 'DELETE':
        handleDelete($pdo, $input);
        break;
    default:
        echo json_encode(['message' => 'Invalid request method']);
        break;
}

function handleGet($pdo) {
    if (isset($_GET['id'])) {
        // Retrieve data for a single row   //http://localhost/HRMS_Proj/restapi/api.php?id=11
        $sql = "SELECT * FROM hrm_staffmonsal WHERE SalMon_RwId = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $_GET['id']]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(['message' => 'No record found']);
        }
    } else {
        // Retrieve all rows  //http://localhost/HRMS_Proj/restapi/api.php
        $sql = "SELECT * FROM hrm_staffmonsal";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }
}

function handlePost($pdo, $input) {
    $sql = "INSERT INTO hrm_staffmonsal (Sal_empno, Sal_empnnam, Sal_Stafnam, Sal_Depnam, Sal_Desnam, Sal_Month, Sal_year, Sal_Workdays, Sal_BasicSlry, Sal_IncreA, Sal_IncreB, Sal_SpeAllow, Sal_ExpAllow, Sal_Gross, Sal_EPF, Sal_NoPay, Sal_Advance, Sal_MobleBill, Sal_Loan, Sal_IncmTax, Sal_WithHldTax, Sal_DedTot, Sal_SalryNet, SalMon_UnqId, SalMon_IPadds, SalMon_CretdBy) 
    VALUES (:Sal_empno, :Sal_empnnam, :Sal_Stafnam, :Sal_Depnam, :Sal_Desnam, :Sal_Month, :Sal_year, :Sal_Workdays, :Sal_BasicSlry, :Sal_IncreA, :Sal_IncreB, :Sal_SpeAllow, :Sal_ExpAllow, :Sal_Gross, :Sal_EPF, :Sal_NoPay, :Sal_Advance, :Sal_MobleBill, :Sal_Loan, :Sal_IncmTax, :Sal_WithHldTax, :Sal_DedTot, :Sal_SalryNet, :SalMon_UnqId, :SalMon_IPadds, :SalMon_CretdBy)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'Sal_empno' => $input['Employee_no'],
        'Sal_empnnam' => $input['Employee_name'],
        'Sal_Stafnam' => $input['Staff_name'],
        'Sal_Depnam' => $input['Department_name'],
        'Sal_Desnam' => $input['Designation_name'],
        'Sal_Month' => $input['Salary_month'],
        'Sal_year' => $input['Salary_year'],
        'Sal_Workdays' => $input['Working_days'],
        'Sal_BasicSlry' => $input['Basic_Salary'],
        'Sal_IncreA' => $input['Increment_A'],
        'Sal_IncreB' => $input['Increment_B'],
        'Sal_SpeAllow' => $input['Special_allowance'],
        'Sal_ExpAllow' => $input['Expertise_allowance'],
        'Sal_Gross' => $input['Gross_salary'],
        'Sal_EPF' => $input['EPF'],
        'Sal_NoPay' => $input['No_Pay'],
        'Sal_Advance' => $input['Advance'],
        'Sal_MobleBill' => $input['Mobile_bill'],
        'Sal_Loan' => $input['Loan'],
        'Sal_IncmTax' => $input['Income_tax'],
        'Sal_WithHldTax' => $input['With_holding_tax'],
        'Sal_DedTot' => $input['Total_deduction'],
        'Sal_SalryNet' => $input['Net_salary'],
        'SalMon_UnqId' => $input['Unique_id'],
        'SalMon_IPadds' => $input['IP_address'],
        'SalMon_CretdBy' => $input['Created_by']
    ]);
    echo json_encode(['message' => 'User created successfully']);
}
/*http://localhost/HRMS_Proj/restapi/api.php
{
"Employee_no": 4567,
"Employee_name": "Jayathilaka",
"Staff_name": "Permanent",
"Department_name": "HR",
"Designation_name": "Manager",
"Salary_month": "January",
"Salary_year": 2025,
"Working_days": 28,
"Basic_Salary": 45000.00,
"Increment_A": 0,
"Increment_B": 0,
"Special_allowance": 0,
"Expertise_allowance": 0,
"Gross_salary": 0,
"EPF": 0,
"No_Pay": 0,
"Advance": 0,
"Mobile_bill": 0,
"Loan": 0,
"Income_tax": 0,
"With_holding_tax": 0,
"Total_deduction": 0,
"Net_salary": 0,
"Unique_id": 0,
"IP_address": 0,
"Created_by": 0
}*/

function handlePut($pdo, $input) {
    $sql = "UPDATE hrm_staffmonsal SET 
        Sal_empno = :Sal_empno, 
        Sal_empnnam = :Sal_empnnam, 
        Sal_Stafnam = :Sal_Stafnam, 
        Sal_Depnam = :Sal_Depnam, 
        Sal_Desnam = :Sal_Desnam, 
        Sal_Month = :Sal_Month, 
        Sal_year = :Sal_year, 
        Sal_Workdays = :Sal_Workdays, 
        Sal_BasicSlry = :Sal_BasicSlry, 
        Sal_IncreA = :Sal_IncreA, 
        Sal_IncreB = :Sal_IncreB, 
        Sal_SpeAllow = :Sal_SpeAllow, 
        Sal_ExpAllow = :Sal_ExpAllow, 
        Sal_Gross = :Sal_Gross, 
        Sal_EPF = :Sal_EPF, 
        Sal_NoPay = :Sal_NoPay, 
        Sal_Advance = :Sal_Advance, 
        Sal_MobleBill = :Sal_MobleBill, 
        Sal_Loan = :Sal_Loan, 
        Sal_IncmTax = :Sal_IncmTax, 
        Sal_WithHldTax = :Sal_WithHldTax, 
        Sal_DedTot = :Sal_DedTot, 
        Sal_SalryNet = :Sal_SalryNet, 
        SalMon_UnqId = :SalMon_UnqId, 
        SalMon_IPadds = :SalMon_IPadds, 
        SalMon_CretdBy = :SalMon_CretdBy
    WHERE SalMon_RwId = :SalMon_RwId";  // Make sure to use the correct placeholder for the ID field

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'Sal_empno' => $input['Employee_no'],
        'Sal_empnnam' => $input['Employee_name'],
        'Sal_Stafnam' => $input['Staff_name'],
        'Sal_Depnam' => $input['Department_name'],
        'Sal_Desnam' => $input['Designation_name'],
        'Sal_Month' => $input['Salary_month'],
        'Sal_year' => $input['Salary_year'],
        'Sal_Workdays' => $input['Working_days'],
        'Sal_BasicSlry' => $input['Basic_Salary'],
        'Sal_IncreA' => $input['Increment_A'],
        'Sal_IncreB' => $input['Increment_B'],
        'Sal_SpeAllow' => $input['Special_allowance'],
        'Sal_ExpAllow' => $input['Expertise_allowance'],
        'Sal_Gross' => $input['Gross_salary'],
        'Sal_EPF' => $input['EPF'],
        'Sal_NoPay' => $input['No_Pay'],
        'Sal_Advance' => $input['Advance'],
        'Sal_MobleBill' => $input['Mobile_bill'],
        'Sal_Loan' => $input['Loan'],
        'Sal_IncmTax' => $input['Income_tax'],
        'Sal_WithHldTax' => $input['With_holding_tax'],
        'Sal_DedTot' => $input['Total_deduction'],
        'Sal_SalryNet' => $input['Net_salary'],
        'SalMon_UnqId' => $input['Unique_id'],
        'SalMon_IPadds' => $input['IP_address'],
        'SalMon_CretdBy' => $input['Created_by'],
        'SalMon_RwId' => $input['ID']  // Make sure to pass the ID here
    ]);
    echo json_encode(['message' => 'User updated successfully']);
} //http://localhost/HRMS_Proj/restapi/api.php
/*
{
"ID": 11,
"Employee_no": 4588,
"Employee_name": "Jayathilaka",
"Staff_name": "Permanent",
"Department_name": "HR",
"Designation_name": "Manager",
"Salary_month": "January",
"Salary_year": 2025,
"Working_days": 28,
"Basic_Salary": 45000.00,
"Increment_A": 0,
"Increment_B": 0,
"Special_allowance": 0,
"Expertise_allowance": 0,
"Gross_salary": 0,
"EPF": 0,
"No_Pay": 0,
"Advance": 0,
"Mobile_bill": 0,
"Loan": 0,
"Income_tax": 0,
"With_holding_tax": 0,
"Total_deduction": 0,
"Net_salary": 0,
"Unique_id": 0,
"IP_address": 0,
"Created_by": 0
}
*/


function handleDelete($pdo, $input) {
    $sql = "DELETE FROM hrm_staffmonsal WHERE SalMon_RwId = :ID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['ID' => $input['ID']]);
    echo json_encode(['message' => 'User deleted successfully']);    //http://localhost/HRMS_Proj/restapi/api.php     //{"ID": 9 }
}
?> 