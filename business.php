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
                Permit added successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="business.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error adding the permit. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="business.php"></a>
            </div>';
        }
      }
    ?>

<?php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == 'update_success') {
          echo '
            <div class="alert alert-success float-end mt-3 mx-2" style="width: 30%;" role="alert">
                permit updated successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="business.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'update_error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error updating the permit. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="business.php"></a>
            </div>';
        }
      }
    ?>

<?php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == 'delete_success') {
          echo '
            <div class="alert alert-success float-end mt-3 mx-2" style="width: 30%;" role="alert">
                permit deleted successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="business.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'delete_error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error deleting the permit. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="business.php"></a>
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
              <h1 class="m-0 fs-2">Business Permit</h1>
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
            <button type="button" class="btn btn-primary d-flex align-items-center" style="margin-right: 10px;" data-bs-toggle="modal" data-bs-target="#businessModal">
                <i class="bi bi-plus-square-fill my-2"></i>
                <span>Permit</span>
              </button>
      <a href="print_business.php" class="btn btn-primary d-flex align-items-center" style="margin-right: 10px;">
  <i class="fa fa-print me-2"></i> Print
</a>
              <!-- Modal -->
              <form method="POST" action="function.php">   
                <div class="modal fade" id="businessModal" tabindex="-1" aria-labelledby="businessModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="businessModalLabel">Business Permit Management</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">


                      <div class="mb-2">
                          <input name="issued" class="float-end text-center" value="<?php echo date("Y/m/d");?>">	
                        </div>

                        <div class="mb-2">
                          <label class="mt-3">Full Name:</label>
                          <input class="form-control" type="text" placeholder="" name="name" required/>			
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
                          <label>Capital/Gross Sales:</label>
                          <input class="form-control" type="text" placeholder="" name="capital" required/>			
                        </div>
                        <div class="mb-2">
                          <label>Annual Barangay Fee:</label>
                          <input class="form-control" type="text" placeholder="" name="fee" required/>			
                        </div>
                        <div class="mb-2">
                          <label>Kinds of Business Trade:</label>
                          <textarea class="form-control" type="text" placeholder="" name="trade" required> </textarea>			
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="business_add" class="btn btn-primary">Save</button>
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
          <div id="breload">
          <div class="table-responsive mt-4">
            <table id="datatable" class="table table-bordered border-dark table-striped">
              <thead class="table-primary">
                <tr>
                <th class="text-center" >Date of issue</th>
                  <th class="text-center" >Name</th>
                  <th class="text-center" >Location</th>
                  <th class="text-center" >Capital/Gross Sales</th>
                  <th class="text-center" >Payment</th>
                  <th class="text-center" >Business Trade</th>
                  <th class="text-center" style="width: 20%">Action</th>
                </tr>
              </thead>
              <tbody class="table table-hover">
                <?php
                $sql = $conn->prepare("SELECT * FROM `business` ORDER BY `bp_id` DESC");
                $sql->execute();
                while ($row = $sql->fetch()) {
                ?>
                  <tr>
                    <td class="text-center"><?php echo $row['issued'] ?></td>
                    <td class="text-center"><?php echo $row['name'] ?></td>
                    <td class="text-center"><?php echo $row['purok'] ?></td>
                    <td class="text-center"><?php echo $row['capital'] ?></td>
                    <td class="text-center"><?php echo $row['fee'] ?></td>
                    <td class="text-center"><?php echo $row['trade'] ?></td>
                    <td class="text-center">
                      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#permitModal" data-id="<?php echo $row['bp_id']; ?>" data-issued="<?php echo $row['issued']; ?>" data-name="<?php echo $row['name']; ?>" data-purok="<?php echo $row['purok']; ?> data-capital="<?php echo $row['capital']; ?>  " data-fee="<?php echo $row['fee']; ?>" data-trade="<?php echo $row['trade']; ?>">
                        <i class="bi bi-pencil-fill"></i>
                        <span>Edit</span>
                      </button>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletebusinessModal" data-id="<?php echo $row['bp_id']; ?>">
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
                url: 'business.php', 
                type: 'GET',
                success: function (data) {
       const newContent = $(data).find('#breload').html();
                    $('#breload').html(newContent);
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
    				if(ISSET($_GET['bp_id'])){
    					$bp_id = $_GET['bp_id'];
    					$sql = $conn->prepare("SELECT * FROM `business` WHERE `bp_id`='$bp_id'");
    					$sql->execute();
    					$row = $sql->fetch();
    				}
    			?>

      <!-- Edit Modal -->
<form method="POST" action="function.php?bp_id=<?php echo $bp_id?>">
    <div class="modal fade" id="permitModal" tabindex="-1" aria-labelledby="permitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="permitModalLabel">Business Permit Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="mb-2">
                  <input type="hidden" id="edit_bp_id" name="bp_id">
                 <input class="form-control" type="hidden" name="issued" id="edit_issued" value="<?php echo date("Y/m/d");?>" required/>          
             </div>

                    <div class="mb-2">
                        <label>Full Name:</label>
                        <input class="form-control" type="text" name="name" id="edit_name" value ="<?php echo $row['name']?>" required/>          
                    </div>
                    <div class="mb-2">
                        <label>Place of Business:</label>
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
                        <label>Capital/Gross Sales:</label>
                        <input class="form-control" type="text" name="capital" id="edit_capital" value ="<?php echo $row['capital']?>" required/>          
                    </div>
                    
                    <div class="mb-2">
                        <label> Annual Barangay Payment:</label>
                        <input class="form-control" type="text" name="fee" id="edit_fee" value ="<?php echo $row['fee']?>" required/>          
                    </div>

                    <div class="mb-2">
                        <label>Kinds of Business Trade:</label>
                        <textarea class="form-control" type="text" name="trade" id="edit_trade" value ="<?php echo $row['trade']?>" required> </textarea>          
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="business_update" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>   
    </div>
</form>


      <!-- Delete Modal -->
      <div class="modal fade" id="deletebusinessModal" tabindex="-1" aria-labelledby="deletebusinessModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="deletebusinessModalLabel">Delete Confirmation</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete the selected data?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
              <form method="POST" action="function.php" id="deleteForm">
                <input type="hidden" name="bp_id" id="bp_id" value="">
                <button type="submit" class="btn btn-primary" name="business_del">Yes</button>
              </form>
            </div>
          </div>
        </div>
      </div>


     
      <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Handle edit modal
        var editModal = document.getElementById('permitModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var bpId = button.getAttribute('data-id');
            var issued = button.getAttribute('data-issued');
            var name = button.getAttribute('data-name');
            var purok = button.getAttribute('data-purok');
            var capital = button.getAttribute('data-capital');
            var fee = button.getAttribute('data-fee');
            var trade = button.getAttribute('data-trade');

            document.getElementById('edit_bp_id').value = bpId; 
            document.getElementById('edit_issued').value = issued;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_purok').value = purok;
            document.getElementById('edit_capital').value = capital;
            document.getElementById('edit_fee').value = fee;
            document.getElementById('edit_trade').value = trade;
        });

        // Handle delete modal
        var deleteModal = document.getElementById('deletebusinessModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var businessId = button.getAttribute('data-id');
            var bpIdInput = document.getElementById('bp_id');
            bpIdInput.value = businessId;
        });
    });
</script>


      <script>
        $.widget.bridge('uibutton', $.ui.button)
      </script>
  </div>
</body>
</html>
