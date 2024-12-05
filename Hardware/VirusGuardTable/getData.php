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
$sql = "SELECT * FROM virusguard";  // Replace with your actual table name (e.g., "ups_table")
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    // Output each row as an associative array
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            $row['id'],
            $row['AssetID'],  // Assuming 'id' is the first column in your database
            $row['VirusGuardKeyType'],
            $row['InstalledDate'],
            $row['ValidDays'],
            $row['ValidTill'],
            $row['InstalledStatus'] ,
            $row['Branch'],  // Assuming 'id' is the first column in your database
           
        
        ];
    }
} 

echo json_encode($data);

$conn->close();
?>
