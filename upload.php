<?php
// upload-json.php

header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data from the request body
    $jsonData = json_decode(file_get_contents('php://input'), true);

    // Check if the data is an array
    if (is_array($jsonData)) {
        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test"; // Replace with your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Loop through the array and insert each row into the database
        foreach ($jsonData as $row) {
            // Prepare and bind the SQL statement to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO devices (device_type, os, processor, ram, hard_drive_capacity, keyboard_status, mouse_status, network_connectivity, printer_connectivity, virus_guard, monitor, laptop, purchase_date, repair, section) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssssssss", 
                $row['device_type'], 
                $row['os'], 
                $row['processor'], 
                $row['ram'], 
                $row['hard_drive_capacity'], 
                $row['keyboard_status'], 
                $row['mouse_status'], 
                $row['network_connectivity'], 
                $row['printer_connectivity'], 
                $row['virus_guard'], 
                $row['monitor'], 
                $row['laptop'], 
                $row['purchase_date'], 
                $row['repair'], 
                $row['section']
            );

            // Execute the statement
            if (!$stmt->execute()) {
                echo json_encode(['error' => 'Failed to insert data']);
                $conn->close();
                exit;
            }
        }

        // Success response
        echo json_encode(['success' => 'Data added successfully']);
        
        // Close the connection
        $conn->close();
    } else {
        echo json_encode(['error' => 'Invalid JSON data']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
?>
