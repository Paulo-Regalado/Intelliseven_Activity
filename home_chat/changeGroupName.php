<?php
include_once '../php/config.php';

$conn = OpenCon();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if group_chat_id is provided
if (!isset($_POST['group_chat_id'])) {
    // If group_chat_id is not provided, return an error response
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Missing group_chat_id parameter']);
    exit(); // Terminate the script
}

$group_chat_id = $_POST['group_chat_id'];
$new_group_name = $_POST['group_name'];

// Prepare the SQL statement to update the group name
$sql = "UPDATE group_chat SET group_name = ? WHERE group_chat_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('si', $new_group_name, $group_chat_id);
$result = $stmt->execute();

if ($result) {
    // Group name updated successfully
    echo json_encode(['success' => true]);

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Failed to update group name
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode(['error' => 'Failed to update group name']);
}

?>