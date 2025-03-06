<?php
include 'connection.php';
include 'auth.php';

// Function to add notification
function addNotification($user_id, $message, $conn) {
    $sql = "INSERT INTO notifications (user_id, message) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_id, $message]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $certif = $_POST['certif'];
    $mem_name = $_POST['mem_name'];
    $purok = $_POST['purok'];
    $age = $_POST['age'];
    $appoint_date = $_POST['appoint_date'];
    $remark = $_POST['remark'];

    // Insert Appointment
    $sql = "INSERT INTO appointment (certif, mem_name, purok, age, appoint_date, remark, app_stat) 
            VALUES (:certif, :mem_name, :purok, :age, :appoint_date, :remark, 'pending')";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':certif' => $certif,
        ':mem_name' => $mem_name,
        ':purok' => $purok,
        ':age' => $age,
        ':appoint_date' => $appoint_date,
        ':remark' => $remark
    ]);

    // Send Notification to Admin
    $app_id = 1; // Change this to the actual admin ID
    $message = "New appointment from $mem_name";
    addNotification($app_id, $message, $conn);

    echo "<script>alert('Your appointment request has been sent!'); window.location.href='Pservices.php';</script>";
}
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
/* Services */
.top-cards {
  width: 100%;
  background: #f7f5f2;
  font-family: 'Roboto', sans-serif;
  padding: 50px 0;
}

.heading2 {
  color: black;
  text-align: center;
  font-size: 30px;
  font-weight: bold;
}

.heading2 span {
  color: #b2744c;
}

.top-cards .container {
  margin-top: 30px;
}

.top-cards .card {
  border-radius: 10px;
  transition: 0.5s;
  cursor: pointer;
  overflow: hidden;
  position: relative;
}

.top-cards .card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 10px 10px 0 0;
  position: relative;
}

/* Blur effect on top half */
.top-cards .card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 50%; /* Covers the top half */
  background: rgba(255, 255, 255, 0.5); /* Semi-transparent white */
  backdrop-filter: blur(10px); /* Blur effect */
  z-index: 1; /* Layer above the image */
}

.top-cards .card h3 {
  color: black;
  padding: 10px;
  text-align: center;
  font-size: 25px;
  position: relative; /* Ensure it stays above the blur */
  z-index: 2;
}

.top-cards .card:hover {
  transform: translateY(-10px);
}

@media screen and (max-width: 767px) {
  .top-cards .row {
    justify-content: center;
  }
}

@media screen and (max-width: 500px) {
  .top-cards .row {
    justify-content: center;
  }
}

@media screen and (max-width: 370px) {
  .top-cards .row {
    justify-content: center;
  }
  .top-cards .card h3 {
    font-size: 14px;
    padding: 5px 10px;
  }
}
/* Services */
/* footer */
footer {
  background: #343434;
  padding-top: 20px;
  color: white; /* Ensure text is visible on dark background */
  font-size: 14px; /* Reduce overall font size */
}
.con {
  max-width: 800px; /* Reduce maximum width */
  margin: auto;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap; /* Allow flex items to wrap on smaller screens */
  padding: 0 10px; /* Add padding for smaller screens */
}
.footer-content {
  flex: 1 1 150px; /* Allow flex items to grow and shrink, with a minimum width */
  margin-bottom: 10px; /* Add margin for spacing between items */
  text-align: center; /* Center text for smaller screens */
}
.footer-content h3 {
  font-size: 16px; /* Reduce font size of headings */
  margin-bottom: 10px;
}
.footer-content p, .footer-content ul {
  margin: auto;
  padding: 5px;
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
  padding: 5px;
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
  transition-duration: .5s;
}
.list li:hover::before {
  width: 50px;
}
.social-icons {
  text-align: center;
  padding: 0;
}
.social-icons li {
  display: inline-block;
  padding: 3px;
}
.social-icons i {
  color: white;
  font-size: 18px; /* Reduce font size of icons */
}
a {
  text-decoration: none;
  color: inherit; /* Ensure links inherit color */
}
a:hover, .social-icons i:hover {
  color: #f18930;
}
.bottom-bar {
  background: #f18930;
  text-align: center;
  padding: 5px 0; /* Reduce padding */
  margin-top: 20px; /* Reduce margin-top */
}
.bottom-bar p {
  color: #343434;
  margin: 0;
  font-size: 12px; /* Reduce font size */
  padding: 5px;
}
@media screen and (max-width: 767px) {
  .footer-content {
      flex: 1 1 100%; /* Make each footer content take full width on small screens */
  }
  .container {
      flex-direction: column; /* Stack items vertically on small screens */
      align-items: center; /* Center items on small screens */
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
          <a class="nav-link active" aria-current="page" href="lead.php">Resident</a>
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
<!-- services -->
<section class="top-cards">
  <div class="heading2">Ser<span>vices</span></div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 py-3 py-md-0">
        <div class="card text-center">
          <img src="img/clearance.jpg" style="height:15%" class="card-img-top" alt="Barangay Clearance">
          <div class="blur-overlay"></div>
        </div>
      </div>
      <div class="col-md-4 py-3 py-md-0">
        <div class="card text-center">
          <img src="img/certification.jpg" style="height:15%" class="card-img-top" alt="Barangay Certification">
          <div class="blur-overlay"></div>
        </div>
      </div>
      <div class="col-md-4 py-3 py-md-0">
        <div class="card text-center">
          <img src="img/residency.jpg" style="height:15%" class="card-img-top" alt="Certificate of Residency">
          <div class="blur-overlay"></div>
        </div>
      </div>
      <div class="col-md-4 py-3 py-md-0 mt-4">
        <div class="card text-center">
          <img src="img/indigency.jpg" style="height:15%" class="card-img-top" alt="Certificate of Indigency">
          <div class="blur-overlay"></div>
        </div>
      </div>
      <div class="col-md-4 py-3 py-md-0 mt-4">
        <div class="card text-center">
          <img src="img/Business Permit.jpg" style="height:15%" class="card-img-top" alt="Business Permit">
          <div class="blur-overlay"></div>
        </div>
      </div>
      <div class="col-md-4 py-3 py-md-0 mt-4">
        <div class="card text-center">        
            <img src="img/summon.jpg" style="height:30%" class="card-img-top" alt="Summon Certificate">
            <div class="blur-overlay"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- appoinment -->
<section class="appointment-form my-5">
  <div class="container">
    <div class="heading2 text-center mb-4">Appointment Certificate</div>
    <form method="POST" action="" class="p-4 border rounded">
      <div class="form-group">
        <label for="service"> Certification</label>
        <select class="form-control" name="certif" required> 
        <option value="Clearance">Barangay Clearance</option>
          <option value="Certification">Barangay Certification</option>
          <option value="Residency">Residency Certificate</option>
          <option value="Indigency">Indigency Certificate</option>
          <option value="Business Permit">Business Permit</option>
          <option value="Summon Report">Summon</option>
        </select>
      </div>
      <div class="form-group">
        <label>Full Name</label>
        <input type="text" class="form-control"name="mem_name" placeholder="Enter your full name" required>
      </div>
      <div class="form-group">
        <label >Purok</label>
        <select class="form-select" name="purok">
                            <?php
                            $sql = $conn->prepare("SELECT * FROM `purok` ");
                            $sql->execute();
                            while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                              <option value="<?php echo $row['purok_name'] ?>"><?php echo $row['purok_name'] ?></option>
                            <?php } ?>
                          </select>
      </div>
      <div class="form-group">
        <label>Age</label>
        <input type="number" class="form-control"name="age" placeholder="Enter your age" required>
      </div>
      <div class="form-group">
        <label>Appointment Date</label>
        <input  class="form-control" name="appoint_date" value="<?php echo date("Y/m/d");?>" readonly>
      </div>
      <div class="form-group">
        <label >Purpose</label>
        <textarea class="form-control"  name="remark" rows="2"></textarea>
      </div>
      <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary" name="appoint">Submit</button>
      </div>
    </form>
   
  </div>
</section>


<!-- appoinment -->
<!-- services -->
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