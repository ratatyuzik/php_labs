<?php
include 'session_timeout.php';

if (isset($_POST['add_to_cart'])) {
    $product = $_POST['product'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $_SESSION['cart'][] = $product;

    if (!isset($_COOKIE['previous_purchases'])) {
        $previousPurchases = '';
    } else {
        $previousPurchases = $_COOKIE['previous_purchases'];
    }

    $previousPurchases .= $product . ',';
    setcookie('previous_purchases', $previousPurchases, time() + (86400 * 30), "/");

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_POST['clear_all'])) {
    session_unset();
    session_destroy();

    setcookie('previous_purchases', '', time() - 3600, "/");

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$previousPurchases = isset($_COOKIE['previous_purchases']) ? explode(',', rtrim($_COOKIE['previous_purchases'], ',')) : [];
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Your items</h1>
    <ul>
        <?php foreach ($cart as $item): ?>
            <li><?php echo($item); ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Add purchase</h2>
    <form method="post">
        <input type="text" name="product" required>
        <button type="submit" name="add_to_cart">Add item</button>
    </form>

    <h2>Previous purchases</h2>
    <ul>
        <?php foreach ($previousPurchases as $item): ?>
            <li><?php echo($item); ?></li>
        <?php endforeach; ?>
    </ul>

    <form method="post">
        <button type="submit" name="clear_all">Clear all</button>
    </form>
</body>
</html>
