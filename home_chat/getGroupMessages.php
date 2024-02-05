<?php

include_once '../php/config.php';

$conn = OpenCon();


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['group_id'])) {
    // Sanitize and get the group_id from the POST request
    $group_id = filter_var($_POST['group_id'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare the SQL statement
    $sql = "SELECT message_id, message, member_id FROM messages WHERE group_chat_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $group_id);
    $stmt->execute();

    $result = $stmt->get_result();

    // Fetch all the results
    $messages = $result->fetch_all(MYSQLI_ASSOC);

    // Output the messages as JSON
    header('Content-Type: application/json');
    echo json_encode($messages);

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If group_id is not provided, return an error response
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Missing group_id parameter']);
}

?>