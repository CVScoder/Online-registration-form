$(document).ready(function() {
    $('#registrationForm').on('submit', function(e) {
        e.preventDefault();

        // Get form values
        var fullName = $('#fullName').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var dob = $('#dob').val();
        var gender = $('#gender').val();
        var address = $('#address').val();

        // Validate form (you can add more complex validation if needed)
        if (!fullName || !email || !phone || !dob || !gender || !address) {
            alert('All fields are required');
            return;
        }

        // Send form data to the server using AJAX
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8000/process.php',
            data: {
                'Full Name': fullName,
                'Email': email,
                'Phone': phone,
                'DOB': dob,
                'Gender': gender,
                'Address': address
            },
            success: function(response) {
                // Check if the response is successful
                if (response.success) {
                    // Display the result HTML returned from the server
                    $('#result').html(response.html).removeClass('hidden');
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert('An error occurred while processing your request.');
            }
        });

        // Reset the form
        this.reset();
    });

    // Helper function to escape HTML (prevent XSS)
    function escapeHtml(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }
});

