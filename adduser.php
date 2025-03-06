<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    // Insert user into the database
    $sql = $conn->prepare("INSERT INTO users (name, email, password, role, status) VALUES (:name, :email, :password, :role, 'pending')");
    $sql->bindParam(':name', $name);
    $sql->bindParam(':email', $email);
    $sql->bindParam(':password', $password);
    $sql->bindParam(':role', $role);

    if ($sql->execute()) {
        $user_id = $conn->lastInsertId(); // Get the newly created user's ID

        $_SESSION['user_id'] = $user_id; // Store user ID in session
        header("Location: select_purok.php"); // Redirect to purok selection
        exit;
    } else {
        $error = "Error: " . $sql->errorInfo()[2];
    }
}
?>

<!-- Error and Success Messages -->
<?php if (isset($error) && !empty($error)): ?>
    <div class="message-error"><?= $error ?></div>
<?php endif; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="img/logo2.png" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/adduser.css" />
    <link rel="stylesheet" href="css/select.css" />
    <link rel="stylesheet" href="css/text.css" />
    <link rel="stylesheet" href="css/it.css" />
    <script src="js/bootstrap.bundle.js"></script>
 
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="img/logo2.png" alt="Logo">
    </div>
    <div id="login-wrapper">
        <div class="text-muted">
            <small><em>Please fill all the required fields</em></small>
        </div>
        <?php if (isset($error) && !empty($error)): ?>
            <div class="message-error"><?= $error ?></div>
        <?php endif; ?>
        <?php if (isset($_SESSION['msg']['success']) && !empty($_SESSION['msg']['success'])): ?>
            <div class="message-success">
                <?php 
                echo $_SESSION['msg']['success'];
                unset($_SESSION['msg']);
                ?>
            </div>  
        <?php endif; ?>

        <form class="login-form" method="POST" action="">
            <div class="input-group" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="right" title="Isulat ang imo bug-os nga Ngalan">
                <input type="text" placeholder="Fullname" name="name" required> 
                <i class="fas fa-user"></i>
            </div>
            <div class="input-group" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="right" title="Isulat ang imo Email">
                <input type="Email" placeholder="Email" name="email" required>
                <i class="fas fa-envelope"></i>
            </div>
            <div class="input-group" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="right" title="Isulat ang imo Password">
    <input type="password" id="password" placeholder="Password" name="password" required>
   <i class="fa-solid fa-eye-slash" id="togglePassword"></i> 
</div>
            <div class="input-group" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="right" title="Pili ka sang imo Role">
                <select name="role">
                    <option value="admin">Admin</option>
                    <option value="leader">Purok Leader</option>
                    <option value="member">Member</option>
                </select>
                <button type="submit" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="right" title="Palihog save sang imo impromasyon" value="Register">Save</button>
                
            </div>
        </form>
    </div>
</div>

<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
        // Toggle the type attribute
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Toggle the icon
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>


</body>
</html>
