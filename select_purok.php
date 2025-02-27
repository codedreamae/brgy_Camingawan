<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $purok = $_POST['selected_purok'];
    $user_id = $_SESSION['user_id'];

    $sql = $conn->prepare("UPDATE users SET purok = :purok WHERE id = :user_id");
    $sql->bindParam(':purok', $purok);
    $sql->bindParam(':user_id', $user_id);

    if ($sql->execute()) {
        $_SESSION['msg']['success'] = "Wait for admin approval.";
        header("Location: login.php");
        exit;
    } else {
        $error = "Error: " . $sql->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Purok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container mt-5">
        <h3>Select Your Purok</h3>
        <form method="POST">
            <div class="mb-3">
                
                <select class="form-select" name="selected_purok" required>
                    <option value="" disabled selected>Select Purok</option>
                    <?php
                    $sql = $conn->prepare("SELECT * FROM purok");
                    $sql->execute();
                    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . htmlspecialchars($row['purok_name']) . "'>" . htmlspecialchars($row['purok_name']) . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button class="btn btn-primary" name="base">Submit</button>
        </form>
    </div>
</body>
</html>
