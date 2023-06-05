<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="dashboard.php">Strawberry Rental Property Management Inc</a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Dashboard</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

  <div class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="col">
              <hr>
              <h2>Lease Agreements Generated Successfully!</h2>
              <br>


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
    echo "<div class='text-danger'>Error creating Lease Agreement.</div>";
} else {
    echo "<table class='table'>";
    foreach ($row as $key => $value) {
        //echo "$key: $value<br>";
        switch ($key) {
            case "RPNUMBER":
                $label = "Property Number";
                break;
            case "RPSTREET":
                $label = "Street";
                break;
            case "RPCITY":
                $label = "City";
                break;
            case "RPZIPCODE":
                $label = "Zipcode";
                break; 
            case "RENTERNAME";
                $label = "Renter Name";
                break;
            case "RENTERHOMEPHONE";
                $label = "Renter Home Phone";
                break;
            case "RENTERWORKPHONE";
                $label = "Renter Work Phone";
                break;     
            case "RENT";
                $label = "Renter Home Phone";
                $value = "$" . $value;
                break;
            case "DEPOSITE";
                $label = "Deposit";
                $value = "$" . $value;
                break;
            case "STARTDATE";
                $label = "Start Date";
                break;
            case "ENDDATE";
                $label = "End Date";
                break;
        }
        // Display the attribute in the table
      echo "<tr><td><strong>" . $label . "</strong></td><td>" . $value . "</td></tr>";
    }
    echo "</table>";
}


oci_close($conn);


// You can now fetch and display the lease agreement details
// ...
?>
</div>
      </div>
    </div>
  </div>
  
  <footer class="bg-dark text-white py-3">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          &copy; 2023 Strawberry Rental Property Management Inc. All rights reserved.
          <a href="contact.html" class="text-white ml-2">Contact Us</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
 

</body>

</html>
