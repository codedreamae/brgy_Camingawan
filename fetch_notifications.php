<?php
include 'connection.php';

// Fetch unread notifications
$sql = "SELECT * FROM notifications WHERE status = 'unread' ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

$response = ['count' => count($notifications), 'notifications' => $notifications];

echo json_encode($response);
?>
