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
$sql = "SELECT * FROM hardwareother";  // Assuming the table is named 'printers'
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    // Output each row as an associative array
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            $row['id'],              // Printer ID
            $row['serial_no'],          // Branch
            $row['rvpn_user'],    // Printer Name
            $row['employee_no'],           // Printer Model
            $row['designation'],   // Printer Serial Number
            $row['working_location'],              // Printer ID
            $row['code'],          // Branch
            $row['serial_no_RVPN'],    // Printer Name
            $row['rvpn_username'],           // Printer Model
            $row['connection_required'],  
            $row['branch'],   // Printer Serial Number
        ];
    }
}

echo json_encode($data);
$conn->close();

?>
