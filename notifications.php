<?php
include 'connection.php';
include 'auth.php';

$userId = $_SESSION['user_id']; // Assuming session stores logged-in user ID

$sql = $conn->prepare("SELECT * FROM unotif WHERE user_id = :user_id AND status = 'unread' ORDER BY created_at DESC");
$sql->bindParam(':user_id', $userId, PDO::PARAM_INT);
$sql->execute();
$notifications = $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($notifications);
?>
