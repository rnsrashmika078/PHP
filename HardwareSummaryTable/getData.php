<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header('Content-Type: application/json');

include('../config.php');

$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from your table
$sql = "SELECT * FROM summary";  // Replace with your actual table name (e.g., "ups_table")
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    // Output each row as an associative array
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            $row['Id'],  // Assuming 'id' is the first column in your database
            $row['Section'],
            $row['Regional_Manager'],
            $row['Regional_Engineer'],
            $row['Account_Section'],
            $row['Commercial_Section'], // Assuming there is a section column in your table
            $row['Human_Resources'],
            $row['Sociologist'],
            $row['Workshop'],
            $row['IT_Branch'],
            $row['OM'],
            $row['Audit_Branch'],
            $row['Laboratory'],
        ];
    }
}

echo json_encode($data);

$conn->close();

?>
