<?php
// Connect to your database
$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');

// Prepare the SQL statement to fetch the expiring properties
$sql = "SELECT RPNUMBER, RPCITY, RPSTREET, RPZIPCODE,STARTDATE,ENDDATE
        FROM LeaseAgreement
        WHERE EndDate - SYSDATE <= 60 AND SYSDATE < EndDate";

$stid = oci_parse($conn, $sql);

// Execute the SQL statement
oci_execute($stid);

// Fetch the expiring properties
    echo "<table>";
    echo "<tr><th>RPNumber</th><th>CITY</th><th>Street</th><th>ZIP</th><th>Start Date</th><th>End Date</th></tr>";
    while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as  $column => $value) {
            echo "<td>" . ($value !== null ? htmlentities($value, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    
    echo "</table>";
    echo "</div>";

oci_free_statement($stid);
// Close the Oracle connection
oci_close($conn);

// Return the expiring properties as a JSON response

?>
