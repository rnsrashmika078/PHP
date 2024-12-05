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
    $Section = $_POST['Section'];
    $Regional_Manager = $_POST['Regional_Manager'];
    $Regional_Engineer = $_POST['Regional_Engineer'];
    $Account_Section = $_POST['Account_Section'];
    $Commercial_Section = $_POST['Commercial_Section'];
    $Human_Resources = $_POST['Human_Resources'];
    $Sociologist = $_POST['Sociologist'];
    $Workshop = $_POST['Workshop'];
    $IT_Branch = $_POST['IT_Branch'];
    $OM = $_POST['OM'];
    $Audit_Branch = $_POST['Audit_Branch'];
    $Laboratory = $_POST['Laboratory'];
    $Total = $_POST['Total'];
    

    // Insert into the database
    $stmt = $pdo->prepare("INSERT INTO summary (Section, Regional_Manager, Regional_Engineer,Account_Section, Commercial_Section,Human_Resources,Sociologist,Workshop,IT_Branch,OM,Audit_Branch,Laboratory,Total) 
                           VALUES (?, ?, ?, ?, ?,?,?,?,?,?,?,?,?)");
    $stmt->execute([$Section, $Regional_Manager, $Regional_Engineer,$Account_Section, $Commercial_Section,$Human_Resources,$Sociologist, $Workshop,$IT_Branch,$OM,$Audit_Branch,$Laboratory,$Total]);

    // Get the ID of the last inserted row
    $lastId = $pdo->lastInsertId();

    // Return the new ID to the front end
    echo json_encode(['id' => $lastId]);
}
?>
