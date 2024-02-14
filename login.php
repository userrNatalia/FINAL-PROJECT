<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP (empty)
$database = "natalia_proj";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Validate form data (perform additional validation as needed)

// Query to check if the username exists and retrieve the hashed password
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Username exists, verify password
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Password is correct, user authenticated
        echo "Login successful";
       
        // Here, you can set up session variables or redirect the user to a dashboard page
    } else {
        // Password is incorrect
        echo "Invalid password";
    }
} else {
    // Username does not exist
    echo "Username not found";
}

// Close connection
$conn->close();
?>
