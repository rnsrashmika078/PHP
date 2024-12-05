<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
// Database credentials


include('../config.php');
// Your MySQL password

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
    $device_category = $_POST['device_category'];
    $person = $_POST['person'];
    $network_connectivity = $_POST['network_connectivity'];
    $printer_connectivity = $_POST['printer_connectivity'];
    $virus_guard = $_POST['virus_guard'];
    $ip_address = $_POST['ip_address'];
    $branch = $_POST['branch'];
   
    // Insert into the database
    $stmt = $pdo->prepare("INSERT INTO network(device_category,person,network_connectivity,printer_connectivity,virus_guard,ip_address,branch) 
                           VALUES (?, ?, ?, ?, ?,?,?)");
    $stmt->execute([$device_category, $person,$network_connectivity,$printer_connectivity,$virus_guard,$ip_address,$branch]);

    // Get the ID of the last inserted row
    $lastId = $pdo->lastInsertId();

    // Return the new ID to the front end
    echo json_encode(['id' => $lastId]);
}
?>
