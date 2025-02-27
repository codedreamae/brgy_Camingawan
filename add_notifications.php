<?php
require 'connection.php';

function addNotification($user_id, $message, $conn) {
    $sql = "INSERT INTO notifications (user_id, message) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_id, $message]);
}


$user_id = 1; 
$message = "You have a new appointment request!";
addNotification($user_id, $message, $conn);

$user_id = 2; 
$message = "Your appointment has been approved!";
addNotification($user_id, $message, $conn);

?>
