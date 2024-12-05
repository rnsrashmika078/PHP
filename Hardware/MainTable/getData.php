<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header('Content-Type: application/json');

include('../config.php');

// Create the database connection
$conn = new mysqli($server, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from your table
$sql = "SELECT * FROM hardwaremain";  // Replace with your actual table name (e.g., "ups_table")
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    // Output each row as an associative array
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            $row['id'],
            $row['Person'],  // Assuming 'id' is the first column in your database
            $row['DeviceType'],
            $row['OperatingSystem'],
            $row['Processor'],
            $row['RAM'],
            $row['HardDiskCapacity'] ,
            $row['KeyboardStatus'],  // Assuming 'id' is the first column in your database
            $row['MouseStatus'],
            $row['NetworkConnectivity'],
            $row['PrinterConnectivity'],
            $row['VirusGuard'],
            $row['IPAddress'],
            $row['Monitor'],
            $row['CPU'],
            $row['Laptop'],
            $row['PurchaseDate'],
            $row['Branch'],
        ];
    }
} 
echo json_encode($data);

$conn->close();


?>
