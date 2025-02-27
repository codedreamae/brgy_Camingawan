<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'connection.php'; // Database connection

$email = '';

if (isset($_POST['email'])) {
    $inputEmail = $_POST['email']; // Email input from the form

    try {
        // Fetch the registered email from the database
        $sql = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $sql->execute([$inputEmail]);
        $user = $sql->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $registeredEmail = $user['email']; // Use fetched email from DB
            $token = bin2hex(random_bytes(50)); // Generate a secure token

            // Store the reset token in the database
            $sql = $conn->prepare("INSERT INTO password_resets (email, token) VALUES (?, ?)");
            $sql->execute([$registeredEmail, $token]);

            $resetLink = "http://localhost/Brgy_Camingawan/reset_password.php?token=" . $token;

            // Send Email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'your-email@gmail.com'; 
                $mail->Password   = 'plpw uexh frje dhzr'; // Use App Password for security
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->setFrom('noreply@brgycamingawan.com', 'Brgy. Camingawan');
                $mail->addAddress($registeredEmail);

                $mail->isHTML(true);
                $mail->Subject = 'Password Reset Request';
                $mail->Body    = 'Click the following link to reset your password: <a href="' . $resetLink . '">Reset Password</a>';
                $mail->AltBody = 'Click the following link to reset your password: ' . $resetLink;

                $mail->send();
                echo '<div class="alert alert-success text-center">A password reset link has been sent to your email address.</div>';
            } catch (Exception $e) {
                error_log('Mailer Error: ' . $mail->ErrorInfo);
                echo '<div class="alert alert-danger text-center">Message could not be sent. Please try again later.</div>';
            }
        } else {
            echo '<div class="alert alert-danger text-center">No account found with that email address.</div>';
        }
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger text-center">Error: ' . $e->getMessage() . '</div>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h2 class="text-center">Forgot Password</h2>
                        <form action="" method="POST" autocomplete="">
                            <p class="text-center">Enter your email address</p>
                            <?php
                                if (!empty($errors)) {
                                    echo '<div class="alert alert-danger text-center">';
                                    foreach($errors as $error){
                                        echo $error . "<br>";
                                    }
                                    echo '</div>';
                                }
                            ?>
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="<?php echo htmlspecialchars($email); ?>">
                            </div>
                            <div class="form-group text-center">
                                <input class="btn btn-primary" type="submit" value="Continue">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>