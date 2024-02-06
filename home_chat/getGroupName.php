<?php

include_once '../php/config.php';

$conn = OpenCon();


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT group_chat_id, group_name FROM group_chat";
$result = $conn->prepare($sql);
$result->execute();
$result = $result->get_result();

if ($result->num_rows > 0) {

    $groupNames = array();
    while ($row = $result->fetch_assoc()) {
        $groupNames[] = $row;
    }


    echo json_encode($groupNames);
} else {

    echo json_encode(array());
}

// Close the database connection
$conn->close();

?>