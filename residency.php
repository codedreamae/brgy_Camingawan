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
                residency added successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="residency.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error adding the residency. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="residency.php"></a>
            </div>';
        }
      }
    ?>

<?php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == 'update_success') {
          echo '
            <div class="alert alert-success float-end mt-3 mx-2" style="width: 30%;" role="alert">
                residency updated successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="residency.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'update_error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error updating the residency. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="residency.php"></a>
            </div>';
        }
      }
    ?>

<?php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == 'delete_success') {
          echo '
            <div class="alert alert-success float-end mt-3 mx-2" style="width: 30%;" role="alert">
                residency deleted successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="residency.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'delete_error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error deleting the residency. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="residency.php"></a>
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
              <h1 class="m-0 fs-2">Residency</h1>
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
            <button type="button" class="btn btn-primary d-flex align-items-center" style="margin-right: 10px;" data-bs-toggle="modal" data-bs-target="#resiModal">
                <i class="bi bi-plus-square-fill my-2"></i>
                <span>Residency</span>
              </button>
      <a href="print_residency.php" class="btn btn-primary d-flex align-items-center" style="margin-right: 10px;">
  <i class="fa fa-print me-2"></i> Print
</a>
              
              <!-- Modal -->
              <form method="POST" action="function.php">   
                <div class="modal fade" id="resiModal" tabindex="-1" aria-labelledby="resiModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="resiModalLabel">Residency Management</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                    <div>
                    <input name="accomplish" class="float-end text-center" value="<?php echo date("Y/m/d");?>">
                    </div>
                              <div class="mb-2">
                          <label class="mt-3">Full Name:</label>
                          <input class="form-control" type="text" placeholder="" name="name" required/>			
                        </div>

                        <div class="mb-2">
                          <label>Age:</label>
                          <input class="form-control" type="text" placeholder="" name="age" required/>			
                        </div>
                        <div class="mb-2">
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
                        <div class="mb-2">
                          <label>Period of Residency:</label>
                          <input class="form-control" type="text" placeholder="" name="year" required/>			
                        </div>
                        <div class="mb-2">
                          <label>Purpose:</label>
                          <textarea class="form-control" type="text" placeholder="" name="purpose" required> </textarea>			
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="residency_add" class="btn btn-primary">Save</button>
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
          <div id="rreload">
          <div class="table-responsive mt-4">
            <table id="datatable" class="table table-bordered border-dark table-striped">
              <thead class="table-primary">
                <tr> 
                   <th class="text-center" style="width: 15%;">Date of Accomplishment</th>
                  <th class="text-center" style="width: 20%;">Name</th>
                  <th class="text-center" style="width: 20%;">Purok</th>
                  <th class="text-center" style="width: 20%;">Period of Residency</th>
                
                  <th class="text-center" style="width: 20px">Action</th>
                </tr>
              </thead>
              <tbody class="table table-hover">
                <?php
                $sql = $conn->prepare("SELECT * FROM `residency` ORDER BY `br_id` DESC");
                $sql->execute();
                while ($row = $sql->fetch()) {
                ?>
                  <tr> 
               <td class="text-center"><?php echo $row['accomplish'] ?></td>
                    <td class="text-center"><?php echo $row['name'] ?></td>
                    <td class="text-center"><?php echo $row['purok'] ?></td>
                    <td class="text-center"><?php echo $row['year'] ?></td>
             
                    <td class="text-center">
                      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dencyModal" data-id="<?php echo $row['br_id']; ?>"  data-accomplish="<?php echo $row['accomplish']; ?>" data-name="<?php echo $row['name']; ?>" data-age="<?php echo $row['age']; ?>" data-purok="<?php echo $row['purok']; ?>" data-year="<?php echo $row['year']; ?>" data-purpose="<?php echo $row['purpose']; ?>" >
                        <i class="bi bi-pencil-fill"></i>
                        <span>Edit</span>
                      </button>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteresiModal" data-id="<?php echo $row['br_id']; ?>">
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
                url: 'residency.php', 
                type: 'GET',
                success: function (data) {
       const newContent = $(data).find('#rreload').html();
                    $('#rreload').html(newContent);
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
    				if(ISSET($_GET['br_id'])){
    					$br_id = $_GET['br_id'];
    					$sql = $conn->prepare("SELECT * FROM `residency` WHERE `br_id`='$br_id'");
    					$sql->execute();
    					$row = $sql->fetch();
    				}
    			?>

      
          <!-- Edit Modal -->
<form method="POST" action="function.php?br_id=<?php echo $br_id?>">
    <div class="modal fade" id="dencyModal" tabindex="-1" aria-labelledby="dencyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dencyModalLabel">Residency Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-2">
                    <input type="hidden" id="edit_br_id" name="br_id">
                    <input class="form-control" type="text" name="accomplish" id="edit_accomplish" value="<?php echo date("Y/m/d");?>" required/>          
                  
                  </div>

                    <div class="mb-2">
                        <label>Full Name:</label>
                        <input class="form-control" type="text" name="name" id="edit_name" value ="<?php echo $row['name']?>" required/>          
                    </div>
                    
                    <div class="mb-2">
                        <label>Age:</label>
                        <input class="form-control" type="text" name="age" id="edit_age" value ="<?php echo $row['age']?>" required/>          
                    </div>
                    <div class="mb-2">
                        <label>Purok:</label>
                        <select class="form-select" name="purok" id="edit_purok" value ="<?php echo $row['purok']?>">
                            <?php
                            $sql = $conn->prepare("SELECT * FROM `purok` ");
                            $sql->execute();
                            while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <option value="<?php echo $row['purok_name'] ?>"><?php echo $row['purok_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label>Period of Residency:</label>
                        <input class="form-control" type="text" name="year" id="edit_year" value ="<?php echo $row['year']?>" required/>          
                    </div>
                    <div class="mb-2">
                        <label>Purpose:</label>
                        <textarea class="form-control" type="text" name="purpose" id="edit_purpose" value ="<?php echo $row['purpose']?>" required> </textarea>          
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="residency_update" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>   
    </div>
</form>


      <!-- Delete Modal -->
      <div class="modal fade" id="deleteresiModal" tabindex="-1" aria-labelledby="deleteresiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="deleteresiModalLabel">Delete Confirmation</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete the selected data?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
              <form method="POST" action="function.php" id="deleteForm">
                <input type="hidden" name="br_id" id="br_id" value="">
                <button type="submit" class="btn btn-primary" name="residency_del">Yes</button>
              </form>
            </div>
          </div>
        </div>
      </div>


     
      <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Handle edit modal
        var editModal = document.getElementById('dencyModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var brId = button.getAttribute('data-id');
            var accomplish = button.getAttribute('data-accomplish');
            var name = button.getAttribute('data-name');
            var age = button.getAttribute('data-age');
            var purok = button.getAttribute('data-purok');
            var year = button.getAttribute('data-year');
            var purpose = button.getAttribute('data-purpose');

            document.getElementById('edit_br_id').value = brId;
            document.getElementById('edit_accomplish').value = accomplish;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_age').value = age;
            document.getElementById('edit_purok').value = purok;
            document.getElementById('edit_year').value = year;
            document.getElementById('edit_purpose').value = purpose;
        });

        // Handle delete modal
        var deleteModal = document.getElementById('deleteresiModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var residencyId = button.getAttribute('data-id');
            var brIdInput = document.getElementById('br_id');
            brIdInput.value = residencyId;
        });
    });
</script>


      <script>
        $.widget.bridge('uibutton', $.ui.button)
      </script>
  </div>
</body>
</html>
