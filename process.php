<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Full_Name = $_POST['Full_Name'] ?? '';
    $Email = $_POST['Email'] ?? '';
    $Phone = $_POST['Phone'] ?? '';
    $DOB = $_POST['DOB'] ?? '';
    $Gender = $_POST['Gender'] ?? '';
    $Address = $_POST['Address'] ?? '';

    // Log the received data for debugging
    error_log(print_r($_POST, true));

    // Prepare the result HTML
    $resultHtml = "<div class='result-message'>";
    $resultHtml .= "<h2>Form submitted successfully by $Full_Name.</h2>";
    $resultHtml .= "<p><strong>Details:</strong></p>";
    $resultHtml .= "<ul>";
    $resultHtml .= "<li><strong>Full Name:</strong> $Full_Name</li>";
    $resultHtml .= "<li><strong>Email:</strong> $Email</li>";
    $resultHtml .= "<li><strong>Phone:</strong> $Phone</li>";
    $resultHtml .= "<li><strong>DOB:</strong> $DOB</li>";
    $resultHtml .= "<li><strong>Gender:</strong> $Gender</li>";
    $resultHtml .= "<li><strong>Address:</strong> $Address</li>";
    $resultHtml .= "</ul>";
    $resultHtml .= "</div>";

    // Example of further processing
    if (!empty($Full_Name) && !empty($Email)) {
        echo $resultHtml; // Return the styled HTML
    } else {
        echo "<p>Please fill in all fields.</p>";
    }
} else {
    echo "<p>Invalid request method.</p>";
}
?>
