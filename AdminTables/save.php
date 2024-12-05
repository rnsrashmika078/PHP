<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Content-Type");

include('../config.php');
// Create the database connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die(json_encode(array("error" => "Connection failed: " . $conn->connect_error)));
}

// Get the JSON input from React
$data = json_decode(file_get_contents("php://input"));

$email = $data->email;
$password = $data->password;
$adminCode = $data->adminCode;

// Insert the data into the database
$sql = "INSERT INTO adm (email, password, admin_code) VALUES ('$email', '$password', '$adminCode')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("message" => "Admin created successfully!"));
} else {
    echo json_encode(array("error" => "Error: " . $conn->error));
}

$conn->close();
?>
