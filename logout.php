<?php
session_start();
require 'connection.php'; 

if (isset($_GET['role'])) {
    $role = $_GET['role'];

    if (isset($_SESSION['role']) && $_SESSION['role'] === $role) {
        unset($_SESSION['user_id']);
        unset($_SESSION['role']);
        session_destroy();

        // Redirect based on role
        if ($role == 'admin') {
            header("Location: login.php");
        } elseif ($role == 'leader') {
            header("Location: login.php");
        } elseif ($role == 'member') {
            header("Location: login.php");
        } else {
            header("Location: login.php");
        }
        exit();
    } else {
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>

