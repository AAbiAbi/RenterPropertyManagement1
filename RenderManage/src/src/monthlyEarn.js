$(document).ready(function() {
    $('#calculateEarningsButton').click(function() {
      $.ajax({
        type: 'GET',
        url: 'calculateEarnings.php',
        dataType: 'html',
        success: function(response) {
          $('#earnings').html('Monthly Earnings: $' + response);
        },
        error: function() {
          alert('An error occurred while calculating the earnings.');
        }
      });
    });
  });