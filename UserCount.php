<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header('Content-Type: application/json');

include('./config.php');

// Create connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the count of distinct emails in the 'adm' table
$sql = "SELECT COUNT(DISTINCT email) AS count FROM adm WHERE email != '' AND email IS NOT NULL";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$adminCount = $row['count'];

// Query to get the count of distinct emails in the 'user' table
$sql2 = "SELECT COUNT(DISTINCT email) AS count FROM user WHERE email != '' AND email IS NOT NULL";
$result2 = $conn->query($sql2); // Use $sql2 here
$row2 = $result2->fetch_assoc();
$userCount = $row2['count'];

// Combine the counts into an array and echo the JSON response
echo json_encode(['adminCount' => $adminCount, 'userCount' => $userCount]);

$conn->close();
?>
