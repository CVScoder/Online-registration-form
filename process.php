<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set the content type to JSON
header('Content-Type: application/json');

// Capture any output before our intended JSON response
ob_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = $_POST['fullName'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $address = $_POST['address'] ?? '';

    // Debugging: Log the received POST data
    error_log(print_r($_POST, true)); // This will log the POST data to the server's error log

    if (empty($fullName) || empty($email) || empty($phone) || empty($dob) || empty($gender) || empty($address)) {
        $response = ['success' => false, 'message' => 'All fields are required'];
    } else {
        $html = "
            <h2>Registration Successful</h2>
            <p><strong>Full Name:</strong> " . htmlspecialchars($fullName) . "</p>
            <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
            <p><strong>Phone:</strong> " . htmlspecialchars($phone) . "</p>
            <p><strong>Date of Birth:</strong> " . htmlspecialchars($dob) . "</p>
            <p><strong>Gender:</strong> " . htmlspecialchars($gender) . "</p>
            <p><strong>Address:</strong> " . htmlspecialchars($address) . "</p>
        ";

        $response = ['success' => true, 'html' => $html];
    }
} else {
    $response = ['success' => false, 'message' => 'Invalid request method'];
}

// Capture any unexpected output
$output = ob_get_clean();

if (!empty($output)) {
    $response = ['success' => false, 'message' => 'Unexpected output: ' . $output];
}

// Encode the response as JSON
echo json_encode($response);
