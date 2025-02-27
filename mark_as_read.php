<?php
include 'connection.php';
include 'auth.php';

$userId = $_SESSION['user_id'];

$sql = $conn->prepare("UPDATE unotif SET status = 'read' WHERE user_id = :user_id AND status = 'unread'");
$sql->bindParam(':user_id', $userId, PDO::PARAM_INT);
if ($sql->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
?>
