<?php

include('auth.php');
require 'connection.php'; // Include the database connection

$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    try {
        // Fetch the user's current password hash (replace '1' with the relevant user ID)
        $stmt = $conn->prepare("SELECT en_id, password FROM code WHERE en_id = :en_id");
        $stmt->execute([':en_id' => 1]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($oldPassword, $user['password'])) {
            $message = "Old password is incorrect.";
            $messageType = 'danger';
        } elseif ($newPassword !== $confirmPassword) {
            $message = "New password and confirmation password do not match.";
            $messageType = 'danger';
        } else {
            // Hash the new password
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the password in the database
            $updateStmt = $conn->prepare("UPDATE code SET password = :password WHERE en_id = :en_id");
            $updateStmt->execute([
                'password' => $newPasswordHash,
                'en_id' => $user['en_id'],
            ]);

            $message = "Password successfully updated.";
            $messageType = 'success';
        }
    } catch (PDOException $e) {
        $message = "Error updating password: " . $e->getMessage();
        $messageType = 'danger';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">                        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="img/logo2.png" rel="icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/css/OverlayScrollbars.min.css" integrity="sha384-I1C/JyKz3qPbwTp/KZsbwwmIeeN4V+4p7Quy3ORgZPz5y2fbG5XTyFGEuEbm/fd5" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/Bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+57mN4Q4pI5tyBmH7ZivO59SmHY9I" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/js/jquery.overlayScrollbars.min.js" integrity="sha384-X5XYO5sZ5h3Aq/zyX5Xh0bONoI2xF8mXFNFFLCPBeSuyUsS7EoP26L45ePxFzZ1J" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>  
  <script src="dist/js/Script.js"></script>
  <script src="dist/js/pages/dashboard.js"></script>
  <script src="dist/js/bootstrap.bundle.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Change Password</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($message): ?>
                            <div class="alert alert-<?php echo $messageType; ?> alert-dismissible fade show" role="alert">
                                <?php echo $message; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="old_password">Old Password:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="old_password" name="old_password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="togglePasswordVisibility('old_password')">
                                            <i class="fa fa-eye" id="toggleOld_password"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="togglePasswordVisibility('new_password')">
                                            <i class="fa fa-eye" id="toggleNew_password"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm New Password:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="togglePasswordVisibility('confirm_password')">
                                            <i class="fa fa-eye" id="toggleConfirm_password"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to toggle password visibility
        function togglePasswordVisibility(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = document.querySelector(`#toggle${fieldId.charAt(0).toUpperCase() + fieldId.slice(1)}`);
            if (field.type === "password") {
                field.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                field.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>
