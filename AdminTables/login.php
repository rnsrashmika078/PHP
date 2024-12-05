<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Content-Type");


include('../config.php');



// Create the database connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed.']));
}

// Initialize the response array
$response = array('success' => false, 'message' => '');

// Get the raw POST data
$data = json_decode(file_get_contents('php://input'), true);

// Check if email and password are provided in the request
if (isset($data['email']) && isset($data['password'])) {
    $email = $data['email'];
    $password = $data['password'];

    // Validate inputs
    if (empty($email) || empty($password)) {
        $response['message'] = 'Both email and password are required!';
        echo json_encode($response);
        exit();
    }

    // Prepare the SQL query to check if the email exists
    $query = "SELECT * FROM adm WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $email, $password);  // 'ss' means both are strings
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($stmt === false) {
        die(json_encode(['success' => false, 'message' => 'Failed to prepare the query.']));
    }
    // Check if the email and password match
    if ($result->num_rows > 0) {
        // Login successful
        $response['success'] = true;
        $response['message'] = 'Login successful!';
    } else {
        // No match found
        $response['message'] = 'Incorrect email or password!';
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Return the response in JSON format
    echo json_encode($response);
} else {
    // If email and password are not provided
    $response['message'] = 'Both email and password are required!';
    echo json_encode($response);
}
?>
