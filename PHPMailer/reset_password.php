<?php
include 'connection.php'; // Database connection using PDO

if (isset($email)) {
    try {
        // Check if email exists
        $sql = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $sql->execute([$email]);

        if ($sql->rowCount() > 0) {
            // Generate a unique token
            $token = bin2hex(random_bytes(50));

            // Store the token in the database
            $sql = $conn->prepare("INSERT INTO password_resets (email, token) VALUES (?, ?)");
            $sql->execute([$email, $token]);

            // Send reset link email
            $resetLink = "http://yourdomain.com/reset_password.php?token=" . $token;

            $subject = "Password Reset Request";
            $message = "Click the following link to reset your password: " . $resetLink;
            $headers = "From: no-reply@yourdomain.com";

            mail($email, $subject, $message, $headers);
            echo "A password reset link has been sent to your email address.";
        } else {
            echo "No account found with that email address.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Validate token
    $sql = $conn->prepare("SELECT * FROM password_resets WHERE token = ? LIMIT 1");
    $sql->execute([$token]);
    $resetRequest = $sql->fetch(PDO::FETCH_ASSOC);

    if ($resetRequest) {
        // Check if the reset token is expired (1 hour expiry)
        $expiryTime = strtotime($resetRequest['created_at']) + 3600; // 1 hour
        if (time() < $expiryTime) {
            // Show form to reset password
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $newPassword = $_POST['password'];
                $confirmPassword = $_POST['confirm_password'];

                if ($newPassword === $confirmPassword) {
                    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

                    // Update the user's password
                    $sql = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
                    $sql->execute([$newPasswordHash, $resetRequest['email']]);

                    // Delete the reset token
                    $sql = $conn->prepare("DELETE FROM password_resets WHERE token = ?");
                    $sql->execute([$token]);

                    echo "Your password has been successfully reset.";
                } else {
                    echo "Passwords do not match.";
                }
            }
        } else {
            echo "The reset link has expired.";
        }
    } else {
        echo "Invalid reset token.";
    }
}
?>

<form action="reset_password.php?token=<?php echo $token; ?>" method="POST">
    <label for="password">New Password:</label>
    <input type="password" name="password" id="password" required>
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" id="confirm_password" required>
    <input type="submit" value="Reset Password">
</form>
