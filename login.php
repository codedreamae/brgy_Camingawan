<?php
session_start();
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);
    $remember = isset($_POST['remember']);

    // Check if user is in the `users` table
    $sql = $conn->prepare("SELECT id, password, role, status FROM users WHERE email = :email");
    $sql->bindParam(':email', $email);
    $sql->execute();
    
    $user = $sql->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Check the account status
        if ($user['status'] == 'pending') {
            $_SESSION['status_message'] = "Your account is still pending approval. Please wait for admin confirmation.";
        } elseif ($user['status'] == 'declined') {
            $_SESSION['status_message'] = "Your account request was declined. Please contact the admin.";
        } elseif (password_verify($password, $user['password'])) {
            // Successful login, set session and redirect based on role
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            // Set cookies if 'Remember Me' is checked
            if ($remember) {
                setcookie("email", $email, time() + (86400 * 30), "/", "", false, true); // 30 days expiration, HTTPOnly
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
    <link rel="stylesheet" href="css/adduser.css" />
    <script src="js/bootstrap.bundle.js"></script>
    <title>Login</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        background-color: #fff;
        padding: 3.5em; /* Adjusted padding for a more balanced layout */
        box-shadow: 0 0 50px rgba(37, 110, 238, 0.77);
        border-radius: 8px;
        width: 100%;
        max-width: 500px; /* Increased max-width for better flexibility */
        box-sizing: border-box; /* Ensures padding is included in width calculation */
    }

    .logo {
    position: absolute;
    top: -60px;
    left: 50%;
    transform: translateX(-50%);
}
.text-muted {
    color:rgb(18, 121, 211);
    margin-bottom: 1.75em; /* Increased margin for better spacing */
}
.logo img {
    width: 120px;
    height: 120px;
}

.login-form {
    margin-top: 60px;
}


    #login-wrapper {
        text-align: center;
    }

    .input-group {
        position: relative;
        margin-bottom: 1.5em; /* Increased margin for better spacing */
    }

    .input-group input {
        width: 100%;
        padding: 0.75em; /* Increased padding for a more spacious input field */
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1em; /* Ensures consistency with input field size */
        box-sizing: border-box;
    }

    .btn {
        display: block;
        width: 100%;
        padding: 0.75em; /* Adjusted padding for the button */
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1em;
    }

    .btn:hover {
        background-color: #218838;
    }

    .message-error, .message-success {
        color: #ff0000;
        margin-bottom: 1.5em; /* Increased margin for better spacing */
    }

    .message-success {
        color: #28a745;
    }

    .additional-options {
        margin-top: 1.5em; /* Adjusted margin for spacing below the form */
        text-align: center;
    }

    .additional-options a {
        color: #007bff;
        text-decoration: none;
    }

    .additional-options a:hover {
        text-decoration: underline;
    }
</style>

   
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
                <div class="input-group">
                    <input type="text" name="email" placeholder="Email" required>
                    <span class="input-group-text" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>
                <div class="input-group">
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

                <button type="submit" class="btn" style="margin-top: 20px; margin-bottom: 10px;" value="Login">Login</button>
            </form>
            <div class="additional-options">
                <a href="forgot-password.php">Forgot Password?</a>
                <span> | </span>
                <a href="adduser.php">Create an Account</a>
                
            </div>
        </div>
    </div>
</body>
</html>
