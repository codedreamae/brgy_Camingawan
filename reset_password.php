<?php
include 'connection.php'; 
include 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



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
                    
                    // Optional: Send confirmation email after password reset
                    $mail = new PHPMailer(true);
                    try {
                        //Server settings
                        $mail->isSMTP();                                           
                        $mail->Host       = 'smtp.gmail.com';
                        $mail->SMTPAuth   = true;                                     
                        $mail->Username   = 'reahbatallones2@gmail.com';                 
                        $mail->Password   = 'rheya123';                    
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           
                        $mail->Port       = 587;                                     

                        //Recipients
                        $mail->setFrom('no-reply@yourdomain.com', 'Your Company');
                        $mail->addAddress($resetRequest['email']);                    

                        // Content
                        $mail->isHTML(true);                                         
                        $mail->Subject = 'Password Reset Confirmation';
                        $mail->Body    = 'Your password has been successfully reset.';
                        $mail->AltBody = 'Your password has been successfully reset.';

                        $mail->send();
                    } catch (Exception $e) {
                        echo "Mailer Error: {$mail->ErrorInfo}";
                    }
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
