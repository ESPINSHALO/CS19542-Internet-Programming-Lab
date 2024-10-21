<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$menu_items = [
    ['name' => 'Pizza', 'price' => 10],
    ['name' => 'Burger', 'price' => 5],
    ['name' => 'Pasta', 'price' => 8],
];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
    $_SESSION['total'] = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST['item'];
    $item_price = $_POST['price'];
    $_SESSION['cart'][] = ['name' => $item_name, 'price' => $item_price];
    $_SESSION['total'] += $item_price;
}

$total = $_SESSION['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Restaurant Ordering System</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['user']; ?>!</h2>
    <h3>Menu</h3>
    <ul>
        <?php foreach ($menu_items as $item): ?>
            <li>
                <?php echo $item['name']; ?> - $<?php echo $item['price']; ?>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="item" value="<?php echo $item['name']; ?>">
                    <input type="hidden" name="price" value="<?php echo $item['price']; ?>">
                    <button type="submit">Add to Cart</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <h3>Your Cart</h3>
    <p>Total: $<?php echo $total; ?></p>
    <a href="order_status.php">Order Status</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>
