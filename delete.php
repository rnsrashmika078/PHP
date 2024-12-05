<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");


include('./config.php');   


// $host = 'localhost';
// $dbname = 'test';
// $username = 'root'; // Your MySQL username
// $password = ''; // Your MySQL password
// Create connection

try {
    $pdo = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE); // Parse DELETE parameters
    $id = $_DELETE['id'] ?? null; // Get the id passed from front-end

    if ($id) {
        $stmt = $pdo->prepare("DELETE FROM devices WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Row deleted successfully.";
        } else {
            echo "Error deleting row.";
        }
    } else {
        echo "ID not provided.";
    }
}
?>
