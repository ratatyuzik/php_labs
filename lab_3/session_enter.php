<?php
include 'session_timeout.php';

if(isset($_POST["login"])){
    $login = $_POST["login"];
    $password = $_POST["password"];

    if($login == "login" && $password == "password"){
        $_SESSION["user"] = $login;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

if(isset($_SESSION["user"])){
    $username = $_SESSION["user"];
} else {
    $username = "";
}

if(isset($_POST["logout"])){
    session_destroy();
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
    <?php if ($username): ?>
        <h1>Hello, <?php echo ($username); ?>!</h1>
        <form method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    <?php else: ?>
        <h1>Login</h1>
        <form method="post">
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Sign in</button>
        </form>
    <?php endif; ?>
</body>
</html>
