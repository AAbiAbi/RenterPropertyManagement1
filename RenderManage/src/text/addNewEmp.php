<?php
// Connect to your database
$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');

// Get the data from the form
$id = $_POST['id'];
$sname = $_POST['name'];
$phone = $_POST['phone'];
$branch = $_POST['branch'];
$manager = $_POST['manager'];
$sdate = $_POST['date'];
$designation = $_POST['designation'];

$managerIdStmt = oci_parse($conn, "SELECT EmployeeId FROM Employee WHERE EmpName = :manager");
oci_bind_by_name($managerIdStmt, ":manager", $manager);
oci_execute($managerIdStmt);

// Define the variable to hold the ManagerID
$managerID = null;

// Fetch the result
$fetchStatus = oci_fetch($managerIdStmt);

if ($fetchStatus !== false) {
    $managerID = oci_result($managerIdStmt, "EMPLOYEEID");
}

// Prepare your SQL statement
$sql = "INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) 
        VALUES (:id, :sname, :phone, TO_DATE(:sdate, 'YYYY-MM-DD'), :designation, :branch, :managerID)";

$stid = oci_parse($conn, $sql);

// Bind the data
oci_bind_by_name($stid, ":id", $id);
oci_bind_by_name($stid, ":sname", $sname);
oci_bind_by_name($stid, ":phone", $phone);
oci_bind_by_name($stid, ":sdate", $sdate);
oci_bind_by_name($stid, ":designation", $designation);
oci_bind_by_name($stid, ":branch", $branch);
oci_bind_by_name($stid, ":managerID", $managerID);

// Execute the SQL statement
oci_execute($stid);


    // Display a success message or perform any other action
    echo "New employee inserted successfully!";

   

// Close the Oracle connection
oci_close($conn);
?>
