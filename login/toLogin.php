<?php

include_once '../php/config.php';
// Create a connection to the database
$conn = OpenCon();

// Set the content type to JSON before any output
header('Content-Type: application/json');

// Get user input
$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

// Validate input
if (empty($username) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
    exit();
}

// Check if the connection is successful
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

// Security: Use prepared statement to prevent SQL injection

// Check in admin_account table
$sqlAdmin = "SELECT * FROM user WHERE username = ?";
$stmtAdmin = $conn->prepare($sqlAdmin);

$stmtAdmin->bind_param("s", $username);
$stmtAdmin->execute();
$resultAdmin = $stmtAdmin->get_result();

if ($resultAdmin->num_rows > 0) {
    // Admin account found, verify the password
    $adminData = $resultAdmin->fetch_assoc();
    if (password_verify($password, $adminData['password'])) {
        // Admin authenticated, start a session
        // session_start();

        // Start a new session and store data
        // $_SESSION['account_number'] = $adminData['account_number'];
        // $_SESSION['last_name'] = $adminData['last_name'];
        // $_SESSION['first_name'] = $adminData['first_name'];
        // $_SESSION['middle_name'] = $adminData['middle_name'];
        // $_SESSION['isAdmin'] = true;

        echo json_encode(['success' => true, 'message' => 'Admin Logged in', 'redirect' => '../home_chat/home_chat.php']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid email address or password']);
    }

    // Close the result set
    $resultAdmin->close();
    // Close the connection
    $conn->close();

    exit(); // Important: Terminate the script after sending JSON response
}

// Close the result set
$resultAdmin->close();
// Close the connection
$conn->close();

// If no admin account is found, send an appropriate response
echo json_encode(['success' => false, 'message' => 'Admin account not found']);
exit();
?>