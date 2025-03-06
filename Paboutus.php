<?php
include 'connection.php';
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/logo2.png" rel="icon">
    <title>BARANGAY CAMINGAWAN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}
.all-content{
  background: #f7f5f2;
}
.navbar .navbar-nav .nav-item a{
    padding: 15px;
}
.navbar .navbar-nav .nav-but{
    padding: 8px;
}
.nav-link {
  color: #fff; 
  transition: all 0.3s ease-in-out; 
}

.nav-link:hover {
  text-decoration: none; 
  background-color: rgba(31, 226, 47, 0.664); 
  padding: 5px 10px; 
  border-radius: 5px; 
}

.sticky-navbar {
  position: sticky;
  top: 0;
  z-index: 1030; 
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
}
/* about */
#about {
    width: 100%;
    padding: 50px 0;
    background: #f7f5f2;
    font-family: 'Roboto', sans-serif;
  }
  .container {
    width: 80%;
    margin: 0 auto;
    overflow: hidden; /* Prevents content from overflowing on small screens */
  }
  .heading {
    text-align: center;
    margin-bottom: 25px;
    color: black;
    font-size: 30px;
    font-weight: bold;
  }
  .heading span {
    color: #b2744c;
  }
  .card {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Adding a subtle shadow for depth */
  }
  .card img {
    width: 100%; /* Ensures the image fills the card */
    height: 67vh; /* Allows the image to adjust its height proportionally */
    display: block;
  }
  @media screen and (max-width: 992px) {
    .container {
      width: 90%;
    }
  }
  @media screen and (max-width: 768px) {
    .row {
      flex-direction: column;
    }
    .col-md-5 {
      width: 100%;
      margin-bottom: 20px;
    }
    .col-md-7 {
      width: 100%;
    }
  }
/* About us */
/* footer */
footer {
  background: #343434;
  padding: 10px 0; /* Reduce overall padding */
  color: white;
  font-size: 12px; /* Reduce font size */
}
.con {
  max-width: 600px; /* Further reduce maximum width */
  margin: auto;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  padding: 0 5px; /* Minimize padding for smaller design */
}
.footer-content {
  flex: 1 1 120px; /* Adjust minimum width */
  margin-bottom: 8px; /* Reduce spacing between items */
  text-align: center;
}
.footer-content h3 {
  font-size: 14px; /* Reduce font size of headings */
  margin-bottom: 8px;
}
.footer-content p, .footer-content ul {
  margin: auto;
  padding: 3px;
  text-align: center;
}
.footer-content ul {
  padding: 0;
}
.list {
  padding: 0;
}
.list li {
  list-style-type: none;
  padding: 3px; /* Reduce padding for list items */
  position: relative;
  text-align: center;
}
.list li::before {
  content: '';
  position: absolute;
  transform: translate(-50%, -50%);
  left: 50%;
  top: 100%;
  width: 0;
  height: 2px;
  background: #f18930;
  transition-duration: 0.3s; /* Speed up animation */
}
.list li:hover::before {
  width: 40px; /* Reduce width of hover effect */
}
.social-icons {
  text-align: center;
  padding: 0;
}
.social-icons li {
  display: inline-block;
  padding: 2px; /* Reduce padding for icons */
}
.social-icons i {
  color: white;
  font-size: 16px; /* Reduce icon size */
}
a {
  text-decoration: none;
  color: inherit;
}
a:hover, .social-icons i:hover {
  color: #f18930;
}
.bottom-bar {
  background: #f18930;
  text-align: center;
  padding: 3px 0; /* Minimize padding */
  margin-top: 10px; /* Reduce margin-top */
}
.bottom-bar p {
  color: #343434;
  margin: 0;
  font-size: 10px; /* Further reduce font size */
  padding: 3px;
}
@media screen and (max-width: 767px) {
  .footer-content {
      flex: 1 1 100%; /* Each content takes full width on small screens */
  }
  .container {
      flex-direction: column;
      align-items: center;
  }
}
/* footer */
</style>
<body>
<nav class="navbar sticky-navbar navbar-expand-lg navbar-dark bg-secondary py-1">
  <div class="container-fluid">
    <!-- Logo -->
    <a class="navbar-brand ms-5" href="#">
      <img src="img/logo2.png" alt="Logo" width="80" height="70">
    </a>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <?php 
// Fetch the current user's name and email based on user_id in the session
$user_id = $_SESSION['user_id']; // Assuming user_id is stored in session after login
$sql = "SELECT name, email, purok FROM users WHERE id = :user_id LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();

// Fetch the user data
$row = $stmt->fetch();

// Check if a user is found
if ($row) {
    $name = $row['name'];
    $email = $row['email'];
    $purok = $row['purok'];
} else {
    // Handle case if no user is found (e.g., user is not logged in or invalid user)
    $name = 'Guest';
    $email = 'Not available';
    $purok = 'Not available';
}
?>

    <!-- Navbar Links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="purokredent.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="lead.php">Resident</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="Paboutus.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="Pservices.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="Pcontacts.php">Contacts</a>
        </li>
        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo htmlspecialchars($name); ?></span>
        <img class="img-profile rounded-circle" src="img/pro.png" width="30" height="30">
    </a>
    
    <ul class="dropdown-menu dropdown-menu-end">
        <li class="dropdown-item">Profile</li>
        <li>
            <a class="dropdown-item">
                <i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
                <u style="color: blue;"><?php echo htmlspecialchars($email); ?></u>
            </a>
        </li>
        <li><a class="dropdown-item">
                <i class=" fa-solid fa-signs-post fa-sm fa-fw mr-2 text-gray-400"></i>
                <i><b> PUROK <?php echo htmlspecialchars($purok); ?> BRGY. CAMINGAWAN, <br> KABANKALAN CITY, NEG. OCC.</b></i>
            </a></li>
        <li><a class="dropdown-item" href="logout.php">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Logout</span>
        </a></li>
    </ul>
</li>
      </ul>
    </div>
  </div>
</nav>
<!-- about section -->
<div class="about" id="about">
  <div class="container">
    <div class="heading">About <span>Us</span></div>
    <div class="row">
      <div class="col-md-5">
        <div class="card">
          <img src="img/background.png">
        </div>
      </div>
      <div class="col-md-7">
        <div>
          <h6><strong>MISSION</strong></h6>
          <i><p>Through the cooperation of people and leaders from various sectors, linking local, provincial, national, and other agencies. Providing adequate quality basic social services and appropriate education and training for people in the barangay.</p></i>
        </div>
        <div>
          <h6><strong>VISION</strong></h6>
          <i><p>A progressive Barangay where people are organized, cooperative, and unified; with significant development, sufficient income, food security, green and clean environment, and restored ecological balance. An intelligent and God-fearing population.</p></i>
        </div>
        <div>
          <h6><strong>GOALS & OBJECTIVES</strong></h6>
          <i><p>
            1. Enhance sector capacities within the Barangay.<br>
            2. Implement diverse livelihood projects for economic development.<br>
            3. Restore and conserve the environment.<br>
            4. Create a permanent Barangay site with community improvement facilities.<br>
            5. Provide adequate and quality basic social services delivery system.
          </p></i>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- about section -->
<!-- footer -->
<footer>
    <div class="con">
        <div class="footer-content">
            <h3>Contact Us</h3>
            <ul class="list">
                <li><a href="#">Email: kabankalan.camingawan@gmail.com</a></li>
                <li><a href="#">Address: Brgy.Camingawan, Kabankalan, City, Negros Occidental</a></li>
                <li><a href="#">Phone#: 09602016125</a></li>
            </ul>
        </div>
        <div class="footer-content">
            <h3>Quick Links</h3>
            <ul class="list">
                <li><a href="purokredent.php">Home</a></li>
                <li><a href="Paboutus.php">About</a></li>
                <li><a href="Pservices.php">Services</a></li>
                <li><a href="Pcontacts.php">Contact</a></li>
            </ul>
        </div>
        <div class="footer-content">
            <h3>Fllow Us</h3>
            <ul class="social-icons">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-google"></i></a></li>
            </ul>
        </div>
    </div>
    
</footer>
<!--footer -->
</body>
</html>
