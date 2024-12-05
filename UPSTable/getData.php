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
$sql = "SELECT * FROM ups";  // Replace with your actual table name (e.g., "ups_table")
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    // Output each row as an associative array
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            $row['id'],  // Assuming 'id' is the first column in your database
            $row['person'],
            $row['ups_model'],
            $row['company_name'],
            $row['other_details'],
            $row['section']  // Assuming there is a section column in your table
        ];
    }
}

echo json_encode($data);

$conn->close();

?>
