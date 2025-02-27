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
                certificate added successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="certificate.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error adding the certificate. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="certificate.php"></a>
            </div>';
        }
      }
    ?>

<?php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == 'update_success') {
          echo '
            <div class="alert alert-success float-end mt-3 mx-2" style="width: 30%;" role="alert">
                certificate updated successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="certificate.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'update_error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error updating the certificate. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="certificate.php"></a>
            </div>';
        }
      }
    ?>

<?php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == 'delete_success') {
          echo '
            <div class="alert alert-success float-end mt-3 mx-2" style="width: 30%;" role="alert">
                certificate deleted successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="certificate.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'delete_error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error deleting the certificate. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="certificate.php"></a>
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
              <h1 class="m-0 fs-2">Certification</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section>
        <div clas_s="container-fluid">
          <div class="row">
            <div class="col d-flex justify-content-end">
             
        <button type="button" class="btn btn-primary d-flex align-items-center" style="margin-right: 10px;" data-bs-toggle="modal" data-bs-target="#certifModal">
                <i class="bi bi-plus-square-fill my-2"></i>
                <span>Certificate</span>
              </button>
      <a href="print_certificate.php" class="btn btn-primary d-flex align-items-center" style="margin-right: 10px;">
  <i class="fa fa-print me-2"></i> Print
</a>
              <!-- Modal -->
              <form method="POST" action="function.php">   
                <div class="modal fade" id="certifModal" tabindex="-1" aria-labelledby="certifModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="certifModalLabel">Barangay Certification Management</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      <div class="mb-2">                        
                          <input name="date_complish" class="float-end text-center" value="<?php echo date("Y/m/d");?>">
                        </div>
                        <div class="mb-2">
                          <label class="mt-3">Full Name:</label>
                          <input class="form-control" type="text" placeholder="" name="fname" required/>			
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
                          <label>Person Deceased:</label>
                          <input class="form-control" type="text" placeholder="" name="name" required/>			
                        </div>
                        <div class="mb-2">
                          <label>Age:</label>
                          <input class="form-control" type="text" placeholder="" name="age" required/>			
                        </div>
                        <div class="mb-2">
                          <label>Date of Death:</label>
                          <input class="form-control" type="date" placeholder="" name="death_date" required/>			
                        </div>
                        <div class="mb-2">
                          <label>Relative:</label>
                          <input class="form-control" type="text" placeholder="Ex.(mother, father, etc...)" name="pname" required/>			
                        </div>
                        <div class="mb-2">
                          <label>Purpose:</label>
                          <textarea class="form-control" type="text" placeholder="" name="purpose" required> </textarea>			
                        </div>
                       
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="certification_add" class="btn btn-primary">Save</button>
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
          <div id="creload">
          <div class="table-responsive mt-4" >
            <table id="datatable" class="table table-bordered border-dark table-striped">
              <thead class="table-primary">
                <tr>
                    
                  <th class="text-center" >Person Deceased</th>
                  <th class="text-center" >Purok</th>
                  <th class="text-center" >Age</th>
                  <th class="text-center" >Date of Death</th>
                  <th class="text-center" >Date of Issued</th>
                  <th class="text-center" >Action</th>
                </tr>
              </thead>
              <tbody class="table table-hover">
                <?php
                $sql = $conn->prepare("SELECT * FROM `certificate` ORDER BY `bc_id` DESC");
                $sql->execute();
                while ($row = $sql->fetch()) {
                ?>
                  <tr>
                    <td class="text-center"><?php echo $row['name'] ?></td> 
                    <td class="text-center"><?php echo $row['purok'] ?></td>
                    <td class="text-center"><?php echo $row['age'] ?></td>
                    <td class="text-center"><?php echo $row['death_date'] ?></td>
                    <td class="text-center"><?php echo $row['date_complish'] ?></td>
                    <td class="text-center">
                      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cationModal" data-id="<?php echo $row['bc_id']; ?>" data-fname="<?php echo $row['fname']; ?>" data-purok="<?php echo $row['purok']; ?>" data-name="<?php echo $row['name']; ?>" data-age="<?php echo $row['age']; ?>" data-death_date="<?php echo $row['death_date']; ?>" 
                      data-pname="<?php echo $row['pname']; ?>" data-purpose="<?php echo $row['purpose']; ?>" data-date_complish="<?php echo $row['date_complish']; ?>">
                        <i class="bi bi-pencil-fill"></i>
                        <span>Edit</span>
                      </button>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletecertifModal" data-id="<?php echo $row['bc_id']; ?>">
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
                url: 'certificate.php', 
                type: 'GET',
                success: function (data) {
       const newContent = $(data).find('#creload').html();
                    $('#creload').html(newContent);
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


 <!-- Edit Modal -->
      <?php
    				if(ISSET($_GET['bc_id'])){
    					$bc_id = $_GET['bc_id'];
    					$sql = $conn->prepare("SELECT * FROM `certificate` WHERE `bc_id`='$bc_id'");
    					$sql->execute();
    					$row = $sql->fetch();
    				}
    			?>

     
<form method="POST" action="function.php?bc_id=<?php echo $bc_id?>">
    <div class="modal fade" id="cationModal" tabindex="-1" aria-labelledby="cationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cationModalLabel">Barangay Certification Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                    <input type="hidden" id="edit_bc_id" name="bc_id">
                        <label>Full Name:</label>
                        <input class="form-control" type="text" name="fname" id="edit_fname" value ="<?php echo $row['fname']?>" required/>          
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
                        <label>Person Deceased:</label>
                        <input class="form-control" type="text" name="name" id="edit_name" value ="<?php echo $row['name']?>" required/>          
                    </div>
                    <div class="mb-2">
                        <label>Age:</label>
                        <input class="form-control" type="text" name="age" id="edit_age" value ="<?php echo $row['age']?>" required/>          
                    </div>
                    <div class="mb-2">
                        <label>Date of Death:</label>
                        <input class="form-control" type="date" name="death_date" id="edit_death_date" value ="<?php echo $row['death_date']?>" required/>          
                    </div>
                    <div class="mb-2">
                        <label>Relative:</label>
                        <input class="form-control" type="text" name="pname" id="edit_pname" value ="<?php echo $row['pname']?>" required/>          
                    </div>
                    <div class="mb-2">
                        <label>Purpose:</label>
                        <textarea class="form-control" type="text" name="purpose" id="edit_purpose" value ="<?php echo $row['purpose']?>" required> </textarea>          
                    </div>
                    <div class="mb-2">
                
                        <input class="form-control" type="hidden" name="date_complish" id="edit_date_complish" value="<?php echo date("Y/m/d");?>" required/>          
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="certification_update" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>   
    </div>
</form>


      <!-- Delete Modal -->
      <div class="modal fade" id="deletecertifModal" tabindex="-1" aria-labelledby="deletecertifModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="deletecertifModalLabel">Delete Confirmation</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete the selected data?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
              <form method="POST" action="function.php" id="deleteForm">
                <input type="hidden" name="bc_id" id="bc_id" value="">
                <button type="submit" class="btn btn-primary" name="certification_del">Yes</button>
              </form>
            </div>
          </div>
        </div>
      </div>


     
      <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Handle edit modal
        var editModal = document.getElementById('cationModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var bcId = button.getAttribute('data-id');
            var fname = button.getAttribute('data-fname');
            var purok = button.getAttribute('data-purok');
            var name = button.getAttribute('data-name');
            var age = button.getAttribute('data-age');
            var death_date = button.getAttribute('data-death_date');
            var pname = button.getAttribute('data-pname');
            var purpose = button.getAttribute('data-purpose');
            var date_complish = button.getAttribute('data-date_complish');


            document.getElementById('edit_bc_id').value = bcId;
            document.getElementById('edit_fname').value = fname;
            document.getElementById('edit_purok').value = purok;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_age').value = age;
            document.getElementById('edit_death_date').value = death_date;
            document.getElementById('edit_pname').value = pname;
            document.getElementById('edit_purpose').value = purpose;
            document.getElementById('edit_date_complish').value = date_complish;
        });

        // Handle delete modal
        var deleteModal = document.getElementById('deletecertifModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var certificateId = button.getAttribute('data-id');
            var bcIdInput = document.getElementById('bc_id');
            bcIdInput.value = certificateId;
        });
    });
</script>


      <script>
        $.widget.bridge('uibutton', $.ui.button)
      </script>
  </div>
</body>
</html>
