<?php
session_start();



$users = [
    'user1' => password_hash('password123', PASSWORD_DEFAULT),
    'admin' => password_hash('admin123', PASSWORD_DEFAULT),
];


$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (isset($users[$username]) && password_verify($password, $users[$username])) {

    $_SESSION['username'] = $username;
    header('Location: dashboard.php');
    exit;
} else {

    echo "<p>Invalid username or password. Please <a href='index.html'>try again</a>.</p>";
}
