<?php
include 'session_timeout.php'; 

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    setcookie("username", $username, time() + 86400 * 7, "/"); 
    header("Location:" . $_SERVER["PHP_SELF"]);
    exit();
}

$username = isset($_COOKIE["username"]) ? $_COOKIE["username"] : "";

if (isset($_POST["delete"])) {
    setcookie("username", '', 0, "/"); 
    header("Location:" . $_SERVER["PHP_SELF"]);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if ($username):?>
        <h1>Hello, your username is <?php echo($username); ?></h1>
        <form method="post">
            <button type="submit" name="delete">Click to delete cookies</button>
        </form>
    <?php else:?>
        <form method="post">
            <label for="username">Enter your name: </label>
            <input type="text" id="username" name="username" required>
            <button type="submit" name="submit">Accept</button>
        </form>
    <?php endif; ?>
</body>
</html>
