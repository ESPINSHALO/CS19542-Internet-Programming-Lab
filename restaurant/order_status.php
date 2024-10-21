<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$order_status = isset($_SESSION['cart']) && count($_SESSION['cart']) > 0 ? "Your order has been placed." : "No orders placed.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status - Restaurant Ordering System</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Order Status</h2>
    <p><?php echo $order_status; ?></p>
    <a href="menu.php">Go to Menu</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>
