<?php
include 'connection.php';
include 'auth.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'leader') {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Get leader's purok
$sql = $conn->prepare("SELECT purok FROM users WHERE id = :user_id");
$sql->bindParam(':user_id', $user_id);
$sql->execute();
$leader = $sql->fetch(PDO::FETCH_ASSOC);

$purok = $leader['purok'];

// Fetch residents only from the leader's purok
$sql = $conn->prepare("SELECT * FROM personal_info WHERE purok = :purok ORDER BY p_id DESC");
$sql->bindParam(':purok', $purok);
$sql->execute();
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
        <h1 class="sitename"><i>Barangay Camingawan</i></h1>
     
      </div>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="purokredent.php" class="">Resident<br></a></li>
         <!-- <li><a href="purok_off.php">Purok Officials</a></li> -->
         
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
                Resident added successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="purokredent.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error adding the Resident. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="purokredent.php"></a>
            </div>';
        }
      }
    ?>

<?php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == 'update_success') {
          echo '
            <div class="alert alert-success float-end mt-3 mx-2" style="width: 30%;" role="alert">
                resident updated successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="purokredent.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'update_error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error updating the resident. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="purokredent.php"></a>
            </div>';
        }
      }
    ?>

<?php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == 'delete_success') {
          echo '
            <div class="alert alert-success float-end mt-3 mx-2" style="width: 30%;" role="alert">
                resident deleted successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="purokredent.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'delete_error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error deleting the resident. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="purokredent.php"></a>
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
            <button type="button" href="#"  class="btn btn-primary mt-2 float-end" data-bs-toggle="modal" data-bs-target="#PresidentModal">
    <i class="bi bi-plus-square-fill my-2 "></i>
  <span>Resident</span> 
</button>
             
<!-- Modal -->

<form method="POST" action="function.php">
  <div class="modal fade" id="PresidentModal" tabindex="-1" aria-labelledby="PresidentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="PresidentModalLabel">Resident Management</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row g-4">
            <label class="form-label">Name</label>
            <div class="col-sm mt-0">
              <input class="form-control" type="text" placeholder="Last Name" name="Lname" required />
            </div>
            <div class="col-sm mt-0">
              <input class="form-control" type="text" placeholder="First Name" name="Fname" required />
            </div>
            <div class="col-sm mt-0">
              <input class="form-control" type="text" placeholder="Middle Name" name="MidName" required />
            </div>
            <div class="col-sm mt-0">
              <input class="form-control" type="text" placeholder="Suffix, e.g., Jr., I, II, III" name="EXT" required />
            </div>
          </div>

          <div class="row g-3 mt-3">
            <div class="col-sm-3">
              <label class="ms-2">AGE</label>
              <input class="form-control" type="number" id="age" placeholder="" name="Age" readonly/>
            </div>
            <div class="col-sm">
              <label class="ms-2">Gender</label>
              <select class="form-select" name="Gender">
                <option value="female">Female</option>
                <option value="male">Male</option>
              </select>
            </div>
            <div class="col-sm">
              <label class="ms-2">Purok</label>
              <select class="form-select" name="purok">
                <?php
                $sql = $conn->prepare("SELECT * FROM `purok` ");
                $sql->execute();
                while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                  echo "<option value='{$row['purok_name']}'>{$row['purok_name']}</option>";
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row g-3 mt-3">
            <div class="col-sm-2">
              <label class="ms-2">Status:</label>
              <select class="form-select" name="Status">
                <option value="leader">Leader</option>
                <option value="member">Member</option>
              </select>
            </div>
            <div class="col-sm">
              <label class="ms-2">DATE OF BIRTH:</label>
              <input class="form-control" type="date" id="DBirth" name="DBirth" required />
            </div>
            <div class="col-sm">
              <label class="ms-2">PLACE OF BIRTH:</label>
              <input class="form-control" type="text" placeholder="" name="PBirth" required />
            </div>
          </div>

          <div class="row g-2 mt-3">
            <div class="col-sm-8">
              <label class="ms-2">RESIDENT ADDRESS:</label>
              <input class="form-control" type="text" placeholder="" name="ResidentAdd" required />
            </div>
            <div class="col-sm">
              <label class="ms-2">RELIGION:</label>
              <input class="form-control" type="text" placeholder="" name="Religion" required />
            </div>
          </div>

          <div class="row g-3 mt-3">
            <div class="col-sm-3">
              <label class="ms-2">Civil Status:</label>
              <select class="form-select" name="CivilStat">
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="others">Others</option>
              </select>
            </div>
            <div class="col-sm">
              <label class="ms-2">CITIZENSHIP:</label>
              <input class="form-control" type="text" placeholder="" name="Citizenship" required />
            </div>
            <div class="col-sm">
              <label class="ms-2">PHILSYs CARD NO.:</label>
              <input class="form-control" type="text" placeholder="" name="PhilCardNum" required />
            </div>
          </div>

          <div class="row g-3 mt-3">
            <div class="col-sm-3">
              <label class="ms-2">CONTACT #:</label>
              <input class="form-control" type="text" placeholder="" name="Contact" required />
            </div>
            <div class="col-sm">
              <label class="ms-2">EMAIL ADDRESS:</label>
              <input class="form-control" type="text" placeholder="" name="Email" required />
            </div>
            <div class="col-sm">
              <label class="ms-2 fs-6">Highest Educational Attainment:</label>
              <select class="form-select ms-3" style="width:95%" name="HEA">
                <option value="Elementary">ELEMENTARY</option>
                <option value="High School">HIGH SCHOOL</option>
                <option value="College">COLLEGE</option>
                <option value="Post Graduate">POST GRAD</option>
                <option value="Vocational">VOCATIONAL</option>
              </select>
            </div>
          </div>

          <div class="row g-2 mt-3">
            <div class="col-sm-5">
              <label class="ms-2 fs-6">Specify:</label>
              <select class="form-select ms-3" style="width:95%" name="specify">
                <option value="Graduate">Graduate</option>
                <option value="Under Graduate">Under Graduate</option>
              </select>
            </div>
            <div class="col-sm">
              <label class="ms-2 fs-6">Details:</label>
              <select class="form-select ms-3" style="width:95%" name="detail">
                <option value="Labor">LABOR</option>
                <option value="Employed">EMPLOYED</option>
                <option value="Unemployed">UNEMPLOYED</option>
                <option value="PWD">PWD</option>
                <option value="OFW">OFW</option>
                <option value="Solo Parent">SOLO PARENT</option>
                <option value="osy">OUT OF SCHOOL YOUTH (OSY)</option>
                <option value="osc">OUT OF SCHOOL CHILDREN (OSC)</option>
                <option value="IP">IP</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="PL_add" class="btn btn-primary">Save</button>
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
        <div class="col-md-12">
            <div class="mt-5">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-striped table-hover">
                      <thead class="table-primary">
                        <tr>
                          <th class="text-center">LAST NAME</th>
                          <th class="text-center">FIRST NAME</th>
                          <th class="text-center">MIDDLE NAME</th>
                          <th class="text-center">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = $conn->prepare("SELECT * FROM `personal_info` WHERE `purok` = :purok");
                        $query->bindParam(':purok', $purok);
                        $query->execute();
                        $count = $query->rowCount();

                        if ($count > 0) {
                          while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                          <td class="text-center"><?php echo htmlspecialchars($row['Lname']); ?></td>
                          <td class="text-center"><?php echo htmlspecialchars($row['Fname']); ?></td>
                          <td class="text-center"><?php echo htmlspecialchars($row['MidName']); ?></td>
                          <td class="text-center">
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewresidenceModal" 
                              data-id="<?php echo htmlspecialchars($row['p_id']); ?>" 
                              data-Lname="<?php echo htmlspecialchars($row['Lname']); ?>" 
                              data-Fname="<?php echo htmlspecialchars($row['Fname']); ?>" 
                              data-MidName="<?php echo htmlspecialchars($row['MidName']); ?>" 
                              data-EXT="<?php echo htmlspecialchars($row['EXT']); ?>" 
                              data-Age="<?php echo htmlspecialchars($row['Age']); ?>" 
                              data-Gender="<?php echo htmlspecialchars($row['Gender']); ?>" 
                              data-purok="<?php echo htmlspecialchars($row['purok']); ?>" 
                              data-Status="<?php echo htmlspecialchars($row['Status']); ?>" 
                              data-DBirth="<?php echo htmlspecialchars($row['DBirth']); ?>" 
                              data-PBirth="<?php echo htmlspecialchars($row['PBirth']); ?>" 
                              data-ResidentAdd="<?php echo htmlspecialchars($row['ResidentAdd']); ?>" 
                              data-Religion="<?php echo htmlspecialchars($row['Religion']); ?>" 
                              data-CivilStat="<?php echo htmlspecialchars($row['CivilStat']); ?>" 
                              data-Citizenship="<?php echo htmlspecialchars($row['Citizenship']); ?>" 
                              data-PhilCardNum="<?php echo htmlspecialchars($row['PhilCardNum']); ?>" 
                              data-Contact="<?php echo htmlspecialchars($row['Contact']); ?>" 
                              data-Email="<?php echo htmlspecialchars($row['Email']); ?>" 
                              data-HEA="<?php echo htmlspecialchars($row['HEA']); ?>" 
                              data-specify="<?php echo htmlspecialchars($row['specify']); ?>" 
                              data-detail="<?php echo htmlspecialchars($row['detail']); ?>">
                              <i class="fas fa-eye"></i> Details
                            </button>
                          </td>
                        </tr>
                        <?php
                          }
                        } else {
                          echo '<tr><td colspan="5" class="text-center">No Record found</td></tr>';
                        }
                        ?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
  $('#datatable').DataTable();
});
</script>

<!--------------  View Modal --------------->

<div class="modal fade" id="viewresidenceModal" tabindex="-1" aria-labelledby="viewresidenceModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="viewresidenceModalLabel"><b><i>RESIDENT DETAILS</i></b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col-md-3">
            <label class="form-label">Last Name</label>
            <p id="view_Lname" class="form-control-plaintext"></p>
          </div>
          <div class="col-md-3">
            <label class="form-label">First Name</label>
            <p id="view_Fname" class="form-control-plaintext"></p>
          </div>
          <div class="col-md-3">
            <label class="form-label">Middle Name</label>
            <p id="view_MidName" class="form-control-plaintext" ></p>
          </div>
          <div class="col-md-3">
            <label class="form-label">Extension</label>
            <p id="view_EXT" class="form-control-plaintext"></p>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-2">
            <label class="form-label">Age</label>
            <p id="view_Age" class="form-control-plaintext"></p>
          </div>
          <div class="col-md-2">
            <label class="form-label">Gender</label>
            <p id="view_Gender" class="form-control-plaintext"></p>
          </div>
          <div class="col-md-4">
            <label class="form-label">Purok</label>
            <p id="view_purok" class="form-control-plaintext"></p>
          </div>
          <div class="col-md-4">
            <label class="form-label">Status</label>
            <p id="view_Status" class="form-control-plaintext"></p>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-4">
            <label class="form-label">Date of Birth</label>
            <p id="view_DBirth" class="form-control-plaintext"></p>
          </div>
          <div class="col-md-4">
            <label class="form-label">Place of Birth</label>
            <p id="view_PBirth" class="form-control-plaintext"></p>
          </div>
          <div class="col-md-4">
            <label class="form-label">Resident Address</label>
            <p id="view_ResidentAdd" class="form-control-plaintext"></p>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-4">
            <label class="form-label">Religion</label>
            <p id="view_Religion" class="form-control-plaintext"></p>
          </div>
          <div class="col-md-4">
            <label class="form-label">Civil Status</label>
            <p id="view_CivilStat" class="form-control-plaintext"></p>
          </div>
          <div class="col-md-4">
            <label class="form-label">Citizenship</label>
            <p id="view_Citizenship" class="form-control-plaintext"></p>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-4">
            <label class="form-label">PhilSys Card No.</label>
            <p id="view_PhilCardNum" class="form-control-plaintext"></p>
          </div>
          <div class="col-md-4">
            <label class="form-label">Contact No.</label>
            <p id="view_Contact" class="form-control-plaintext"></p>
          </div>
          <div class="col-md-4">
            <label class="form-label">Email Address</label>
            <p id="view_Email" class="form-control-plaintext"></p>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Highest Educational Attainment</label>
            <p id="view_HEA" class="form-control-plaintext"></p>
          </div>
          <div class="col-md-3">
            <label class="form-label">Specify</label>
            <p id="view_specify" class="form-control-plaintext"></p>
          </div>
          <div class="col-md-3">
            <label class="form-label">Details</label>
            <p id="view_detail" class="form-control-plaintext"></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', (event) => {

    // Handle view modal
    var viewModal = document.getElementById('viewresidenceModal');
    viewModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var pId = button.getAttribute('data-id');
        var Lname = button.getAttribute('data-Lname');
        var Fname = button.getAttribute('data-Fname');
        var MidName = button.getAttribute('data-MidName');
        var EXT = button.getAttribute('data-EXT');
        var Age = button.getAttribute('data-Age');
        var Gender = button.getAttribute('data-Gender');
        var purok = button.getAttribute('data-purok');
        var Status = button.getAttribute('data-Status');
        var DBirth = button.getAttribute('data-DBirth');
        var PBirth = button.getAttribute('data-PBirth');
        var ResidentAdd = button.getAttribute('data-ResidentAdd');
        var Religion = button.getAttribute('data-Religion');
        var CivilStat = button.getAttribute('data-CivilStat');
        var Citizenship = button.getAttribute('data-Citizenship');
        var PhilCardNum = button.getAttribute('data-PhilCardNum');
        var Contact = button.getAttribute('data-Contact');
        var Email = button.getAttribute('data-Email');
        var HEA = button.getAttribute('data-HEA');
        var specify = button.getAttribute('data-specify');
        var detail = button.getAttribute('data-detail');

        document.getElementById('view_Lname').textContent = Lname;
        document.getElementById('view_Fname').textContent = Fname;
        document.getElementById('view_MidName').textContent = MidName;
        document.getElementById('view_EXT').textContent = EXT;
        document.getElementById('view_Age').textContent = Age;
        document.getElementById('view_Gender').textContent = Gender;
        document.getElementById('view_purok').textContent = purok;
        document.getElementById('view_Status').textContent = Status;
        document.getElementById('view_DBirth').textContent = DBirth;
        document.getElementById('view_PBirth').textContent = PBirth;
        document.getElementById('view_ResidentAdd').textContent = ResidentAdd;
        document.getElementById('view_Religion').textContent = Religion;
        document.getElementById('view_CivilStat').textContent = CivilStat;
        document.getElementById('view_Citizenship').textContent = Citizenship;
        document.getElementById('view_PhilCardNum').textContent = PhilCardNum;
        document.getElementById('view_Contact').textContent = Contact;
        document.getElementById('view_Email').textContent = Email;
        document.getElementById('view_HEA').textContent = HEA;
        document.getElementById('view_specify').textContent = specify;
        document.getElementById('view_detail').textContent = detail;
    });
  });
</script>


<script>
 document.addEventListener('DOMContentLoaded', function() {
    var birthInput = document.getElementById('DBirth');
    var ageInput = document.getElementById('age');

    function calculateAge(birthDate) {
        var today = new Date();
        var age = today.getFullYear() - birthDate.getFullYear();
        var monthDifference = today.getMonth() - birthDate.getMonth();

        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        return age;
    }

    birthInput.addEventListener('change', function() {
        var birthDate = new Date(this.value);
        ageInput.value = calculateAge(birthDate);
    });

    // Calculate age on page load if date of birth is already set
    if (birthInput.value) {
        var birthDate = new Date(birthInput.value);
        ageInput.value = calculateAge(birthDate);
    }
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