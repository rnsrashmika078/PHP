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

// SQL query to fetch data from your table
$sql = "SELECT * FROM network";  // Replace with your actual table name (e.g., "ups_table")
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    // Output each row as an associative array
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            $row['id'],
            $row['device_category'],
            $row['person'],
            $row['network_connectivity'],
            $row['printer_connectivity'],
            $row['virus_guard'],
            $row['ip_address'],
            $row['branch'],
        ];
    }
} 
echo json_encode($data);

?>
