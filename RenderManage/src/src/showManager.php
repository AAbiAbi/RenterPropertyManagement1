<?php
$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');
// if($conn) {
//     print "<br> connection successful"; 
// }

$manager = $_POST['manager'];
// echo($manager);//Jane Doe
// Prepare and execute SQL statement
$stid_manager = oci_parse($conn, "SELECT * FROM Employee WHERE EmpName = :manager");
oci_bind_by_name($stid_manager, ":manager", $manager);
oci_execute($stid_manager);

// Fetch each row in an associative array
$manager_row = oci_fetch_array($stid_manager, OCI_ASSOC+OCI_RETURN_NULLS);

echo "<h2>Manager ". $manager ."</h2>";
if ($manager_row) {
    foreach ($manager_row as $item) {
        
        echo ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . " ";
    }
    echo "<br>\n";
    $stid_managerID = oci_parse($conn, "SELECT EMPLOYEEID FROM Employee WHERE EmpName = :manager");
    oci_bind_by_name($stid_managerID, ":manager", $manager);
    oci_execute($stid_managerID);

    // Define the variable to hold the ManagerID
    $managerID = null;

    // Define the variable to receive the fetch status
    $fetchStatus = oci_fetch($stid_managerID);

    if ($fetchStatus !== false) {
        // Fetch the result
        $managerID = oci_result($stid_managerID, "EMPLOYEEID");
    }

    echo "Manager ID: " . $managerID;

    
    // Prepare and execute SQL statement to retrieve employees in the selected branch
    $stid_employees = oci_parse($conn, "SELECT * FROM Employee WHERE ManagerID = :managerID");
    oci_bind_by_name($stid_employees, ":managerID", $managerID);
    oci_execute($stid_employees);
    if (!$stid_employees) {
        $error = oci_error($conn);
        echo "Error executing SQL statement: " . $error['message'];
    }
    // Display employees in a table
    echo "<h2>Employees handled</h2>";
    echo "<table>";
    echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Employee Phone</th><th>Start Date</th><th>Position</th><th>Branch ID</th><th>Manager ID</th></tr>";
    while ($employee_row = oci_fetch_array($stid_employees, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        // foreach ($employee_row as $item) {
        //     echo($employee_row);
        //     echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        // }
        foreach ($employee_row as $key => $value) {
            echo "<td>" . ($value !== null ? htmlentities($value, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    
    echo "</table>";

    // Retrieve rental properties available for the selected branch
    $stid_properties = oci_parse($conn, "SELECT * 
    FROM RentalProperty 
    WHERE  RPNumber IN (SELECT RPNumber 
                    FROM Supervise 
                    WHERE SupId IN (SELECT EmployeeId 
                                    FROM Employee 
                                    WHERE ManagerID = :managerID))"
    );
    // oci_bind_by_name($stid_properties, ":branch", $branch);
    oci_bind_by_name($stid_properties, ":managerID", $managerID);                           
    oci_execute($stid_properties);
     // Display rental properties in a table
    echo "<h2>Rental Properties Available</h2>";
    echo "<table>";
    echo "<tr><th>RP Number</th><th>Street</th><th>City</th><th>Zip Code</th><th>Room No</th><th>Rent</th><th>Property Status</th><th>Owner Phone</th></tr>";
    while ($property_row = oci_fetch_array($stid_properties, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($property_row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No such manager found.";
}
oci_free_statement($stid_managerID);
oci_free_statement($stid_manager);
oci_close($conn);
?>
