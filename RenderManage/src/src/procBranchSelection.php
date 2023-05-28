<?php
$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');

// Prepare and execute SQL statement
$stid = oci_parse($conn, "SELECT branch_name FROM Branch");
oci_execute($stid);

// Fetch each row in an associative array
$row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
while ($row) {
    echo '<option value="' . htmlentities($row['BranchNumber']) . '">' . htmlentities($row['BranchNumber']) . '</option>';
    $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
}

oci_free_statement($stid);
oci_close($conn);
?>
