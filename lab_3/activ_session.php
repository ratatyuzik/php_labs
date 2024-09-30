<?php
session_start();

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) {
    session_unset();
    session_destroy();  
} else {
    $_SESSION['last_activity'] = time();
}
?>
