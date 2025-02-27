<?php
include 'connection.php';
include 'auth.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>BARANGAY CAMINGAWAN</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/logo2.png" class="fs-2" rel="icon">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <!-- Include DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <!-- Include DataTables JS -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <div  class="logo d-flex align-items-center me-auto">
        <h1 class="sitename"><i>Purok Officials</i></h1>
     
      </div>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="purokredent.php" class="">Resident<br></a></li>
          <li><a href="purok_off.php">Purok Officials</a></li>
         
          <li><a href="logout.php">Log Out</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>
  

  <?php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
          echo '
            <div class="alert alert-success float-end mt-3 mx-2" style="width: 30%;" role="alert">
                purok official added successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="purok_off.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error adding the purok official. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="purok_off.php"></a>
            </div>';
        }
      }
    ?>

<?php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == 'update_success') {
          echo '
            <div class="alert alert-success float-end mt-3 mx-2" style="width: 30%;" role="alert">
                purok official updated successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="purok_off.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'update_error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error updating the purok official. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="purok_off.php"></a>
            </div>';
        }
      }
    ?>

<?php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == 'delete_success') {
          echo '
            <div class="alert alert-success float-end mt-3 mx-2" style="width: 30%;" role="alert">
                purok official deleted successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="purok_off.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'delete_error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error deleting the purok official. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="purok_off.php"></a>
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
            <button type="button" href="#"  class="btn btn-primary mt-2 float-end" data-bs-toggle="modal" data-bs-target="#purcModal">
    <i class="bi bi-plus-square-fill my-2 "></i>
  <span>Purok Officials</span> 
</button>
             
<!-- Modal -->
<form method="POST" action="function.php">   
                <div class="modal fade" id="purcModal" tabindex="-1" aria-labelledby="purcModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="purcModalLabel">Barangay Officials</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                    <div>
                              <div class="mb-2">
                          <label class="mt-3">Full Name:</label>
                          <input class="form-control" type="text" placeholder="" name="POname" required/>			
                        </div>
            
                        <div class="mb-2">
                          <label>Position:</label>
                          <input class="form-control" type="text" placeholder="" name="purok_officer" required/> 			
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="puroff_add" class="btn btn-primary">Save</button>
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
          <div id="pofload">
          <div class="table-responsive mt-4">
            <table id="datatable" class="table table-bordered border-dark table-striped">
              <thead class="table-primary">
                <tr> 
                  <th class="text-center" style="width: 20%;">Name</th>
                  <th class="text-center" style="width: 20%;">Position</th>
                
                  <th class="text-center" style="width: 20%">Action</th>
                </tr>
              </thead>
              <tbody class="table table-hover">
                <?php
                $sql = $conn->prepare("SELECT * FROM `purok_official` ORDER BY `po_id` DESC");
                $sql->execute();
                while ($row = $sql->fetch()) {
                ?>
                  <tr>
                    <td class="text-center"><?php echo $row['POname'] ?></td>
                    <td class="text-center"><?php echo $row['purok_officer'] ?></td>
                    <td class="text-center">
                      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#purofModal" data-id="<?php echo $row['po_id']; ?>"  data-POname="<?php echo $row['POname']; ?>" data-purok_officer="<?php echo $row['purok_officer']; ?>">
                        <i class="bi bi-pencil-fill"></i>
                        <span>Edit</span>
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
                url: 'purok_off.php', 
                type: 'GET',
                success: function (data) {
       const newContent = $(data).find('#pofload').html();
                    $('#pofload').html(newContent);
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


<!--------------  Edit Modal --------------->

<?php
    				if(ISSET($_GET['po_id'])){
    					$po_id = $_GET['po_id'];
    					$sql = $conn->prepare("SELECT * FROM `official` WHERE `po_id`='$po_id'");
    					$sql->execute();
    					$row = $sql->fetch();
    				}
    			?>

      
          <!-- Edit Modal -->
<form method="POST" action="function.php?f_id=<?php echo $f_id?>">
    <div class="modal fade" id="purofModal" tabindex="-1" aria-labelledby="purofModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="purofModalLabel">Purok Officials</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-2">
                    <input type="hidden" id="edit_f_id" name="f_id">
                  </div>

                    <div class="mb-2">
                        <label>Full Name:</label>
                        <input class="form-control" type="text" name="POname" id="edit_POname" value ="<?php echo $row['POname']?>" required/>          
                    </div>
                    
                    <div class="mb-2">
                        <label>Position:</label>
                        <input class="form-control" type="text" name="purok_officer" id="edit_purok_officer" value ="<?php echo $row['purok_officer']?>" required/> 
                    </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="puroff_update" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>   
    </div>
  </div>
</form>
   
      <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Handle edit modal
        var editModal = document.getElementById('purofModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var fId = button.getAttribute('data-id');
            var POname = button.getAttribute('data-POname');
            var purok_officer = button.getAttribute('data-purok_officer');

            document.getElementById('edit_f_id').value = fId;
            document.getElementById('edit_POname').value = POname;
            document.getElementById('edit_purok_officer').value = purok_officer;
        });
       
    });
</script>




<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>