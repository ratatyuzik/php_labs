<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'register') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Email already exists.";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $password);
            if ($stmt->execute()) {
                echo "Registration successful.";
            } else {
                echo "Registration failed.";
            }
        }
        $stmt->close();
    }

    if ($action === 'login') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                echo "Login successful.";
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "Email not found.";
        }
        $stmt->close();
    }

    if ($action === 'updateProfile') {
        $userId = $_SESSION['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = isset($_POST['password']) && !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null;

        $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?" . ($password ? ", password = ?" : "") . " WHERE id = ?");
        if ($password) {
            $stmt->bind_param("sssi", $username, $email, $password, $userId);
        } else {
            $stmt->bind_param("ssi", $username, $email, $userId);
        }
        if ($stmt->execute()) {
            echo "Profile updated successfully.";
        } else {
            echo "Profile update failed.";
        }
        $stmt->close();
    }

    if ($action === 'logout') {
        session_destroy();
        echo "Logout successful.";
    }
}

$conn->close();
?>
