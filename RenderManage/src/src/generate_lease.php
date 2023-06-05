<?php
// Connect to your database
$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');

// Get the data from the form
$propertyId = $_POST['propertyId'];
$renterName = $_POST['renterName'];
$renterHomePhone = $_POST['renterHomePhone'];
$renterWorkPhone = $_POST['renterWorkPhone'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

// Prepare your SQL statement
$sql = "INSERT INTO LeaseAgreement (RPNumber, RPStreet, RPCity, RPZipCode, rent, Deposite, renterName, renterHomePhone, renterWorkPhone, startDate, endDate) 
SELECT RPNumber, STREET, CITY, ZIPCODE, RENT, RENT, :renterName, :renterHomePhone, :renterWorkPhone, TO_DATE(:startDate, 'YYYY-MM-DD'), TO_DATE(:endDate, 'YYYY-MM-DD')
FROM RentalProperty
WHERE RPNumber = :propertyId";

$stid = oci_parse($conn, $sql);

// Bind the data
oci_bind_by_name($stid, ":propertyId", $propertyId);
oci_bind_by_name($stid, ":renterName", $renterName);
oci_bind_by_name($stid, ":renterHomePhone", $renterHomePhone);
oci_bind_by_name($stid, ":renterWorkPhone", $renterWorkPhone);
oci_bind_by_name($stid, ":startDate", $startDate);
oci_bind_by_name($stid, ":endDate", $endDate);

// Execute the SQL statement
oci_execute($stid);

// Close the Oracle connection
$sql_lease = "SELECT * FROM LEASEAGREEMENT WHERE RPNumber = :propertyId AND RenterHomePhone = :renterHomePhone";
$stid_lease = oci_parse($conn, $sql_lease);
oci_bind_by_name($stid_lease, ":propertyId", $propertyId);
oci_bind_by_name($stid_lease,":renterHomePhone", $renterHomePhone);
oci_execute($stid_lease);

// Fetch the data
$row = oci_fetch_array($stid_lease, OCI_ASSOC+OCI_RETURN_NULLS);

if (!$row) {
    echo "No data found";
} else {
    echo "Successful! Lease Agreement details:\n";
    foreach ($row as $key => $value) {
        echo "$key: $value<br>";
    }
}

oci_close($conn);


// You can now fetch and display the lease agreement details
// ...
?>
