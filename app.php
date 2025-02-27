<?php
include 'connection.php'; 
include 'auth.php';

// Fetch pending appointments
$sql = $conn->prepare("SELECT * FROM appointment WHERE app_stat = 'pending'");
$sql->execute();
$pendingUsers = $sql->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['user_id'];
    $action = $_POST['action'];

    // Determine the new status based on the action
    $newStatus = ($action === 'approve') ? 'approved' : 'declined';

    // Update the user's appointment status
    $sql = $conn->prepare("UPDATE appointment SET app_stat = :app_stat WHERE app_id = :app_id");
    $sql->bindParam(':app_stat', $newStatus);
    $sql->bindParam(':app_id', $userId, PDO::PARAM_INT);

    if ($sql->execute()) {
        // Insert a new notification into `unotif` table
        $message = "Your appointment has been " . $newStatus . ".";
        $notif_sql = $conn->prepare("INSERT INTO unotif (user_id, message, status, type, created_at) VALUES (:user_id, :message, 'unread', 'info', NOW())");
        $notif_sql->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $notif_sql->bindParam(':message', $message);
        $notif_sql->execute();

        // Redirect back to the admin dashboard
        header("Location: app.php"); 
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
  .badge-danger {
    background-color: red;
    color: white;
    padding: 3px 7px;
    border-radius: 50%;
    font-size: 12px;
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
      <li class="nav-item dropdown">
    <a class="nav-link" id="notification-btn" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-bell"></i>
        <span class="badge badge-warning navbar-badge" id="notif-count">0</span>
    </a>
    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right" id="notif-dropdown">
        <span class="dropdown-item dropdown-header">Notifications</span>
        <div class="dropdown-divider"></div>
        <div id="notif-list"></div>
    </div>
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
    <script>
$(document).ready(function () {
    function fetchNotifications() {
        $.ajax({
            url: 'fetch_notifications.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#notif-count').text(data.count);
                let notifList = $('#notif-list');
                notifList.empty();

                if (data.count > 0) {
                    data.notifications.forEach(function (notif) {
                        notifList.append(`
                            <div class="dropdown-item d-flex justify-content-between align-items-center">
                              <span>${notif.message}</span>
                              <button class="btn btn-sm  close-notif" data-id="${notif.id}">&times;</button>
                              <style>
                                .close-notif:hover {
                                  background-color: darkred;
                                }
                              </style>
                            </div>
                        `);
                    });
                } else {
                    notifList.append('<p class="dropdown-item">No new notifications</p>');
                }
            }
        });
    }

    // Close notification when button is clicked
    $(document).on('click', '.close-notif', function () {
        let notifId = $(this).data('id');
        let notifItem = $(this).parent();

        $.ajax({
            url: 'delete_notification.php',
            type: 'POST',
            data: { notif_id: notifId },
            success: function (response) {
                notifItem.fadeOut(300, function () {
                    $(this).remove();
                    fetchNotifications();
                });
            }
        });
    });

    // Mark notifications as read when bell icon is clicked
    $('#notification-btn').click(function () {
        $.ajax({
            url: 'update_notifications.php',
            type: 'POST',
            success: function () {
                fetchNotifications();
            }
        });
    });

    // Fetch notifications every 5 seconds
    setInterval(fetchNotifications, 30000);
    fetchNotifications();
});
</script>

    <?php
    if (isset($_GET['status'])) {
      if ($_GET['status'] == 'delete_success') {
        echo '
        <div class="position-fixed top-2 end-0 p-3" style="z-index: 1050;">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Appointment deleted successfully!
            <a class="text-decoration-none btn-close float-end" aria-label="Close" href="app.php"></a>
          </div>
        </div>';
      } elseif ($_GET['status'] == 'delete_error') {
        echo '
        <div class="position-fixed top-2 end-0 p-3" style="z-index: 1050;">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            There was an error deleting the appointment. Please try again.
            <a class="text-decoration-none btn-close float-end" aria-label="Close" href="app.php"></a>
          </div>
        </div>';
      }
    }
    ?>


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
              <h1 class="m-0">Appointment Requets</h1>
            </div>
          </div>
        </div>
      </div>
      <!-- /.content-header -->
      <div class="container-fluid">
        <div class="row">
        <div class="table-responsive mt-4">
    <div id="appt">
        <table id="datatable" class="table table-bordered border-dark table-striped">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Date</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Age</th>
                    <th class="text-center">Purok</th>
                    <th class="text-center">Certificates</th>
                    <th class="text-center">Purpose</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
          $sql = $conn->prepare("SELECT app_id, appoint_date, mem_name, age, purok, certif, remark, app_stat FROM appointment ORDER BY app_id DESC");
                $sql->execute();
                $users = $sql->fetchAll(PDO::FETCH_ASSOC);

                foreach ($users as $row): ?>
                    <tr>
                      <td class="text-center"><small><i><?php echo htmlspecialchars($row['appoint_date']); ?></i></small></td>
                        <td class="text-center"><?php echo htmlspecialchars($row['mem_name']); ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($row['age']); ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($row['purok']); ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($row['certif']); ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($row['remark']); ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($row['app_stat']); ?></td>
                        
                        <td class="text-center">
                            <?php if ($row['app_stat'] == 'pending'): ?>
                                <form method="POST" action="" style="display:inline-block;">
                                    <input type="hidden" name="user_id" value="<?php echo $row['app_id']; ?>">
                                    <button type="submit" name="action" value="approve" class="btn btn-success">Approve</button>
                                    <button type="submit" name="action" value="decline" class="btn btn-warning">Decline</button>
                                </form>
                            <?php endif; ?> 
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#appdelModal" data-id="<?php echo $row['app_id']; ?>">
                        <i class="bi bi-trash"></i>
                        <span>Delete</span>
                      </button>
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
                url: 'app.php', 
                type: 'GET',
                success: function (data) {
       const newContent = $(data).find('#appt').html();
                    $('#appt').html(newContent);
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
   
 <!-- Delete Modal -->
 <div class="modal fade" id="appdelModal" tabindex="-1" aria-labelledby="appdelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="appdelModalLabel">Delete Confirmation</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete the selected data?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
              <form method="POST" action="function.php" id="deleteForm">
                <input type="hidden" name="app_id" id="app_id" value="">
                <button type="submit" class="btn btn-primary" name="appoint_del">Yes</button>
              </form>
            </div>
          </div>
        </div>
      </div>


     
      <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        
        // Handle delete modal
        var deleteModal = document.getElementById('appdelModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var appointmentId = button.getAttribute('data-id');
            var appIdInput = document.getElementById('app_id');
            appIdInput.value = appointmentId;
        });
    });
</script>



<!-- JavaScript for Handling Modals -->

      <script>
    document.querySelectorAll('.approve-btn').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            window.location.href = `app.php?action=approve&id=${app_id}`;
        });
    });

    document.querySelectorAll('.decline-btn').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            window.location.href = `app.php?action=decline&id=${app_id}`;
        });
    });
</script>
    </div>
  </div>
</body>
</html>
