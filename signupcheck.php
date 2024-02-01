<?php
session_start();
// Connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users"; 

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $username = $conn->real_escape_string($_POST['username']);
    $username = $conn->real_escape_string($_POST['username']);
    $lab = $conn->real_escape_string($_POST['lab']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirm_password = $conn->real_escape_string($_POST['confirm_password']);
    
    // Check if passwords match
    if ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
        
    }

    // Check for unique username and email
    $checkUser = $conn->query("SELECT * FROM user_data WHERE username = '$username' OR email = '$email'");
    
    if ($checkUser->num_rows > 0) {
        $error_message = "Username or Email already exists.";
    }

    if (!empty($error_message)) {
        header("Location: signup.php?error=" . urlencode($error_message));

        //echo $error_message;
        exit(); // Stop further execution
    }
    
    // Password hashing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO user_data (first_name, last_name, username, lab, email, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $first_name, $last_name, $username, $lab, $email, $hashed_password);
    
    // Execute the statement
    if ($stmt->execute()) {
        // After successful INSERT
        $_SESSION['user_id'] = $conn->insert_id; // Set the session variable immediately after execution.
        $_SESSION['user_name'] = $first_name . ' ' . $last_name;
        header("Location: dashboard.php"); // Redirect to a PHP file, not an HTML file.
        exit();
    
    } else {
        //echo "Error: " . $stmt->error;
        header("Location: signup.php?error=" . urlencode($error_message));

    }
    
    // Close statement and connection
    // $stmt->close();
    // $conn->close();
}
?>