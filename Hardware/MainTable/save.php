<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");// Database credentials


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
    $Person = $_POST['Person'];
    $DeviceType = $_POST['DeviceType'];
    $OperatingSystem = $_POST['OperatingSystem'];
    $Processor = $_POST['Processor'];
    $RAM = $_POST['RAM'];
    $HardDiskCapacity = $_POST['HardDiskCapacity'];
    $KeyboardStatus = $_POST['KeyboardStatus'];
    $MouseStatus = $_POST['MouseStatus'];
    $NetworkConnectivity = $_POST['NetworkConnectivity'];
    $PrinterConnectivity = $_POST['PrinterConnectivity'];
    $VirusGuard = $_POST['VirusGuard'];
    $IPAddress = $_POST['IPAddress'];
    $Monitor = $_POST['Monitor'];
    $CPU = $_POST['CPU'];
    $Laptop = $_POST['Laptop'];
    $PurchaseDate = $_POST['PurchaseDate'];
    $Branch = $_POST['Branch'];
   
    // Insert into the database
    $stmt = $pdo->prepare("INSERT INTO hardwaremain (Person, DeviceType, OperatingSystem, Processor,RAM,HardDiskCapacity,KeyboardStatus,MouseStatus,NetworkConnectivity,PrinterConnectivity,VirusGuard,IPAddress,Monitor,CPU,Laptop,PurchaseDate,Branch) 
                           VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->execute([$Person, $DeviceType, $OperatingSystem, $Processor,$RAM,$HardDiskCapacity, $KeyboardStatus, $MouseStatus, $NetworkConnectivity,$PrinterConnectivity,$VirusGuard,$IPAddress,$Monitor, $CPU, $Laptop,$PurchaseDate,$Branch]);

    // Get the ID of the last inserted row
    $lastId = $pdo->lastInsertId();

    // Return the new ID to the front end
    echo json_encode(['id' => $lastId]);
}
?>
