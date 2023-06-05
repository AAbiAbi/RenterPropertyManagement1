
    // Wait for the document to be ready
    $(document).ready(function() {
      // Function to populate the dropdown list
      function populateDropdown() {
        $.ajax({
          type: 'GET',
          url: 'procBranchSelection.php',
          dataType: 'text',
          success: function(response) {
            // console.log(response);
            // alert("Hello",response);
            // Handle the response and populate the dropdown options
            var options = response.split('\n');
            // print options;
            // After appending the options in the success callback
            console.log(options);

            var select = $('#branch');
            var select1 = $('#branchNo');
            // Clear existing options
            select.empty();
            select1.empty();

            // Append new options
            $.each(options, function(index, option) {
              if (option !== '') {
                select.append($('<option>').val(option).text(option));
                select1.append($('<option>').val(option).text(option));
              }
            });

            // Set the selected value if available
            // var selectedValue = response.selected;
            // if (selectedValue) {
            //   select.val(selectedValue);
            // }
            }
        });
    }

      // Call the function to populate the dropdown when the page loads
        populateDropdown();
      
   
        $('form').on('submit', function(e) {
            var selectedBranch = $('#branch').val();
            $('#branchNumber').val(selectedBranch);
            // Display the value in the console
            console.log("branchnumber".selectedBranch);

            // Submit the form
            this.submit();
        });
    });

    

  