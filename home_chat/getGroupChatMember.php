<?php

include_once '../php/config.php';

$conn = OpenCon();
header('Content-Type: application/json');

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

// Prepare the SQL statement to select the last two profile pictures associated with the provided group chat ID
$sql = "SELECT member_name, nickname, profile_pic  FROM group_member_table WHERE group_chat_id = ? ORDER BY group_chat_id";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $group_chat_id);
$stmt->execute();

// Bind the result variables
$stmt->bind_result($member_name, $nickname, $profile_pic);

// Fetch and store the results
$members = array();
while ($stmt->fetch()) {
    // Create an associative array for each member
    $member = array(
        'member_name' => $member_name,
        'nickname' => $nickname,
        'profile_pic' => $profile_pic
    );
    $members[] = $member;
}

// Check if any profiles were found
if (!empty($members)) {
    echo json_encode(['members' => $members]);
} else {
    echo json_encode(['message' => 'No profiles found for the provided group chat ID']);
}

// Close the statement and connection
$stmt->close();
$conn->close();

?>