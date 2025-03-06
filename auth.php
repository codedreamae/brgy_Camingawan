
<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

$role = $_SESSION['role'];

// Redirect based on role
if (basename($_SERVER['PHP_SELF']) == 'login.php') {
    if ($role == 'admin') {
        header("Location: dashboard.php");
        exit();
    } elseif ($role == 'leader') {
        header("Location: purokredent.php");
        exit();
    } elseif ($role == 'member') {
        header("Location: upep.php");
        exit();
    }
}
?>