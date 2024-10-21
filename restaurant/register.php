<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle registration (for simplicity, this does not store data)
    $_SESSION['registered'] = true;
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Restaurant Ordering System</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <form action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Register</button>
        </form>
        <p><a href="login.php">Login</a></p>
    </div>
</body>
</html>
