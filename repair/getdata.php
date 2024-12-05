<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header('Content-Type: application/json');

// Database credentials

include('../config.php');
// Create connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from your table
$sql = "SELECT * FROM repair";  // Replace with your actual table name
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    // Output each row as an associative array
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            $row['id'],  // Assuming id is the first column in your database
            $row['person'], 
            $row['device_type'],
            $row['repair'],
            $row['repaired_date'], 
            $row['section']
        ];
    }
}

echo json_encode($data);

$conn->close();

?>
