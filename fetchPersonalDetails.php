<?php
session_start();
header('Content-Type: application/json');

$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'User is not logged in.']);
    exit;
}

$user_id = $_SESSION['user_id']; // Your logic to get the user's ID

$stmt = $conn->prepare("SELECT name, age, email FROM details WHERE user_id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

$records = $result->fetch_all(MYSQLI_ASSOC);

// Check if the details_submitted flag is set in the session and include it in the response
$response = [
    'records' => $records, // This should be an array.
    'details_submitted' => isset($_SESSION['details_submitted']) && $_SESSION['details_submitted'] // Simplified check for details_submitted
];

echo json_encode($response);

$stmt->close();
$conn->close();
?>
