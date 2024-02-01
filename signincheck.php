<?php

// session_start(); // Start the session.

// // Connection parameters
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "users"; 

// // Create a connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check the connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// function verifyUserPasswordAndGetID($conn, $username, $password) {
//     $stmt = $conn->prepare("SELECT id, password FROM user_data WHERE username = ?");
//     $stmt->bind_param("s", $username);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows == 1) {
//         $user = $result->fetch_assoc();
//         if (password_verify($password, $user['password'])) {
//             // Inside verifyUserPasswordAndGetID function, after password verification
//             return $user['id']; // Return the user's ID
//         }
//     }
//     return false;
// }
// // Handle login attempt
// if (isset($_POST['login'])) {
//     $username = $conn->real_escape_string($_POST['username']);
//     $password = $conn->real_escape_string($_POST['password']);

//     $userID = verifyUserPasswordAndGetID($conn, $username, $password);
//     if ($userID) {
//         $_SESSION['user_id'] = $userID; // Store user ID in session
//         $_SESSION['username'] = $username;

//         $_SESSION['user_name'] = $user['first_name'] . " " . $user['last_name'];

//         // Redirect to the dashboard on successful login
//         header("Location: dashboard.php");
//         exit();
//     } else {
//         // Set an error message if the login is not successful
//         $login_error = "Username or password do not match.";
//         header("Location: signin.php?error=" . urlencode($login_error));
//         exit();
//     }
// }


session_start(); // Start the session at the very beginning of the file.

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

// Function to verify the user's password and get their ID along with their name
function verifyUserPasswordAndGetID($conn, $username, $password) {
    $stmt = $conn->prepare("SELECT id, password, first_name, last_name FROM user_data WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Set the session variables after password verification
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['first_name'] . " " . $user['last_name'];
            return $user['id']; // Return the user's ID
        }
    }
    return false; // The user does not exist or the password is incorrect
}

// Handle login attempt
if (isset($_POST['login'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $userID = verifyUserPasswordAndGetID($conn, $username, $password);
    if ($userID) {
        // Redirect to the dashboard on successful login
        header("Location: dashboard.php");
        exit();
    } else {
        // Set an error message if the login is not successful
        $login_error = "Username or password do not match.";
        header("Location: signin.php?error=" . urlencode($login_error));
        exit();
    }
}

$conn->close(); // Close the database connection
?>