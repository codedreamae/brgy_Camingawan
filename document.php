<?php
include('auth.php');
 include 'connection.php';
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+57mN4Q4pI5tyBmH7ZivO59SmHY9I" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/js/jquery.overlayScrollbars.min.js" integrity="sha384-X5XYO5sZ5h3Aq/zyX5Xh0bONoI2xF8mXFNFFLCPBeSuyUsS7EoP26L45ePxFzZ1J" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>  
  <script src="dist/js/Script.js"></script>
  <script src="dist/js/pages/dashboard.js"></script>
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
      <div class="brand-link p-3">
        <span class="brand-text font-weight-light" style="font-size: 18px;"><b>BARANGAY CAMINGAWAN</b></span>
      </div>
      <!-- Sidebar -->
      <div class="sidebar">
        <div class="user-panel mt-3 pb-4 mb-3 d-flex">
          <div class="image">
            <img src="img/logo2.png" class="ms-5" style="width: 30%; height: auto;">
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
              <h1 class="m-0">Documents</h1>
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
                <div class="inner" id="clebox">
                  <h4 class="mt-3"><i class="fa fa-file fs-3"></i>
                    <span>CLEARANCE</span>
                  </h4>
                  <h3 class="mt-2 text-center">
                    <span>
                      <?php 
                        $sql = $conn->query("SELECT COUNT(*) as total FROM clearance");
                        $num_rows = $sql->fetch(PDO::FETCH_ASSOC);
                        echo $num_rows['total'];
                      ?>
                    </span>
                  </h3>
                </div>
                <a href="clearance.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <script>
    $(document).ready(function () {
        function refreshTable() {
            $.ajax({
                url: 'document.php', 
                type: 'GET',
                success: function (data) {
                   
                    const newContent = $(data).find('#clebox').html();
                    $('#clebox').html(newContent);
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
                <div class="inner" id="cerbox">
                  <h4 class="mt-3"><i class="fa fa-file fs-3"></i>
                    <span class="ms-2">CERTIFICATE</span>
                  </h4>
                  <h3 class="mt-2 text-center">
                    <span>
                      <?php 
                        $sql = $conn->query("SELECT COUNT(*) as total FROM certificate");
                        $num_rows = $sql->fetch(PDO::FETCH_ASSOC);
                        echo $num_rows['total'];
                      ?>
                    </span>
                  </h3>
                </div>
                <a href="certificate.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>  
            <script>
    $(document).ready(function () {
        function refreshTable() {
            $.ajax({
                url: 'document.php', 
                type: 'GET',
                success: function (data) {
                   
                    const newContent = $(data).find('#cerbox').html();
                    $('#cerbox').html(newContent);
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
                <div class="inner" id="resibox">
                  <h4 class="mt-3"><i class="fa fa-file fs-3"></i>
                    <span class="ms-2">RESIDENCY</span>
                  </h4>
                  <h3 class="mt-2 text-center">
                    <span>
                      <?php 
                        $sql = $conn->query("SELECT COUNT(*) as total FROM residency");
                        $num_rows = $sql->fetch(PDO::FETCH_ASSOC);
                        echo $num_rows['total'];
                      ?>
                    </span>
                  </h3>
                </div>
                <a href="residency.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <script>
    $(document).ready(function () {
        function refreshTable() {
            $.ajax({
                url: 'document.php', 
                type: 'GET',
                success: function (data) {
                   
                    const newContent = $(data).find('#resibox').html();
                    $('#resibox').html(newContent);
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
                <div class="inner" id="inbox">
                  <h4 class="mt-3 text-white"><i class="fa fa-file fs-3"></i>
                    <span class="ms-4">INDIGENCY</span>
                  </h4>
                  <h3 class="mt-2 text-center">
                    <span>
                      <?php 
                        $sql = $conn->query("SELECT COUNT(*) as total FROM indigency");
                        $num_rows = $sql->fetch(PDO::FETCH_ASSOC);
                        echo $num_rows['total'];
                      ?>
                    </span>
                  </h3>
                </div>
                <a href="indigency.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            
            <script>
    $(document).ready(function () {
        function refreshTable() {
            $.ajax({
                url: 'document.php', 
                type: 'GET',
                success: function (data) {
                   
                    const newContent = $(data).find('#inbox').html();
                    $('#inbox').html(newContent);
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
                <div class="inner" id="busbox">
                  <h4 class="mt-3 text-white"><i class="fa fa-file fs-4"></i>
                    <span class="ms-3">BUSSINESS</span>
                    <br>
                      <span class="ms-5"> PERMIT</span>
                  </h4>
                  <h3 class="mt-2 text-center">
                    <span>
                      <?php 
                        $sql = $conn->query("SELECT COUNT(*) as total FROM business");
                        $num_rows = $sql->fetch(PDO::FETCH_ASSOC);
                        echo $num_rows['total'];
                      ?>
                    </span>
                  </h3>
                </div>
                <a href="business.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <script>
    $(document).ready(function () {
        function refreshTable() {
            $.ajax({
                url: 'document.php', 
                type: 'GET',
                success: function (data) {
                   
                    const newContent = $(data).find('#busbox').html();
                    $('#busbox').html(newContent);
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
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </div>

</body>
</html>
