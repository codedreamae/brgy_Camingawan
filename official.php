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
          <a class="nav-link btn btn-primary text-white px-2 mx-2" href="logout.php" role="button">
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


    <?php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
          echo '
            <div class="alert alert-success float-end mt-3 mx-2" style="width: 30%;" role="alert">
                Barangay official added successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="official.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error adding the Barangay official. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="official.php"></a>
            </div>';
        }
      }
    ?>

<?php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == 'update_success') {
          echo '
            <div class="alert alert-success float-end mt-3 mx-2" style="width: 30%;" role="alert">
                Barangay official updated successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="official.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'update_error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error updating the Barangay official. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="official.php"></a>
            </div>';
        }
      }
    ?>

<?php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == 'delete_success') {
          echo '
            <div class="alert alert-success float-end mt-3 mx-2" style="width: 30%;" role="alert">
                Barangay official deleted successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="official.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'delete_error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error deleting the Barangay official. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="official.php"></a>
            </div>';
        }
      }
    ?>

 
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 fs-2">Barangay Officials</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section>
        <div class="container-fluid">
          <div class="row">
            <div class="col d-flex justify-content-end">
              <button type="button" class="btn btn-primary mt-5 float-end" data-bs-toggle="modal" data-bs-target="#listModal">
                <i class="bi bi-plus-square-fill my-2"></i>
                <span>Officials</span>
              </button>
              <!-- Modal -->
              <form method="POST" action="function.php">   
                <div class="modal fade" id="listModal" tabindex="-1" aria-labelledby="listModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="listModalLabel">Barangay Officials</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                    <div>
                              <div class="mb-2">
                          <label class="mt-3">Full Name:</label>
                          <input class="form-control" type="text" placeholder="" name="name" required/>			
                        </div>
                        <div class="mb-2">
                          <label>Position:</label>
                          <select class="form-select" name="position">
                            <option value="Captain">Captain</option>
                            <option value="Kagawad">Kagawad</option>
                        </select>
                        </div>
                        <div class="mb-2">
                          <label>Contact:</label>
                          <input class="form-control" type="text" placeholder="" name="contact" required/> 			
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="official_add" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>   
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

      <div class="container-fluid">
        <div class="row">
          <div id="ofload">
          <div class="table-responsive mt-4">
            <table id="datatable" class="table table-bordered border-dark table-striped">
              <thead class="table-primary">
                <tr> 
                  <th class="text-center" style="width: 20%;">Name</th>
                  <th class="text-center" style="width: 20%;">Position</th>
                  <th class="text-center" style="width: 20%;">Contact</th>
                
                  <th class="text-center" style="width: 20%">Action</th>
                </tr>
              </thead>
              <tbody class="table table-hover">
                <?php
                $sql = $conn->prepare("SELECT * FROM `official` ORDER BY `f_id` DESC");
                $sql->execute();
                while ($row = $sql->fetch()) {
                ?>
                  <tr>
                    <td class="text-center"><?php echo $row['name'] ?></td>
                    <td class="text-center"><?php echo $row['position'] ?></td>
                    <td class="text-center"><?php echo $row['contact'] ?></td>
                    <td class="text-center">
                      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#offModal" data-id="<?php echo $row['f_id']; ?>"  data-name="<?php echo $row['name']; ?>" data-position="<?php echo $row['position']; ?>" data-contact="<?php echo $row['contact']; ?>" >
                        <i class="bi bi-pencil-fill"></i>
                        <span>Edit</span>
                      </button>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#opsModal" data-id="<?php echo $row['f_id']; ?>">
                        <i class="bi bi-trash"></i>
                        <span>Delete</span>
                      </button>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
          </div>
          <script>
    $(document).ready(function () {
                let table = $('#datatable').DataTable();
        function refreshTable() {
            $.ajax({
                url: 'official.php', 
                type: 'GET',
                success: function (data) {
       const newContent = $(data).find('#ofload').html();
                    $('#ofload').html(newContent);
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

      <?php
    				if(ISSET($_GET['f_id'])){
    					$f_id = $_GET['f_id'];
    					$sql = $conn->prepare("SELECT * FROM `official` WHERE `f_id`='$f_id'");
    					$sql->execute();
    					$row = $sql->fetch();
    				}
    			?>

      
          <!-- Edit Modal -->
<form method="POST" action="function.php?f_id=<?php echo $f_id?>">
    <div class="modal fade" id="offModal" tabindex="-1" aria-labelledby="offModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="offModalLabel">Barangay Officials</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-2">
                    <input type="hidden" id="edit_f_id" name="f_id">
                  </div>

                    <div class="mb-2">
                        <label>Full Name:</label>
                        <input class="form-control" type="text" name="name" id="edit_name" value ="<?php echo $row['name']?>" required/>          
                    </div>
                    
                    <div class="mb-2">
                        <label>Position:</label>
                        <select class="form-control" type="text" name="position" id="edit_position" value ="<?php echo $row['position']?>">          
                            <option value="Captain">Captain</option>
                            <option value="Kagawad">Kagawad</option>
              </select>
                      </div>
                        <label>Contact:</label>
                        <input class="form-control" type="text" name="contact" id="edit_contact" value ="<?php echo $row['contact']?>" required/> 
                    </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="official_update" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>   
    </div>
  </div>
</form>


      <!-- Delete Modal -->
      <div class="modal fade" id="opsModal" tabindex="-1" aria-labelledby="opsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="opsModalLabel">Delete Confirmation</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete the selected barangay official?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
              <form method="POST" action="function.php" id="deleteForm">
                <input type="hidden" name="f_id" id="f_id" value="">
                <button type="submit" class="btn btn-primary" name="official_del">Yes</button>
              </form>
            </div>
          </div>
        </div>
      </div>


     
      <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Handle edit modal
        var editModal = document.getElementById('offModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var fId = button.getAttribute('data-id');
            var name = button.getAttribute('data-name');
            var position = button.getAttribute('data-position');
            var contact = button.getAttribute('data-contact');

            document.getElementById('edit_f_id').value = fId;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_position').value = position;
            document.getElementById('edit_contact').value = contact;
        });

        // Handle delete modal
        var deleteModal = document.getElementById('opsModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var officialId = button.getAttribute('data-id');
            var fIdInput = document.getElementById('f_id');
            fIdInput.value = officialId;
        });
    });
</script>


      <script>
        $.widget.bridge('uibutton', $.ui.button)
      </script>
  </div>
</body>
</html>
