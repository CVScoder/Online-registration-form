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
    $resultHtml = "
    <style>
        .result-message {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            font-family: Arial, sans-serif;
        }
        .result-message h2 {
            color: #28a745;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .result-message ul {
            list-style: none;
            padding: 0;
        }
        .result-message li {
            padding: 10px 0;
            border-bottom: 1px solid #dee2e6;
        }
        .result-message li:last-child {
            border-bottom: none;
        }
        .result-message strong {
            color: #495057;
            display: inline-block;
            width: 100px;
        }
    </style>
    <div class='result-message'>
        <h2>Form submitted successfully by $Full_Name.</h2>
        <p><strong>Details:</strong></p>
        <ul>
            <li><strong>Full Name:</strong> $Full_Name</li>
            <li><strong>Email:</strong> $Email</li>
            <li><strong>Phone:</strong> $Phone</li>
            <li><strong>DOB:</strong> $DOB</li>
            <li><strong>Gender:</strong> $Gender</li>
            <li><strong>Address:</strong> $Address</li>
        </ul>
    </div>";
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
