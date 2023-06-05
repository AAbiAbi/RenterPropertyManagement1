<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');
//////////////////////////////////////////////////////////////////////////////////////

// $stid = oci_parse($conn, "SELECT branchnumber FROM branch");

// if ($stid) {
//     $result = oci_execute($stid);
//     if ($result) {
//         while ($row = oci_fetch_array($stid, OCI_ASSOC)) {
//             // Access the value of 'branchnumber' from the current row
//             $branchnumber = $row['BRANCHNUMBER'];
//             echo $branchnumber . "\n";
//         }
//     } else {
//         $error = oci_error($stid);
//         echo "Error executing query: " . $error['message'];
//     }

//     oci_free_statement($stid);
// } else {
//     $error = oci_error($conn);
//     echo "Error preparing statement: " . $error['message'];
// }
//////////////////////////////////////////////////////////////////////////////////////

// print "<br> connection successful"; 
// Prepare and execute SQL statement

$stid = oci_parse($conn, "SELECT BRANCHNUMBER FROM Branch");

oci_execute($stid);
// echo $stid;
// Fetch each row in an associative array
// $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
// var_dump($row);
$branchNumbers = array();
//echo  oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
    // print $row['BRANCHNUMBER']; 
    // echo $row['BRANCHNUMBER'];
    // $branchNumber = htmlentities($row['BRANCHNUMBER']);
    // echo '<option value="' . $branchNumber . '">' . $branchNumber . '</option>';
    $branchNumbers[] = $row['BRANCHNUMBER'];
    // $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
}

oci_free_statement($stid);
oci_close($conn);

// Get the selected branch from the submitted form data
$selectedBranch = isset($_POST['branch']) ? $_POST['branch'] : '';

// Prepare the response data
$response = [
     'options' => $branchNumbers,
    // 'options' => 9,
     'selected' => $selectedBranch
];
// Generate the response as a string with each branch number on a separate line
 $response = implode("\n", $branchNumbers);
// $response = implode("\n", $response);
// Set the response content type to plain text
header('Content-Type: text/plain');

// Output the response
echo $response;
?>
