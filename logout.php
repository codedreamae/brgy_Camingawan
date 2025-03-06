<?php
session_start();
require 'connection.php'; 

// Ensure a user is logged in before logging out
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

// Get role from session (not from GET request to prevent manipulation)
$role = $_SESSION['role'];

// Completely destroy the session
$_SESSION = []; // Clear session variables
session_unset(); // Unset session
session_destroy(); // Destroy session
setcookie(session_name(), '', time() - 3600, '/'); // Remove session cookie

// Regenerate session ID to prevent session fixation
session_regenerate_id(true);

// Redirect user to login page after logout
header("Location: login.php");
exit();
?>
