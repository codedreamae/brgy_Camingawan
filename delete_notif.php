<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['notification_id'])) {
    $notification_id = $_POST['notification_id'];

    $sql = "DELETE FROM unotif WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$notification_id]);

    echo json_encode(['success' => true]);
}
?>
