<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header('Content-Type: application/json');


include('../config.php');

// Create connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from the printers table
$sql = "SELECT * FROM hardwareprinters";  // Assuming the table is named 'printers'
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    // Output each row as an associative array
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            $row['id'],              // Printer ID
            $row['Branch'],          // Branch
            $row['Make'],    // Printer Name
            $row['Model'],           // Printer Model
            $row['SerialNumber'],   // Printer Serial Number
        ];
    }
} 
echo json_encode($data);


$conn->close();
?>