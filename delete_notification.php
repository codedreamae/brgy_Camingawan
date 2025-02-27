<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['notif_id'])) {
    $notif_id = $_POST['notif_id'];

    $sql = "DELETE FROM notifications WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$notif_id]);

    echo json_encode(['success' => true]);
}
?>
