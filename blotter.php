<?php
include 'auth.php';
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
                blotter added successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="blotter.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error adding the blotter. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="blotter.php"></a>
            </div>';
        }
      }
    ?>

<?php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == 'update_success') {
          echo '
            <div class="alert alert-success float-end mt-3 mx-2" style="width: 30%;" role="alert">
                blotter updated successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="blotter.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'update_error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error updating the blotter. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="blotter.php"></a>
            </div>';
        }
      }
    ?>

<?php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == 'delete_success') {
          echo '
            <div class="alert alert-success float-end mt-3 mx-2" style="width: 30%;" role="alert">
                blotter deleted successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="blotter.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'delete_error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error deleting the blotter. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="blotter.php"></a>
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
              <h1 class="m-0 fs-2">Blotter</h1>
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
              <button type="button" class="btn btn-primary mt-5 float-end" data-bs-toggle="modal" data-bs-target="#blotModal">
                <i class="bi bi-plus-square-fill my-2"></i>
                <span>Blotter</span>
              </button>
              <!-- Modal -->
              <form method="POST" action="function.php">   
  <div class="modal fade" id="blotModal" tabindex="-1" aria-labelledby="blotModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="blotModalLabel">Manage Blotter</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div>          
     <input name="daterecorded" class="float-end text-center" value="<?php echo date("Y/m/d");?>">
            </div>
            <br>
            <div class="row g-2 mt-4">
              <div class="col-md-6">
                <label class="col-form-label">Complainant:</label>
                <input type="text" class="form-control" name="complainant" required>
              </div>
              <div class="col-md-6">
                <label class="col-form-label">Age:</label>
                <input type="text" class="form-control" name="cage" required>
              </div>
            </div>
            <div class="mt-3">
              <div class="row g-2">
                <div class="col-md-6">
                  <label class="col-form-label">Purok:</label>
                  <select class="form-select" name="caddress">
                <?php
                $sql = $conn->prepare("SELECT * FROM `purok` ");
                $sql->execute();
                while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                  echo "<option value='{$row['purok_name']}'>{$row['purok_name']}</option>";
                }
                ?>
              </select>
                </div>
                <div class="col-md-6">
                  <label class="col-form-label">Contact#:</label>
                  <input type="text" class="form-control" name="ccontact" required>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <div class="row g-2">
                <div class="col-md-6">
                  <label class="col-form-label">Complainee:</label>
                  <input type="text" class="form-control" name="persontocomplain" required>
                </div>
               
                <div class="col-md-6">
                  <label class="col-form-label">Age:</label>
                  <input type="text" class="form-control" name="page" required>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <div class="row g-2">
                <div class="col-md-6">
                  <label class="col-form-label">Purok:</label>
                  <select class="form-select" name="paddress">
                <?php
                $sql = $conn->prepare("SELECT * FROM `purok` ");
                $sql->execute();
                while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                  echo "<option value='{$row['purok_name']}'>{$row['purok_name']}</option>";
                }
                ?>
              </select>
                </div>
                <div class="col-md-6">
                  <label class="col-form-label">Contact#:</label>
                  <input type="text" class="form-control" name="pcontact" required>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <div class="row g-2">
                <div class="col-md-6">
                  <label class="col-form-label">Complaint:</label>
                  <input type="text" class="form-control" name="complaint" required>
                </div>
                <div class="col-md-6">
                  <label class="col-form-label">Action:</label>
                  <input type="text" class="form-control" name="actiontaken" required>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <div class="row g-2">
                <div class="col-md-6">
                  <label class="col-form-label">Status:</label>
                  <select class="form-control" name="status" required>
                    <option value="Solved">Solved</option>
                    <option value="Unsolved">Unsolved</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="col-form-label">Incidence Location:</label>
                  <input type="text" class="form-control" name="locationOfincidence" required>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="b_add" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
</form>
            </div>
          </div>
        </div>
      </section>

      <!--------------------------- TABLE ---------------------------------->

      <div class="container-fluid">
        <div class="row">
          <div id="blr"> 
          <div class="table-responsive mt-4">
            <table id="datatable" class="table table-bordered border-dark table-striped">
              <thead class="table-primary">
                <tr>
                  <th class="text-center" >Date Recorded</th>
                  <th class="text-center" >Complainant</th>
                  <th class="text-center" >Purok</th>
                  <th class="text-center" >Person To Complain</th>
                  <th class="text-center" >Purok</th>
                  <th class="text-center" >Complaint</th>
                  <th class="text-center" >Location of Incidence</th>
                  <th class="text-center" style="width: 20%;" >Action </th>

                </tr>
              </thead>
              <tbody class="table table-hover">
                <?php
                $sql = $conn->prepare("SELECT * FROM `blotter` ORDER BY `b_id` DESC");
                $sql->execute();
                while ($row = $sql->fetch()) {
                ?>
                  <tr>
                  <td class="text-center"><?php echo $row['daterecorded'] ?></td>
                    <td class="text-center"><?php echo $row['complainant'] ?></td>
                    <td class="text-center"><?php echo $row['caddress'] ?></td>
                    <td class="text-center"><?php echo $row['persontocomplain'] ?></td>
                    <td class="text-center"><?php echo $row['paddress'] ?></td>
                    <td class="text-center"><?php echo $row['complaint'] ?></td>
                    <td class="text-center"><?php echo $row['locationOfincidence'] ?></td>
                    <td class="text-center">
               <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#blotterModal" data-id="<?php echo $row['b_id']; ?>" data-daterecorded="<?php echo $row['daterecorded']; ?>" data-complainant="<?php echo $row['complainant']; ?>" data-cage="<?php echo $row['cage']; ?>"
data-caddress="<?php echo $row['caddress']; ?>" data-ccontact="<?php echo $row['ccontact']; ?>" data-persontocomplain="<?php echo $row['persontocomplain']; ?>" data-page="<?php echo $row['page']; ?>" data-paddress="<?php echo $row['paddress']; ?>"data-pcontact="<?php echo $row['pcontact']; ?>"
data-complaint="<?php echo $row['complaint']; ?>" data-actiontaken="<?php echo $row['actiontaken']; ?>" data-status="<?php echo $row['status']; ?>" data-locationOfincidence="<?php echo $row['locationOfincidence']; ?>">
                        <i class="bi bi-pencil-fill"></i>
                        <span >Edit</span>
                      </button>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteblotModal" data-id="<?php echo $row['b_id']; ?>">
                        <i class="bi bi-trash"></i>
                        <span >Delete</span>
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
                url: 'blotter.php', 
                type: 'GET',
                success: function (data) {
       const newContent = $(data).find('#blr').html();
                    $('#blr').html(newContent);
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

      <!-------- edit Modal ------------->
      <?php
    				if(ISSET($_GET['b_id'])){
    					$b_id = $_GET['b_id'];
    					$sql = $conn->prepare("SELECT * FROM `blotter` WHERE `b_id`='$b_id'");
    					$sql->execute();
    					$row = $sql->fetch();
    				}
    			?>

      
<form method="POST" action="function.php?b_id=<?php echo $b_id?>">
    <div class="modal fade" id="blotterModal" tabindex="-1" aria-labelledby="blotterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="blotterModalLabel">Blotter Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>   
                    
                <div class="modal-body">
                <div class="container-fluid">
            <div>  
              <input type="hidden" id="edit_b_id" name="b_id">
              <input type="hidden" name="daterecorded" class="form-control float-end" style="width: auto;" id="edit_daterecorded"  value="<?php echo date("Y/m/d");?>" required>
            </div>
            <br>
            <div class="row g-2 mt-4">
              <div class="col-md-6">
                <label class="col-form-label">Complainant:</label>
                <input type="text" class="form-control" name="complainant" id="edit_complainant" value="<?php echo $row['complainant']?>" required>
              </div>
              <div class="col-md-6">
                <label class="col-form-label">Age:</label>
                <input type="text" class="form-control" name="cage" id="edit_cage" value="<?php echo $row['cage']?>" required>
              </div>
            </div>
            <div class="mt-3">
              <div class="row g-2">
                <div class="col-md-6">
                  <label class="col-form-label">Purok:</label>
                  <select class="form-select" name="caddress"  id="edit_caddress" value="<?php echo $row['caddress']?>">
                <?php
                $sql = $conn->prepare("SELECT * FROM `purok` ");
                $sql->execute();
                while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                  echo "<option value='{$row['purok_name']}'>{$row['purok_name']}</option>";
                }
                ?>
              </select>
                </div>
                <div class="col-md-6">
                  <label class="col-form-label">Contact#:</label>
                  <input type="text" class="form-control" name="ccontact" id="edit_ccontact" value="<?php echo $row['ccontact']?>" required>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <div class="row g-2">
                <div class="col-md-6">
                  <label class="col-form-label">Complainee:</label>
                  <input type="text" class="form-control" name="persontocomplain" id="edit_persontocomplain" value="<?php echo $row['persontocomplain']?>" required>
                </div>
               
                <div class="col-md-6">
                  <label class="col-form-label">Age:</label>
                  <input type="text" class="form-control" name="page" id="edit_page" value="<?php echo $row['page']?>" required>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <div class="row g-2">
                <div class="col-md-6">
                  <label class="col-form-label">Purok:</label>
                  <select class="form-select" name="paddress" id="edit_paddress" value="<?php echo $row['paddress']?>">
                <?php
                $sql = $conn->prepare("SELECT * FROM `purok` ");
                $sql->execute();
                while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                  echo "<option value='{$row['purok_name']}'>{$row['purok_name']}</option>";
                }
                ?>
              </select>
                </div>
                <div class="col-md-6">
                  <label class="col-form-label">Contact#:</label>
                  <input type="text" class="form-control" name="pcontact" id="edit_pcontact" value="<?php echo $row['pcontact']?>" required>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <div class="row g-2">
                <div class="col-md-6">
                  <label class="col-form-label">Complaint:</label>
                  <input type="text" class="form-control" name="complaint" id="edit_complaint" value="<?php echo $row['complaint']?>" required>
                </div>
                <div class="col-md-6">
                  <label class="col-form-label">Action:</label>
                  <input type="text" class="form-control" name="actiontaken" id="edit_actiontaken" value="<?php echo $row['actiontaken']?>" required>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <div class="row g-2">
                <div class="col-md-6">
                  <label class="col-form-label">Status:</label>
                  <select class="form-control" name="status" id="edit_status" value="<?php echo $row['status']?>" required>
                    <option value="Solved">Solved</option>
                    <option value="Unsolved">Unsolved</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="col-form-label">Incidence Location:</label>
                  <input type="text" class="form-control" name="locationOfincidence" id="edit_locationOfincidence" value="<?php echo $row['locationOfincidence']?>" required>
                </div>
              </div>
            </div>
          </div>
        </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="b_update" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>   
    </div>
</form>
 

<!------------- Delete Modal ---------------------->

            


      <div class="modal fade" id="deleteblotModal" tabindex="-1" aria-labelledby="deleteblotModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="deleteblotModalLabel">Delete Confirmation</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete the selected data?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
              <form method="POST" action="function.php" id="deleteForm">
                <input type="hidden" name="b_id" id="b_id" value="">
                <button type="submit" class="btn btn-primary" name="b_del">Yes</button>
              </form>
            </div>
          </div>
        </div>
      </div>
 </div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Handle edit modal
        var editModal = document.getElementById('blotterModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var bId = button.getAttribute('data-id');
            var daterecorded = button.getAttribute('data-daterecorded');
            var complainant = button.getAttribute('data-complainant');
            var cage = button.getAttribute('data-cage');
            var caddress = button.getAttribute('data-caddress');
            var ccontact = button.getAttribute('data-ccontact');
            var persontocomplain = button.getAttribute('data-persontocomplain');
            var page = button.getAttribute('data-page');
            var paddress = button.getAttribute('data-paddress');
            var pcontact = button.getAttribute('data-pcontact');
            var complaint = button.getAttribute('data-complaint');
            var actiontaken = button.getAttribute('data-actiontaken');
            var status = button.getAttribute('data-status');
            var locationOfincidence = button.getAttribute('data-locationOfincidence');


            document.getElementById('edit_b_id').value = bId;
            document.getElementById('edit_daterecorded').value =daterecorded;
            document.getElementById('edit_complainant').value = complainant;
            document.getElementById('edit_cage').value = cage;
            document.getElementById('edit_caddress').value =caddress;
            document.getElementById('edit_ccontact').value = ccontact;
            document.getElementById('edit_persontocomplain').value = persontocomplain;
            document.getElementById('edit_page').value = page;
            document.getElementById('edit_paddress').value = paddress;
            document.getElementById('edit_pcontact').value = pcontact;
            document.getElementById('edit_complaint').value = complaint;
            document.getElementById('edit_actiontaken').value = actiontaken;
            document.getElementById('edit_status').value = status;
            document.getElementById('edit_locationOfincidence').value =locationOfincidence;
        });

        // Handle delete modal
        var deleteModal = document.getElementById('deleteblotModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var blotterId = button.getAttribute('data-id');
            var bIdInput = document.getElementById('b_id');
            bIdInput.value = blotterId;
        });
    });
</script>

     
      <script>
        $.widget.bridge('uibutton', $.ui.button)
      </script>

 
</body>
</html>
