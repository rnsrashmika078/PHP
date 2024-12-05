<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");// Database credentials



include('../config.php');

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
    $serial_no = $_POST['serial_no'];
    $rvpn_user = $_POST['rvpn_user'];
    $employee_no = $_POST['employee_no'];
    $designation = $_POST['designation'];
    $working_location = $_POST['working_location'];
    $code = $_POST['code'];
    $serial_no_RVPN = $_POST['serial_no_RVPN'];
    $rvpn_username = $_POST['rvpn_username'];
    $connection_required = $_POST['connection_required'];
    $branch = $_POST['branch'];


    // Insert into the database
    $stmt = $pdo->prepare("INSERT INTO hardwareother (serial_no, rvpn_user, employee_no, designation,working_location,code,serial_no_RVPN,rvpn_username,connection_required,branch) 
                           VALUES (?, ?, ?, ?,?, ?, ?, ?,?,?)");
    $stmt->execute([$serial_no, $rvpn_user,  $employee_no,$designation,$working_location,$code,$serial_no_RVPN,$rvpn_username,$connection_required,$branch]);

    // Get the ID of the last inserted row
    $lastId = $pdo->lastInsertId();

    // Return the new ID to the front end
    echo json_encode(['id' => $lastId]);
}
?>
