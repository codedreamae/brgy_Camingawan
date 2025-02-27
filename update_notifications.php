<?php
require 'connection.php';

$user_id = $_POST['user_id']; 

$sql = "UPDATE notifications SET status = 'read' WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$user_id]);

echo json_encode(['success' => true]);
?>
