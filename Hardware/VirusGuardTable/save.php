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
    $asset_id = $_POST['asset_id'];
    $virusguard_key = $_POST['virusguard_key'];
    $installed_date = $_POST['installed_date'];
    $valid_days = $_POST['valid_days'];
    $valid_till = $_POST['valid_till'];
    $installed_status = $_POST['installed_status'];
    $branch = $_POST['branch'];
  
   
    // Insert into the database
    $stmt = $pdo->prepare("INSERT INTO virusguard (AssetId, VirusGuardKeyType, InstalledDate, ValidDays,ValidTill,InstalledStatus,Branch)
                           VALUES (?, ?, ?, ?, ?,?,?)");
    $stmt->execute([$asset_id, $virusguard_key, $installed_date, $valid_days,$valid_till,$installed_status, $branch]);

    // Get the ID of the last inserted row
    $lastId = $pdo->lastInsertId();

    // Return the new ID to the front end
    echo json_encode(['id' => $lastId]);
}
?>
