<?php
// Connect to your database
$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');

// Get the data from the form
$renterHomePhone = $_POST['renterHomePhone'];

// Prepare your SQL statement
$sql = "SELECT * FROM LeaseAgreement WHERE renterHomePhone = :renterHomePhone";

$stid = oci_parse($conn, $sql);

// Bind the data
oci_bind_by_name($stid, ":renterHomePhone", $renterHomePhone);

// Execute the SQL statement
oci_execute($stid);
// Variable to track if at least one lease agreement is found
$leaseFound = false;

echo "Lease Agreements for this phone number:\n<br>";
// Fetch the data
// Fetch the data
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $leaseFound = true;
    foreach ($row as $key => $value) {
        echo "$key: $value<br>";
    }
    echo "<br>";
}


if (!$leaseFound) {
    echo "No lease agreement found for this phone number.";
}


// Close the Oracle connection
oci_close($conn);
?>
