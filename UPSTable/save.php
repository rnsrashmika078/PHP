<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
// Database credentials
// Database credentials
include('../config.php');   

// Create connection

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
    $person = $_POST['person'];
    // Get data from the front end
    $ups_model = $_POST['ups_model'];
    $company_name = $_POST['company_name'];
    $other_details = $_POST['other_details'];
    $section = $_POST['section'];
    // Insert into the database
    $stmt = $pdo->prepare("INSERT INTO ups (person,ups_model, company_name, other_details,section) 
                           VALUES (?,?, ?, ?, ?)");
    $stmt->execute([$person,$ups_model, $company_name, $other_details,$section]);

    // Get the ID of the last inserted row
    $lastId = $pdo->lastInsertId();

    // Return the new ID to the front end
    echo json_encode(['id' => $lastId]);
}
?>
