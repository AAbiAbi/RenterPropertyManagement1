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
            <div class="col d-flex flex-column align-items-center">
              <hr>
              <h2>Lease Agreements Expiring Soon</h2>
              <br>
                
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
                  echo '<table class="table">';
                  echo "<tr>
            <th>Property Number</th>
            <th>City</th>
            <th>Street</th>
            <th>Zip Code</th>
            <th>Start Date</th>
            <th>End Date</th>
          </tr>";
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

              </div>
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
