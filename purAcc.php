<?php
include 'connection.php'; 
include 'auth.php';

// Query to get all users with pending status (or other conditions you may have)
$sql = $conn->prepare("SELECT * FROM users WHERE status = 'pending'");
$sql->execute();
$pendingUsers = $sql->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['user_id'];
    $action = $_POST['action'];

    // Determine the new status based on the action
    $newStatus = ($action === 'approve') ? 'approved' : 'declined';

    // Update the user's status in the database
    $sql = $conn->prepare("UPDATE users SET status = :status WHERE id = :id");
    $sql->bindParam(':status', $newStatus);
    $sql->bindParam(':id', $userId, PDO::PARAM_INT);

    if ($sql->execute()) {
        // Redirect back to the admin dashboard after the action
        header("Location: purAcc.php"); 
        exit();
    } else {
        echo "Error updating user status.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BARANGAY CAMINGAWAN</title>
  <link href="img/logo2.png" rel="icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="dist/js/bootstrap.bundle.js"></script>

  
  <style>
        * {
            outline: none;
        }

        html, body {
            height: 100%;
            min-height: 100%;
        }

        body {
            margin: 0;
            background-color:transparent;
           
        }

    

        #app-cover {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            width: 400px;
            margin:  auto;
            margin-top: -40px;
        }

        #cover {
            position: relative;
            height: 80px;
            background-color: #25bf2b;
            border-radius: 120px;
            box-shadow: 0 10px 40px #208a23;
            overflow: hidden;
        }

        #key-icon,
        #key-cover,
        #key-dots,
        #show-key {
            position: absolute;
            top: 0;
            bottom: 0;
        }

        #key-icon {
            left: 0;
            width: 23px;
            height: 26px;
            color: #fff;
            font-size: 26px;
            text-align: center;
            line-height: 1;
            padding: 27px 28.63px;
        }

        #key-cover,
        #key-dots {
            left: 80px;
            right: 80px;
        }

        #key-cover {
            z-index: 2;
        }

        #key {
            position: relative;
            left: 6px;
            top: 1px;
            height: 80px;
            font-size: 80px;
            color: #fff;
            letter-spacing: 12px;
            background-color: transparent;
            border: 0;
            line-height: 1;
        }

        #key-dots {
            z-index: 1;
            overflow: hidden;
        }

        #dots {
            position: absolute;
            top: 0;
            right: 0;
            left: 20px;
            height: 80px;
        }

        #key,
        #dots {
            width: 160px;
            margin: 0 auto;
        }

        .dot {
            position: relative;
            top: 50%;
            width: 20px;
            height: 20px;
            float: left;
            margin-right: 20px;
            margin-top: -10px;
            background-color: #1b841f;
            border-radius: 50%;
            transform: scale(1);
            transition: 0.2s ease;
            overflow: hidden;
        }

        .dot:last-child {
            margin-right: 0;
        }

        #key-dots.active .dot {
            transform: scale(1.7);
        }

        #show-key {
            right: 20px;
        }

        #show-key i.fas {
            display: block;
            width: 26px;
            height: 27px;
            color: #fff;
            font-size: 23px;
            padding: 28.5px 27.07px;
        }

        .bn {
    position: relative;
    display: block; 
    margin: 20px auto; 
    width: 160px; 
    height: 50px; 
    font-size: 16px; 
    background-color: #25bf2b; 
    color: #fff; 
    border: none; 
    border-radius: 25px; 
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); 
    cursor: pointer; 
    transition: background-color 0.3s, transform 0.2s; 
}

.bn:hover {
    background-color: #208a23; 
    transform: scale(1.05); 
}

.bn:active {
    background-color: #1b841f; 
    transform: scale(1); 
}

        
    </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
 
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link btn btn-primary text-white" href="logout.php" role="button">
            <span>Logout</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <div class="brand-link p-3">
        <span class="brand-text font-weight-light" style="font-size: 18px;"><b>BARANGAY CAMINGAWAN</b></span>
      </div>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- User Panel -->
        <div class="user-panel mt-3 pb-4 mb-3 d-flex align-items-center">
          <div class="image">
            <img src="img/logo2.png" class="img-fluid ms-5" alt="User Image" style="width: 30%;">
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p class="fs-5 ms-4">Dashboard</p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="household.php" class="nav-link">
                <i class="nav-icon fas fa-home fs-4"></i>
                <p class="fs-5 ms-3">Household</p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="resident.php" class="nav-link">
                <i class="nav-icon fas fa-users fs-4"></i>
                <p class="fs-5 ms-3">Resident</p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="blotter.php" class="nav-link">
                <i class="nav-icon fas fa-user fs-4"></i>
                <p class="fs-5 ms-3">Blotter</p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="purok.php" class="nav-link">
                <i class="nav-icon fa-solid fa-signs-post fs-4"></i>
                <p class="fs-5 ms-3">Purok</p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file fs-4"></i>
              <p class="fs-5 ms-3">
                Documents
                <i class="right fas fa-angle-left"></i>
              </p>
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="document.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Certificates</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="app.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Appointment</p>
                </a>
              </li>
              </ul>
            </li>
            <li class="nav-item mt-2">
              <a href="report.php" class="nav-link">
                <i class="nav-icon fas fa-file fs-4"></i>
                <p class="fs-5 ms-3">Reports</p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="purAcc.php" class="nav-link">
                <i class="nav-icon fa-solid fa-unlock fs-4"></i>
                <p class="fs-5 ms-3">Officials Access</p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="official.php" class="nav-link">
                <i class="nav-icon fas fa-users fs-4"></i>
                <p class="fs-5 ms-3">Barangay Officials</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Officials Access</h1>
            </div>
          </div>
        </div>
      </div>
      <!-- /.content-header -->
      
      <div class="container-fluid">
        <div class="row">
        <div class="table-responsive mt-4">
    <div id="tim">
        <table id="datatable" class="table table-bordered border-dark table-striped">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Purok</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Date Registered</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
          $sql = $conn->prepare("SELECT id, name, email, purok, role, status, date FROM users ORDER BY id DESC");
                $sql->execute();
                $users = $sql->fetchAll(PDO::FETCH_ASSOC);

                foreach ($users as $row): ?>
                    <tr>
                        <td class="text-center"><?php echo htmlspecialchars($row['name']); ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($row['email']); ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($row['purok']); ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($row['role']); ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($row['status']); ?></td>
                        <td class="text-center"><small><i><?php echo htmlspecialchars($row['date']); ?></i></small></td>
                        <td class="text-center">
                            <?php if ($row['status'] == 'pending'): ?>
                                <form method="POST" action="" style="display:inline-block;">
                                    <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="action" value="approve" class="btn btn-success">Approve</button>
                                    <button type="submit" name="action" value="decline" class="btn btn-warning">Decline</button>
                                </form>
                            <?php endif; ?>
                            
                            <?php
  $currentMonth = date("m"); // Get the current month (01-12)

  // Define start and end periods
  $disableStart = ($currentMonth == "05");
  $disableEnd = ($currentMonth == "06");   

  // Check if the button should be disabled
  $disabled = $disableStart ? 'disabled' : '';
?>                                
  
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#passUser" data-id="<?php echo $row['id']; ?>" <?php echo $disabled; ?>>
  <i class="bi bi-trash"></i>
  <span>Delete</span> 
</button>

<?php if ($disableStart): ?>
    <small class="text-muted">Button will be available in June.</small>
<?php endif; ?>  
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function () {
                let table = $('#datatable').DataTable();
        function refreshTable() {
            $.ajax({
                url: 'purAcc.php', 
                type: 'GET',
                success: function (data) {
       const newContent = $(data).find('#tim').html();
                    $('#tim').html(newContent);
                    table.destroy();
                    table = $('#datatable').DataTable();
                },
                error: function (xhr, status, error) {
                    console.error('Error refreshing table:', error);
                },
                complete: function () {
                    setTimeout(refreshTable, 30000);
                }
            });
        }
        refreshTable();
    });
</script>

        </div>
      </div>
       
<!-- Password Modal -->
<div class="modal fade" id="passUser" tabindex="-1" aria-labelledby="passUserLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: transparent; border: none; box-shadow: none;">
      <div class="modal-body text-center">
      <div id="app-cover">
    <div id="cover">
        <i class="fas fa-lock" id="key-icon"></i>
        <form method="POST" action="function.php" id="key-cover">
            <input type="hidden" name="action" value="unlock"> 
            <input type="password" name="password" id="key" maxlength="4" required>
        </form>
        <div id="key-dots">
            <div id="dots">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>
        <div id="show-key">
            <i class="fas fa-eye-slash"></i>
        </div>
    </div> 
  
    <button type="button" name="ok" class="bn" id="valButton">Submit</button> 
    <a href="change_pass.php" class="d-block mt-3 text-white" style="font-size: large;">Privacy Password </a>
</div>
<script>
    $(document).ready(function () {
        const keyInput = $("#key");
        const showKey = $("#show-key");
        const dot = $(".dot");
        let viewPass = false;

        // Update dots based on input
        function updateKey() {
            const keyArr = keyInput.val().split("");
            dot.removeClass("white").text(""); // Clear all dots

            // Update dots with characters from input
            keyArr.forEach((char, index) => {
                if (index < 4) {
                    dot.eq(index).addClass("white").text(char);
                }
            });
        }

        // Toggle password visibility
        function toggleView() {
            viewPass = !viewPass; // Switch the flag
            showKey.find("i").toggleClass("fa-eye fa-eye-slash"); // Toggle icon
            keyInput.attr("type", viewPass ? "text" : "password"); // Toggle input type
        }

        // Event listeners
        keyInput.on("keyup", updateKey); // Update dots on keyup
        showKey.on("click", toggleView); // Toggle visibility on click
    });
</script>

      </div>
    </div>
</div>
 </div> 


<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteuserModal" tabindex="-1" aria-labelledby="deleteuserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteuserModalLabel">Delete Confirmation</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete the selected data?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form method="POST" action="function.php" id="deleteForm">
          <input type="hidden" name="id" id="id" value="">
          <button type="submit" class="btn btn-primary" name="u_del">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript for Handling Modals -->
<script>
 var usersId = document.querySelector('[data-bs-target="#passUser"]').getAttribute('data-id');
var idIdInput = document.getElementById('id');
idIdInput.value = usersId;

// Add event listener for the submit button inside the passcode modal
var valButton = document.getElementById('valButton');
valButton.addEventListener('click', function () {
    var passwordInput = document.querySelector('input[name="password"]');
    var password = passwordInput.value;

    if (password.trim() === '') {
        alert('Password is required!');
        return;
    }

    // Use AJAX to validate the password against the backend
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'function.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                // Password is valid, show the delete modal
                var passUserModal = bootstrap.Modal.getInstance(document.getElementById('passUser'));
                passUserModal.hide(); // Hide the passcode modal

                var deleteModalInstance = new bootstrap.Modal(document.getElementById('deleteuserModal'));
                deleteModalInstance.show(); // Show the delete modal
            } else {
                // Invalid password
                alert(response.message || 'Invalid password!');
            }
        } else {
            alert('An error occurred while validating the password.');
        }
    };

    xhr.send('password=' + encodeURIComponent(password));
});
</script>
      <script>
    document.querySelectorAll('.approve-btn').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            window.location.href = `purAcc.php?action=approve&id=${id}`;
        });
    });

    document.querySelectorAll('.decline-btn').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            window.location.href = `purAcc.php?action=decline&id=${id}`;
        });
    });
</script>

    </div>

  </div>
</body>
</html>
