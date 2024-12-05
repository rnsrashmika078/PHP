<?php
// Assuming you're using MySQLi or PDO for database connection
$server = "192.168.0.100"; 
$username = "officeda_latest";    
$password = "Ws2jY2XGF5xcEAun2zSE";        
$dbname = "officeda_latest"; 

// Create a connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from POST request
$id = $_POST['id'];
$device_type = $_POST['device_type'];
$os = $_POST['os'];
$processor = $_POST['processor'];
$ram = $_POST['ram'];
$hard_drive_capacity = $_POST['hard_drive_capacity'];
$keyboard_status = $_POST['keyboard_status'];
$mouse_status = $_POST['mouse_status'];
$network_connectivity = $_POST['network_connectivity'];
$printer_connectivity = $_POST['printer_connectivity'];
$virus_guard = $_POST['virus_guard'];
$monitor = $_POST['monitor'];
$laptop = $_POST['laptop'];
$purchase_date = $_POST['purchase_date'];
$repair = $_POST['repair'];
$section = $_POST['section'];

// Prepare an UPDATE SQL query
$query = "UPDATE devices SET 
    device_type = ?, 
    os = ?, 
    processor = ?, 
    ram = ?, 
    hard_drive_capacity = ?, 
    keyboard_status = ?, 
    mouse_status = ?, 
    network_connectivity = ?, 
    printer_connectivity = ?, 
    virus_guard = ?, 
    monitor = ?, 
    laptop = ?, 
    purchase_date = ?, 
    repair = ?, 
    section = ? 
WHERE id = ?";

// Prepare statement
$stmt = $conn->prepare($query);

// Bind parameters to the SQL query
$stmt->bind_param('sssssssssssssssi', $device_type, $os, $processor, $ram, $hard_drive_capacity, $keyboard_status, $mouse_status, $network_connectivity, $printer_connectivity, $virus_guard, $monitor, $laptop, $purchase_date, $repair, $section, $id);

// Execute the query
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'id' => $id]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update data']);
}

// Close connection
$stmt->close();
$conn->close();
?>
