<?php

include_once '../php/config.php';

$conn = OpenCon();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['group_chat_id'])) {
    // Sanitize input
    $group_chat_id = $_POST['group_chat_id'];

    // Prepare the SQL statement to delete messages associated with the provided group chat ID
    $sql = "DELETE FROM group_chat WHERE group_chat_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $group_chat_id);
    $stmt->execute();

    // Check if any rows were affected
    if ($stmt->affected_rows > 0) {
        echo json_encode(['message' => 'Messages deleted successfully']);
    } else {
        echo json_encode(['message' => 'No messages found for the provided group chat ID']);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If group_chat_id is not provided, return an error response
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Missing group_chat_id parameter']);
}

?>