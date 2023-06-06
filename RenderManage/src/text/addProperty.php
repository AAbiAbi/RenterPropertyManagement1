<?php
// Connect to your database
$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');

// Get the data from the form
$rpNumber = $_POST['rpNumber'];
$street = $_POST['street'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];
$rooms = $_POST['rooms'];
$rent = $_POST['rent'];
$ownerName = $_POST['ownerName'];
$ownerPhone = $_POST['ownerPhone'];
$pstatus="available";

// Prepare your SQL statement
$sql = "INSERT INTO RentalProperty (RPNumber, Street, City, Zipcode, RoomNo, Rent,OwnerPhone, PropertyStatus)
        VALUES (:rpNumber, :street, :city, :zipcode, :rooms, :rent, :ownerPhone, :pstatus)";

$stid = oci_parse($conn, $sql);

// Bind the data
oci_bind_by_name($stid, ":rpNumber", $rpNumber);
oci_bind_by_name($stid, ":street", $street);
oci_bind_by_name($stid, ":city", $city);
oci_bind_by_name($stid, ":zipcode", $zipcode);
oci_bind_by_name($stid, ":rooms", $rooms);
oci_bind_by_name($stid, ":rent", $rent);
oci_bind_by_name($stid, ":ownerPhone", $ownerPhone);
oci_bind_by_name($stid, ":pstatus", $pstatus);

// Execute the SQL statement
$result = oci_execute($stid);

// Check if the insertion was successful
if ($result) {
    // Display a success message or perform any other action
    echo "New rental property inserted successfully!";
} else {
    // Display an error message or perform any other action
    echo "Error inserting new rental property.";
}

// Close the Oracle connection
oci_close($conn);
?>