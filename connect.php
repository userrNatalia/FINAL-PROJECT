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
$firstName = $_POST['firstName'];
$email = $_POST['email'];
$password = $_POST['password']; // Note: Hash this password before storing it in the database for security
$confirmPassword = $_POST['confirmPassword'];

// Insert data into users table
$sql = "INSERT INTO users (firstname, email, password) VALUES ('$firstName', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
```