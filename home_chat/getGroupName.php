<?php

include_once '../php/config.php';

$conn = OpenCon();


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT gc.group_chat_id, gc.group_name, m.message, m.time
FROM group_chat gc
LEFT JOIN (
    SELECT group_chat_id, MAX(time) AS latest_timestamp
    FROM messages
    GROUP BY group_chat_id
) latest_msg ON gc.group_chat_id = latest_msg.group_chat_id
LEFT JOIN messages m ON latest_msg.group_chat_id = m.group_chat_id AND latest_msg.latest_timestamp = m.time
ORDER BY latest_msg.latest_timestamp DESC;
";

$result = $conn->prepare($sql);
$result->execute();
$result = $result->get_result();

if ($result->num_rows > 0) {

    $groupNames = array();
    while ($row = $result->fetch_assoc()) {
        $groupNames[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($groupNames);
} else {

    echo json_encode(array());
}

// Close the database connection
$conn->close();

?>