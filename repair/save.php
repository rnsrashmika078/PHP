<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
// Database credentials

include('../config.php');

// Create a PDO instance
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
    $person = $_POST['person'];
    $device_type = $_POST['device_type'];
    $repair = $_POST['repair'];
    $repaired_date = $_POST['repaired_date'];
    $section = $_POST['section'];

    // Insert into the database
    $stmt = $pdo->prepare("INSERT INTO repair(person,device_type, repair,repaired_date,section) 
                           VALUES (?,?,?,?,?)");
    $stmt->execute([$person,$device_type,$repair,$repaired_date,$section]);

    // Get the ID of the last inserted row
    $lastId = $pdo->lastInsertId();

    // Return the new ID to the front end
    echo json_encode(['id' => $lastId]);
}

?>
