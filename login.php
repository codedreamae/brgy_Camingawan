<?php
session_start();
if (isset($_SESSION['user_id']) || isset($_SESSION['role'])) { // Ensure both are set
    if ($_SESSION['role'] == 'member') {
        header('Location: upep.php');
        exit;
    } elseif ($_SESSION['role'] == 'leader') {
        header('Location: purokredent.php');
        exit;
    } elseif ($_SESSION['role'] == 'admin') {
        header('Location: dashboard.php');
        exit;
    }
}






require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);
    $remember = isset($_POST['remember']);

    $sql = $conn->prepare("SELECT id, password, role, status FROM users WHERE email = :email");
    $sql->bindParam(':email', $email);
    $sql->execute();
    
    $user = $sql->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if ($user['status'] == 'pending') {
            $_SESSION['status_message'] = "Your account is still pending approval. Please wait for admin confirmation.";
        } elseif ($user['status'] == 'declined') {
            $_SESSION['status_message'] = "Your account request was declined. Please contact the admin.";
        } elseif (password_verify($password, $user['password'])) {
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            if ($remember) {
                setcookie("email", $email, time() + (86400 * 30), "/", "", false, true); 
                setcookie("user_id", $user['id'], time() + (86400 * 30), "/", "", false, true);
            } else {
                setcookie("email", "", time() - 3600, "/");
                setcookie("user_id", "", time() - 3600, "/");
            }

            if ($user['role'] == 'admin') {
                header('Location: dashboard.php');
            } elseif ($user['role'] == 'leader') {
                header('Location: purokredent.php');
            } elseif ($user['role'] == 'member') {
                header('Location: upep.php');
            } else {
                $_SESSION['status_message'] = "Unrecognized user role.";
                header('Location: login.php');
            }
            exit;
        } else {
            $_SESSION['status_message'] = "Incorrect password. Please try again.";
        }
    } else {
        $_SESSION['status_message'] = "No account found with that email.";
    }

    header('Location: login.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="img/logo2.png" rel="icon">
    <link rel="stylesheet" href="css/adduser.css"/>
    <link rel="stylesheet" href="css/at.css" />
    <script src="js/bootstrap.bundle.js"></script>
    <title>Login</title>

   
</head>
<body>
    <?php include_once('header.php') ?>
    <div class="container">     
        <div class="logo">
            <img src="img/logo2.png" alt="Logo">
        </div>
        <div id="login-wrapper">
            <div class="text-muted">
                <small><em>Please fill all the required fields</em></small>
            </div>
   
            <?php if (isset($_SESSION['status_message'])): ?>
                <p><?php echo $_SESSION['status_message']; unset($_SESSION['status_message']); ?></p>
            <?php endif; ?>
           
            <?php if (isset($error) && !empty($error)): ?>
                <div class="message-error"><?= $error ?></div>
            <?php endif; ?>
            <?php if (isset($_SESSION['msg']['success']) && !empty($_SESSION['msg']['success'])): ?>
                <div class="message-success">
                    <?php 
                    echo $_SESSION['msg']['success'];
                    unset($_SESSION['msg']['success']); 
                    ?>
                </div>  
            <?php endif; ?>
            <form action="" method="POST">
                <div class="input-group" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="right" title="Isulat ang imo Email">
                    <input type="text" name="email" placeholder="Email" required>
                    <span class="input-group-text" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>
                <div class="input-group" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="right" title="Isulat ang imo Passwoed">
                    <input type="password" name="password" placeholder="Password" id="password" required>
                    <span class="input-group-text" onclick="togglePasswordVisibility()" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                        <i class="fas fa-eye" id="togglePasswordIcon"></i>
                    </span>
                </div>
                <div class="col-md-12 form-group" style="text-align: left;">
                    <input type="checkbox" name="remember" class="check" <?php if(isset($_COOKIE['email'])) { echo 'checked'; } ?>> Remember Me
                </div>
               
                <script>
                    function togglePasswordVisibility() {
                        var passwordField = document.getElementById('password');
                        var toggleIcon = document.getElementById('togglePasswordIcon');
                        if (passwordField.type === 'password') {
                            passwordField.type = 'text';
                            toggleIcon.classList.remove('fa-eye');
                            toggleIcon.classList.add('fa-eye-slash');
                        } else {
                            passwordField.type = 'password';
                            toggleIcon.classList.remove('fa-eye-slash');
                            toggleIcon.classList.add('fa-eye');
                        }
                    }
                </script>

                <button type="submit" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="right" title="Palihog login sang imo impromasyon"  class="btn" style="margin-top: 20px; margin-bottom: 10px;" value="Login">Login</button>
            </form>
            <div class="additional-options">
                <a data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="right" title="Magilis sang imo Password" href="forgot-password.php">Forgot Password?</a>
                <span> | </span>
                <a data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="right" title="Palihog himo Account" href="adduser.php">Create an Account</a>
                
            </div>
        </div>
    </div>
</body>
</html>
