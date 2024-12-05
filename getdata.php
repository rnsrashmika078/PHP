<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header('Content-Type: application/json');


include('./config.php');   

$conn = new mysqli($server, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// SQL query to fetch data from your table
$sql = "SELECT * FROM devices";  // Replace with your actual table name
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            $row['id'],

            
            $row['person'],
            $row['device_type'],
            $row['os'],
            $row['processor'],
            $row['ram'],
            $row['hard_drive_capacity'],
            $row['keyboard_status'],
            $row['mouse_status'],
            $row['network_connectivity'],
            $row['printer_connectivity'],
            $row['virus_guard'],
            $row['ip_address'],
            $row['monitor'],
            $row['cpu'],
            $row['laptop'],
            $row['purchase_date'],
            $row['section']
        ];
    }
}
echo json_encode($data);

$conn->close();

// Return the data as JSON

?>
