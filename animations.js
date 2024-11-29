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

        // Serialize form data
        let formData = $(this).serializeArray();

        // Send form data to PHP for validation
        $.post('process.php', formData, function(response) {
            // Display the result with animation
            $('#resultHtml').html(response).removeClass('hidden').addClass('visible');

            // Animate the result display
            $('#resultHtml').hide().fadeIn(1000); // Fade in effect for the result

            // Reset the form
            $('#registrationForm')[0].reset();
        });
    });
});

