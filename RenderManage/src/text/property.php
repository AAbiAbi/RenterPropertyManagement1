<!doctype html>
<html lang="en">

<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>Branch</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
 <link rel="stylesheet" href="style.css">
</head>

<body>
<?php include 'navbar.php'; ?>
  
 <div class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1 class="mt-3">Add a New Rental Property</h1>
            <hr>
            <form id="newPropertyForm" action="addProperty.php" method="post">
              <div class="form-row align-items-center">
                <div class="form-group col-md-3">
                  <label for="rpNumber">Enter Property Number:</label>
                  <input type="text" id="rpNumber" name="rpNumber" class="form-control">
                </div>
                <div class="form-group col-md-3">
                  <label for="street">Street:</label>
                  <input type="text" id="street" name="street" class="form-control">
                </div>
                <div class="form-group col-md-3">
                  <label for="city">City:</label>
                  <input type="text" id="city" name="city" class="form-control">
                </div>
                <div class="form-group col-md-3">
                  <label for="zipcode">Zip:</label>
                  <input type="text" id="zipcode" name="zipcode" class="form-control">
                </div>
              </div>
              <div class="form-row align-items-center">
                <div class="form-group col-md-3">
                  <label for="rpNumber">Number of Rooms:</label>
                <select id="rooms" name="rooms" class="form-control">
                  <option value="">-- Select Number of Rooms --</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <!-- Add more room options as needed -->
                </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="rent">Rent:</label>
                  <input type="text" id="rent" name="rent" class="form-control">
                </div>
                <div class="form-group col-md-3">
                  <label for="ownerName">Owner Name:</label>
                  <input type="text" id="ownerName" name="ownerName" class="form-control">
                </div>
                <div class="form-group col-md-3">
                  <label for="ownerPhone">Owner Phone:</label>
                  <input type="text" id="ownerPhone" name="ownerPhone" class="form-control">
                </div>
              </div>
              <div class="form-group col-3">
                <button type="button" id="newProperty-select" class="btn btn-primary btn-block">Add</button>
              </div>
              <br>
            </form>
          </div>
        </div>
        <div id="newProperty-results" class="container"></div>
      </div>
    </div>
  </div>
  
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"  crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
   <script>
    // Wait for the document to be ready
    $(document).ready(function() {
      
    
    $('#newProperty-select').click(function() {
      var name = $('#ownerName').val();
      var phone = $('#ownerPhone').val();
      var street = $('#street').val();
      var city = $('#city').val();
      var zip = $('#zipcode').val();
      var rent = $('#rent').val();
      var room = $('#rooms').val();
      var number = $('#rpNumber').val();
     
      // Make an AJAX request to fetch the expiring properties
      $.ajax({
        type: 'POST',
        url: 'addProperty.php',
        data: { branch: selectedBranch },
        dataType: 'html',
        success: function(response) {
          // Display the expiring properties in the designated div
          $('#newProperty-results').html(response);
        },
        error: function() {
          alert('An error occurred while fetching the expiring properties.');
        }
      });
    });
});
  </script>
</body>

</html>