<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");// Database credentials
include('./config.php');   

// $host = 'localhost';
// $dbname = 'test';
// $username = 'root'; // Your MySQL username
// $password = ''; // Your MySQL password
// // Create a PDO instance
try {
    $pdo = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// Check if the data is received from POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the front end
    $device_type = $_POST['device_type'];
    $person = $_POST['person'];
    $os = $_POST['os'];
    $processor = $_POST['processor'];
    $ram = $_POST['ram'];
    $hard_drive_capacity = $_POST['hard_drive_capacity'];
    $keyboard_status = $_POST['keyboard_status'];
    $mouse_status = $_POST['mouse_status'];
    $network_connectivity = $_POST['network_connectivity'];
    $printer_connectivity = $_POST['printer_connectivity'];
    $virus_guard = $_POST['virus_guard'];
    $ip_address = $_POST['ip_address'];
    $monitor = $_POST['monitor'];
    $cpu = $_POST['cpu'];
    $laptop = $_POST['laptop'];
    $purchase_date = $_POST['purchase_date'];
    $section = $_POST['section'];

    // Insert into the database
    $stmt = $pdo->prepare("INSERT INTO devices (person,device_type, os, processor, ram, hard_drive_capacity, keyboard_status, mouse_status, network_connectivity, printer_connectivity, virus_guard,ip_address, monitor,cpu, laptop, purchase_date,  section) 
                           VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");
    $stmt->execute([$person,$device_type, $os, $processor, $ram, $hard_drive_capacity, $keyboard_status, $mouse_status, $network_connectivity, $printer_connectivity, $virus_guard, $ip_address,$monitor,$cpu, $laptop, $purchase_date, $section]);

    // Get the ID of the last inserted row
    $lastId = $pdo->lastInsertId();

    // Return the new ID to the front end
    echo json_encode(['id' => $lastId]);
}

?>
