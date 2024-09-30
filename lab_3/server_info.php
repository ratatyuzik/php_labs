<?php
include 'session_timeout.php';

if(isset($_POST["show_info"])){
    $client_ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $script_name = $_SERVER['PHP_SELF'];
    $request_method = $_SERVER['REQUEST_METHOD'];
    $script_filename = $_SERVER['SCRIPT_FILENAME'];
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
    <form method="post">
        <button type="submit" name="show_info">Click to show your INFO</button>
    </form>

    <?php if (isset($client_ip)): ?>
        <h2>Server info:</h2>
        <p>Client IP-address: <?php echo($client_ip); ?></p>
        <p>Browser: <?php echo($user_agent); ?></p>
        <p>Script name: <?php echo($script_name); ?></p>
        <p>Request method: <?php echo($request_method); ?></p>
        <p>Path to file on server: <?php echo($script_filename); ?></p>
    <?php endif; ?> 
</body>
</html>
