<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_SESSION['user'])) {
    header("Location: menu.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded credentials for simplicity
    $valid_username = 'user';
    $valid_password = 'password123';

    if ($username == $valid_username && $password == $valid_password) {
        $_SESSION['user'] = $username;
        header("Location: menu.php");
        exit();
    } else {
        $error_message = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Restaurant Ordering System</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (isset($error_message)): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <p><a href="register.php">Register</a></p>
    </div>
</body>
</html>
