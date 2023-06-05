$(document).ready(function() {
    $('#expiringSoonButton').click(function() {
      // Make an AJAX request to fetch the expiring properties
      $.ajax({
        type: 'POST',
        url: 'expiringProperties.php',
        dataType: 'html',
        success: function(response) {
          // Display the expiring properties in the designated div
          $('#expiringSoonList').html(response);
        },
        error: function() {
          alert('An error occurred while fetching the expiring properties.');
        }
      });
    });
  });
  