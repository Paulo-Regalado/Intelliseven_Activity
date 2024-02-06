<?php

include_once '../php/config.php';

$conn = OpenCon();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['message'])) {

    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    $group_chat_id = 1;
    $group_member_id = 1;
    date_default_timezone_set('Asia/Manila');
    $time = date('Y-m-d H:i:s');

    // Prepare the SQL statement with a JOIN clause
    $sql = "INSERT INTO messages (message, group_chat_id, group_member_id,time) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('siis', $message, $group_chat_id, $group_member_id, $time);
    $stmt->execute();


    echo json_encode(['message' => 'Message sent']);


    // Output the messages as JSON
    header('Content-Type: application/json');

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If group_id is not provided, return an error response
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Missing group_id parameter']);
}

?>