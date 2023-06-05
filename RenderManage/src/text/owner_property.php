<?php
// Retrieve the input values from the URL query parameters
$ownerName = isset($_POST['ownerName']) ? $_POST['ownerName'] : 'NULL';
$ownerPhone = isset($_POST['ownerPhone']) ? $_POST['ownerPhone'] : NULL;
$branchNumber = isset($_POST['branch']) ? $_POST['branch'] : NULL;

// Connect to the database
$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');


if ($ownerPhone == NULL ) {
    $stid_ownerphone = oci_parse($conn, "SELECT OWNERPHONE FROM Owner WHERE OwnerName = :ownerName");
    oci_bind_by_name($stid_ownerphone, ":ownerName", $ownerName);
    oci_execute($stid_ownerphone);
    // Define the variable to hold the ManagerID
    // $ownerPhone = null;

    // Define the variable to receive the fetch status
    $fetchStatus = oci_fetch($stid_ownerphone);

    if ($fetchStatus !== false) {
        // Fetch the result
        $ownerPhone = oci_result($stid_ownerphone, "OWNERPHONE");
        $stid = oci_parse($conn, "(SELECT * FROM RentalProperty WHERE OwnerPhone = :ownerPhone )INTERSECT 
(SELECT * FROM RentalProperty WHERE RPNumber 
IN (SELECT RPNumber FROM Supervise WHERE SupId IN (SELECT EmployeeId FROM
 Employee WHERE BRANCHID = :branchNumber)))");

// oci_bind_by_name($stid, ":ownerName", $ownerName);
oci_bind_by_name($stid, ":ownerPhone", $ownerPhone);
oci_bind_by_name($stid, ":branchNumber", $branchNumber);
oci_execute($stid);


echo "<br>\n";
// Display properties in a table
echo "<h2>Properties Owned by $ownerName ($ownerPhone)</h2>";
echo "<h4>Managed by Branch". $branchNumber ."</h4>";
echo '<table class="table">';
    echo "<tr>
            <th>Property Number</th>
            <th>Street</th>
            <th>City</th>
            <th>Zip Code</th>
            <th>Room Count</th>
            <th>Rent</th>
            <th>Property Status</th>
            <th>Owner Phone</th>
        </tr>";
while ($propertyRow = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>";
    foreach ($propertyRow as $item) {
        echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

oci_free_statement($stid);

    }else{
        echo "<div class='text-danger'>Owner not found.</div>";
    }


}

oci_close($conn);

?>
