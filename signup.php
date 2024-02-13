<?php
include("database.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <form action="connect.php" method="post">
            <h2>Registration Form</h2>
            <div class="content">
                <label for="FirstName">First Name:</label>
                <input type="text" name="firstname" id="firstname" required>
            </div>
            <div class="content">
                <label for="SecondName">Second Name:</label>
                <input type="text" name="secondname" id="secondname" required>
            </div>
            <div class="content">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="content">
                <label for="password">Password:</label>
                <input type="password" name="Password" required>
            </div>
        
            <div class="buton-container">
                <button>Register</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = filter_input(INPUT_POST, "username",FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "passsword",FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($username)) {
        echo "Please enter a username";
    }
    elseif(empty($password)) {
        echo "Please enter a password";
    }
    else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (user, password)
                VALUES('$username', '$hash')";
       // mysqli_query($conn, $sql);
        echo "You are registred";
    }

}


//mysqli_close($conn);
?>