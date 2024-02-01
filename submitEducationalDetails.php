<?php
session_start();
header('Content-Type: application/json'); // Ensure the content type is set to JSON

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Database connection failed.']);
    exit();
}

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'User is not logged in.']);
    exit();
}

$user_id = $_SESSION['user_id'];
$qualification = $_POST["qualification"];
$institute = $_POST["institute"];
$department = $_POST["department"];

// Check if an educational details record already exists for this user
$stmt = $conn->prepare("SELECT id FROM educational_details WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Record exists, prepare to update
    $stmt = $conn->prepare("UPDATE educational_details SET qualification = ?, institution = ?, department = ? WHERE user_id = ?");
    $stmt->bind_param("sssi", $qualification, $institute, $department, $user_id);
} else {
    // Record does not exist, prepare to insert
    $stmt = $conn->prepare("INSERT INTO educational_details (qualification, institution, department, user_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $qualification, $institute, $department, $user_id);
}

// Execute the prepared statement
if ($stmt->execute()) {
    $_SESSION['educational_details_submitted'] = true; // You may want to use a different session variable for educational details
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $stmt->error]);
}

// Close statement and connection
$stmt->close();
$conn->close();
?>