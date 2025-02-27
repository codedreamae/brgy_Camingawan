<?php
include 'connection.php';
include 'auth.php';


if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit;
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
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
 <!--
  <?php if(isset($_SESSION['msg']['success']) && !empty($_SESSION['msg']['success'])): ?>
    <div class="message-success">
      <?php 
        echo $_SESSION['msg']['success'];
        unset($_SESSION['msg']['success']);
      ?>
    </div>
  <?php endif; ?>

  <?php echo $current_time; ?>
  -->
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
              <h1 class="m-0">Dashboard</h1>
            </div>
          </div>
        </div>
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                <div class="inner" id="houbox">
                  <h5 class="mt-3"><i class="nav-icon fas fa-home fs-3"></i>
                    <span class="ms-2"><b>TOTAL HOUSEHOLD</b></span>
                  </h5>
                  <h3 class="mt-2 text-center">
                    <span>
                      <?php 
                        $sql = $conn->query("SELECT COUNT(*) as total FROM household");
                        $num_rows = $sql->fetch(PDO::FETCH_ASSOC);
                        echo $num_rows['total'];
                      ?>
                    </span>
                  </h3>
                </div>
                <a href="household.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <script>
    $(document).ready(function () {
        function refreshTable() {
            $.ajax({
                url: 'dashboard.php', 
                type: 'GET',
                success: function (data) {
                   
                    const newContent = $(data).find('#houbox').html();
                    $('#houbox').html(newContent);
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
           
            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner" id="rebox">
                  <h4 class="mt-3"><i class="fa fa-users fs-3"></i>
                    <span class="ms-2">TOTAL RESIDENT</span>
                  </h4>
                  <h3 class="mt-2 text-center">
                    <span>
                      <?php 
                        $sql = $conn->query("SELECT COUNT(*) as total FROM personal_info");
                        $num_rows = $sql->fetch(PDO::FETCH_ASSOC);
                        echo $num_rows['total'];
                      ?>
                    </span>
                  </h3>
                </div>
                <a href="resident.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <script>
    $(document).ready(function () {
        function refreshTable() {
            $.ajax({
                url: 'dashboard.php', 
                type: 'GET',
                success: function (data) {
                   
                    const newContent = $(data).find('#rebox').html();
                    $('#rebox').html(newContent);
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
        
            <div class="col-lg-3 col-6">
              <div class="small-box bg-secondary">
                <div class="inner" id="blobox">
                  <h4 class="mt-3"><i class="fa fa-user fs-3"></i>
                    <span class="ms-2">TOTAL BLOTTER</span>
                  </h4>
                  <h3 class="mt-2 text-center">
                    <span>
                      <?php 
                        $sql = $conn->query("SELECT COUNT(*) as total FROM blotter");
                        $num_rows = $sql->fetch(PDO::FETCH_ASSOC);
                        echo $num_rows['total'];
                      ?>
                    </span>
                  </h3>
                </div>
                <a href="blotter.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <script>
    $(document).ready(function () {
        function refreshTable() {
            $.ajax({
                url: 'dashboard.php', 
                type: 'GET',
                success: function (data) {
                   
                    const newContent = $(data).find('#blobox').html();
                    $('#blobox').html(newContent);
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
            <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                <div class="inner" id="purbox">
                  <h4 class="mt-3 text-white">
                    <i class="fa-solid fa-signs-post"></i>
                    <span class="ms-2">TOTAL PUROK</span>
                  </h4>
                  <h3 class="mt-2 text-white text-center">
                    <span>
                      <?php
                        $sql = $conn->query("SELECT COUNT(*) as total FROM purok");
                        $num_rows = $sql->fetch(PDO::FETCH_ASSOC);
                        echo $num_rows['total'];
                      ?>
                    </span>
                  </h3>
                </div>
                <a href="purok.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <script>
    $(document).ready(function () {
        function refreshTable() {
            $.ajax({
                url: 'dashboard.php', 
                type: 'GET',
                success: function (data) {
                   
                    const newContent = $(data).find('#purbox').html();
                    $('#purbox').html(newContent);
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
      </section>
     
    </div>
    
  </div>

 </body>
</html>
