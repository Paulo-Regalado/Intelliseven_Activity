<?php
include_once '../php/config.php';
// Create a connection to the database
$conn = OpenCon();

$username = $_POST['username'];
$password = $_POST['password'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO user (username, password) VALUES (?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hashedPassword);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'User registered']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to register user']);
}


?>