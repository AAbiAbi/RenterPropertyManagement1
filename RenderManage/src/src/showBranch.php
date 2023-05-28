<?php
$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');
if($conn) {
    print "<br> connection successful"; 
}

$branch = $_POST['branch'];

// Prepare and execute SQL statement
$stid = oci_parse($conn, "SELECT * FROM Branch WHERE BranchNumber = :branch");
oci_bind_by_name($stid, ":branch", $branch);
oci_execute($stid);

// Fetch each row in an associative array
echo "<h2>Selected Branch</h2>";
$row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
if ($row) {
    foreach ($row as $item) {
        echo ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . " ";
    }
    echo "<br>\n";
} else {
    echo "No such branch found.";
}

oci_free_statement($stid);
oci_close($conn);
?>
