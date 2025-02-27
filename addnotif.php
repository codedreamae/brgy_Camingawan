<?php
require 'connection.php';

function addNotifi($user_id, $message, $conn) {
    $sql = "INSERT INTO unotif (user_id, message) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_id, $message]);
}

// Example usage (Call this whenever a new notification is needed)
$user_id = 1; // Replace with actual recipient user ID
$message = "You have a new appointment request!";
addNotifi($user_id, $message, $conn);

$user_id = 2; // ID of the user receiving the notification
$message = "Your appointment has been approved!";
addNotifi($user_id, $message, $conn);

?>
