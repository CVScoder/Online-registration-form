$(document).ready(function() {
    // Fade in form groups one by one
    $('.form-group').each(function(index) {
        $(this).delay(100 * index).queue(function() {
            $(this).addClass('visible').dequeue();
        });
    });

    // Add hover effect to input fields
    $('input, select, textarea').hover(
        function() { $(this).css('transform', 'scale(1.05)'); },
        function() { $(this).css('transform', 'scale(1)'); }
    );

    // Add typing effect to the h1
    const text = $('h1').text();
    $('h1').text('');
    for (let i = 0; i < text.length; i++) {
        setTimeout(() => {
            $('h1').text($('h1').text() + text[i]);
        }, 100 * i);
    }

    // Animate the submit button on hover
    $('button').hover(
        function() { $(this).css('background', 'linear-gradient(45deg, #8e44ad, #3498db)'); },
        function() { $(this).css('background', 'linear-gradient(45deg, #3498db, #8e44ad)'); }
    );
});

// Update the existing script.js to include animation for the result
$(document).ready(function() {
    $('#registrationForm').on('submit', function(e) {
        e.preventDefault();

        // Define resultHtml here
        let formData = $(this).serializeArray(); // Get form data
        let resultHtml = '<p>Your form has been submitted successfully!</p>'; // Example content

        // Append form details to resultHtml
        formData.forEach(function(item) {
            resultHtml += `<p>${item.name}: ${item.value}</p>`; // Display each form field
        });

        // ... (existing form handling code) ...

        // Send form data to PHP for validation
        $.post('process.php', formData, function(response) {
            console.log(response); // Log the response for debugging
            if (response.success) { // Check if PHP confirms all fields are filled
                // Display the result with animation
                $('#result').html(resultHtml).removeClass('hidden').addClass('visible');

                // Scroll to the result
                $('html, body').animate({
                    scrollTop: $('#result').offset().top
                }, 1000);
            } else {
                // Handle the error case (e.g., show an error message)
                $('#result').html('<p>Please fill in all fields.</p>').removeClass('hidden').addClass('visible');
            }
        }, 'json');

        // Reset the form
        this.reset();
    });

    // ... (existing escapeHtml function) ...
});

