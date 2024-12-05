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

// Array of section names
$sections = [
    'Manager', 'Engineer', 'Account', 'Commercial', 
    'Supply', 'HR', 'Sociologist', 'Workshop', 
    'IT', 'Reception', 'OM', 'Audit', 'LAB'
];

// Array to store the results
$data = [];

// Loop through each section to get the counts for the 'Server' device type
foreach ($sections as $section) {
    // $sql = "SELECT COUNT(*) as count FROM printers WHERE model = 'Line Printer' AND seciton = '$section'";
    $sql = "SELECT COUNT(*) as count FROM other WHERE device = 'TV' AND branch = '$section'";

    $result = $conn->query($sql);

    // Check if there is a result and assign the count, otherwise assign 0
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $data[strtolower(str_replace(' ', '', $section)) . 'ServerCount'] = $row['count'];
    } else {
        $data[strtolower(str_replace(' ', '', $section)) . 'ServerCount'] = 0;
    }
}

// Return the counts as JSON
echo json_encode($data);

$conn->close();
?>
