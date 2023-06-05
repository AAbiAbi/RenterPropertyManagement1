$(document).ready(function() {
    // Handle form submission
    populateCityDropdown();
    populateTownDropdown();
  
    $('#propertySearchForm').submit(function(e) {
      e.preventDefault();
  
      // Retrieve the form input values
      var city = $('#city').val();
      var rooms = $('#rooms').val();
      var minRent = $('#minRent').val();
      var maxRent = $('#maxRent').val();
  
      // Make an AJAX request to fetch the property listing based on the input criteria
      $.ajax({
        type: 'GET',
        url: 'property_listing.php',
        data: {
          city: city,
          rooms: rooms,
          minRent: minRent,
          maxRent: maxRent
        },
        dataType: 'html',
        success: function(response) {
          // Display the property listing in the designated div
          $('#propertyList').html(response);
        },
        error: function() {
          alert('An error occurred while fetching the property listing.');
        }
      });
    });
  
    $('#averageRentForm').submit(function(e) {
      e.preventDefault();
  
      // Retrieve the selected town
      var town = $('#town').val();
  
      // Make an AJAX request to calculate the average rent
      $.ajax({
        type: 'POST',
        url: 'averageRent.php',
        data: {
          town: town
        },
        dataType: 'text',
        success: function(response) {
          // Display the average rent on the page
          $('#averageRentResult').text('Average Rent for ' + town + ': $' + response);
        },
        error: function() {
          alert('An error occurred while calculating the average rent.');
        }
      });
    });
  
    function populateCityDropdown() {
      $.ajax({
        type: 'GET',
        url: 'procCitySelection.php',
        dataType: 'text',
        success: function(response) {
          var options = response.split('\n');
          var select = $('#city');
  
          // Clear existing options
          select.empty();
  
          // Create an array to store unique options
          var uniqueOptions = [];
  
          // Append new options
          $.each(options, function(index, option) {
            if (option !== '' && !uniqueOptions.includes(option)) {
              uniqueOptions.push(option);
              select.append($('<option>').val(option).text(option));
            }
          });
        }
      });
    }
  
    function populateTownDropdown() {
      $.ajax({
        type: 'GET',
        url: 'procTownSelection.php',
        dataType: 'json',
        success: function(response) {
          var options = response.options;
          var selected = response.selected;
          var select = $('#town');
  
          // Clear existing options
          select.empty();
  
          // Append new options
          $.each(options, function(index, option) {
            if (option !== '') {
              select.append($('<option>').val(option).text(option));
            }
          });
  
          // Set the selected value if available
          if (selected) {
            select.val(selected);
          }
        }
      });
    }
  });
  