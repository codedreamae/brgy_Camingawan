<?php
include 'connection.php';
include 'auth.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'member') { // Fixed condition
    header('Location: login.php');
    exit;
}




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

    echo "<script>alert('Your appointment request has been sent!'); window.location.href='upep.php';</script>";
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
    <link rel="stylesheet" href="ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
    <style>
        .notification-container { position: relative; display: inline-block; }
        .bell-icon { font-size: 24px; cursor: pointer; position: relative; }
        .badge { position: absolute; top: -5px; right: -5px; background: red; color: white; padding: 5px 10px; border-radius: 50%; font-size: 12px; display: none; }
        .notification-dropdown { display: none; position: absolute; top: 30px; right: 0; background: white; border: 1px solid #ccc; width: 250px; max-height: 300px; overflow-y: auto; box-shadow: 0 0 10px rgba(0,0,0,0.2); }
        .notification-dropdown ul { list-style: none; padding: 0; margin: 0; }
        .notification-dropdown li { padding: 10px; border-bottom: 1px solid #ddd; }
        .notification-dropdown li:hover { background: #f5f5f5; cursor: pointer; }
    </style>
  </head>
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
      <li class="nav-item dropdown"  data-bs-toggle="tooltip" data-bs-target="custom-tooltip" data-bs-placement="right" title="Mga Notipikasyon">
       <a class="nav-link" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="notification-container position-relative">
            <i class="fa fa-bell bell-icon"></i>
            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle" id="notification-count">0</span>
        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end p-2" aria-labelledby="notificationDropdown" id="notification-dropdown">
        <li><h6 class="dropdown-header">Notifications</h6></li>
        <ul id="notification-list" class="list-unstyled mb-0"></ul>
    </ul>
</li>

<script>
function fetchNotifications() {
    $.ajax({
        url: 'notifications.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log(response); // Debugging

            $("#notification-list").empty();
            $("#notification-count").text(response.count).toggle(response.count > 0);

            if (response.count > 0) {
                response.notifications.forEach(notification => {
                    $("#notification-list").append(`
                        <li class="dropdown-item d-flex justify-content-between align-items-center">
                            <span>${notification.message}</span>
                            <button class="btn btn-sm btn-outline-danger mark-as-read" data-id="${notification.id}">X</button>
                        </li>
                    `);
                });
            } else {
                $("#notification-list").html('<li class="dropdown-item text-muted">No new notifications</li>');
            }
        }
    });
}

 // Close notification when button is clicked
 $(document).on('click', '.mark-as-read', function () {
        let notificationId = $(this).data('id');
        let notifItem = $(this).parent();

        $.ajax({
            url: 'delete_notif.php',
            type: 'POST',
            data: { notification_id: notificationId },
            success: function (response) {
                notifItem.fadeOut(300, function () {
                    $(this).remove();
                    fetchNotifications();
                });
            }
        });
    });

// Handle click event for dynamically added buttons
$(document).on("click", ".mark-as-read", function () {
    let notifId = $(this).data("id");
    markAsRead(notifId);
});

function markAsRead(notifId) {
    $.ajax({
        url: 'mark_notification_read.php',
        method: 'POST',
        data: { id: notifId },
        success: function () {
            fetchNotifications(); // Refresh notifications
        }
    });
}

// Fetch notifications every 5 seconds
setInterval(fetchNotifications, 5000);
fetchNotifications();

</script>


        <li class="nav-item">
          <a class="nav-link active" data-bs-toggle="tooltip" data-bs-target="custom-tooltip" data-bs-placement="right" title="Home Page" aria-current="page" href="upep.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" data-bs-toggle="tooltip" data-bs-target="custom-tooltip" data-bs-placement="right" title="Parte sa Amon" href="aboutus.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" data-bs-toggle="tooltip" data-bs-target="custom-tooltip" data-bs-placement="right" title="Mga Serbisyo" href="services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" data-bs-toggle="tooltip" data-bs-target="custom-tooltip" data-bs-placement="right" title="Tan-awa ang mga Kontak" href="contacts.php">Contacts</a>
        </li>
      
        <li class="nav-item dropdown" data-bs-toggle="tooltip" data-bs-target="custom-tooltip" data-bs-placement="right" title="Pagdumala sang Profile">
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
  <!-- home section -->
<section class="home">
    <div class="content">
        <h1>Welcome To Barangay <br> Camingawan.!!</h1>
        <i> <p>Treat people the way you 
           <br> like to be treated.!! 
        </p></i>
    </div>
</section>
<!-- home section -->
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
            <img src="img/summon.jpg" style="height:5%" class="card-img-top" alt="Summon Certificate">
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
        <label> Certification</label>
        <select class="form-control" name="certif" required> 
        <option value="Clearance">Barangay Clearance</option>
          <option value="Certification">Barangay Certification</option>
          <option value="Residency">Residency Certificate</option>
          <option value="Indigency">Indigency Certificate</option>
          <option value="Business Permit">Business Permit</option>
          <option value="Summon">Summon</option>
        </select>
      </div>
      <div class="form-group">
        <label>Full Name</label>
        <input type="text" class="form-control"  name="mem_name" placeholder="Enter your full name" required>
      </div>
      <div class="form-group">
      <label>Purok:</label>
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
        <input type="text" class="form-control"  name="age" placeholder="Enter your age" required>
      </div>
      <div class="form-group">
        <label>Appointment Date</label>
        <input  class="form-control" name="appoint_date" value="<?php echo date("Y/m/d");?>" readonly>
      </div>
      <div class="form-group">
        <label>Purpose</label>
        <textarea class="form-control"  name="remark" rows="2"></textarea>
      </div>
      <div class="text-center mt-3">
        <button type="submit" data-bs-toggle="tooltip" data-bs-target="custom-tooltip" data-bs-placement="right" title="Palihog sumite sang imo impromasyon" class="btn btn-primary" name="appoint">Submit</button>
      </div>
    </form>
  </div>
</section>
<!-- appoinment -->
<!-- services -->
<!-- contact -->
<section class="contact" id="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
       <div class="heading6"> Our <span>Location</span></div>
      <img style="width: 600px;" src="img/caming.jpg" alt="">
      </div>
      <div class="col-md-5" id="col">
        <h1>Contact <span>Us</span></h1>
        <p><i class="fa-regular fas fa-envelope"></i> kabankalan.camingawan@gmail.com</p>
        <p><i class="fa-solid fas fa-phone"></i> 09602016125</p>
       <p>Location
        We are located at:
        Brgy.Camingawan,Kabankalan, City, Negros Occidental.</p>
      </div>
    </div>
  </div>
</section>
<!-- contact -->
<!-- footer -->
<footer>
  <div class="con">
    <div class="footer-content">
      <h3>Contact Us</h3>
      <ul class="list">
        <li>Email: kabankalan.camingawan@gmail.com</li>
        <li>Address: Brgy. Camingawan, Kabankalan City</li>
        <li>Phone#: 09602016125</li>
      </ul>
    </div>
    <div class="footer-content">
      <h3>Quick Links</h3>
      <ul class="list">
        <li><a href="upep.php">Home</a></li>
        <li><a href="aboutus.php">About</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="contacts.php">Contact</a></li>
      </ul>
    </div>
    <div class="footer-content">
      <h3>Follow Us</h3>
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