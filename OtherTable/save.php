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
    $branch = $_POST['branch'];
    $device = $_POST['device'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $s_no = $_POST['s_no'];
    // Insert into the database
    $stmt = $pdo->prepare("INSERT INTO other(branch,device, make, model,s_no) 
                           VALUES (?, ?, ?, ?,?)");
    $stmt->execute([$branch,$device,$make,$model,$s_no]);

    // Get the ID of the last inserted row
    $lastId = $pdo->lastInsertId();

    // Return the new ID to the front end
    echo json_encode(['id' => $lastId]);
}
?>
