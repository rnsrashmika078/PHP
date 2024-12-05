<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");


include('../config.php');
try {
    $pdo = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["error" => "Connection failed: " . $e->getMessage()]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE); // Parse DELETE parameters
    $id = $_DELETE['id'] ?? null; // Get the id passed from front-end

    if ($id) {
        $stmt = $pdo->prepare("DELETE FROM virusguard WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Row deleted successfully."]);
        } else {
            echo json_encode(["error" => "Error deleting row."]);
        }
    } else {
        echo json_encode(["error" => "ID not provided."]);
    }
}
?>
