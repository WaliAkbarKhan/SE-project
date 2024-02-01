<?php
session_start();
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Database connection failed.']);
    exit();
}

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'User is not logged in.']);
    exit();
}

$user_id = $_SESSION['user_id'];
$name = $_POST["name"];
$age = $_POST["age"];
$email = $_POST["email"];

// Check if a record for the user already exists
$checkStmt = $conn->prepare("SELECT id FROM details WHERE user_id = ?");
$checkStmt->bind_param("i", $user_id);
$checkStmt->execute();
$result = $checkStmt->get_result();
$exists = $result->num_rows > 0;
$checkStmt->close();

if ($exists) {
    // Update the existing record
    $updateStmt = $conn->prepare("UPDATE details SET name = ?, age = ?, email = ? WHERE user_id = ?");
    $updateStmt->bind_param("sisi", $name, $age, $email, $user_id);
    $success = $updateStmt->execute();
    $updateStmt->close();
} else {
    // Insert a new record
    $insertStmt = $conn->prepare("INSERT INTO details (name, age, email, user_id) VALUES (?, ?, ?, ?)");
    $insertStmt->bind_param("sisi", $name, $age, $email, $user_id);
    $success = $insertStmt->execute();
    $insertStmt->close();
}

if ($success) {
    $_SESSION['details_submitted'] = true;
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $conn->error]);
}

$conn->close();
?>
