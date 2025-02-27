
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
    <nav class="navbar navbar-expand-lg navbar-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item ms-3">
          <a class="nav-link" href="resident.php">
            <i class="fas fa-arrow-left fs-4"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    </aside>

    <form method="POST" >
     <div class="ms-3 mt-5" style="display: flex; align-items: center;">
    <select class="form-select" style="width: auto;" name="find">
      <?php
      $sql = $conn->prepare("SELECT * FROM `purok`");
      $sql->execute();
      while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='{$row['purok_name']}'>{$row['purok_name']}</option>";
      }
      ?>
    </select>
    <button class="btn btn-dark btn-sm p-2 ms-3" name="result">Search</button>
  </div>
</form>

<?php
//SEARCH DATA
    	
    	if(ISSET($_POST['result'])){
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 ">
                    <div class="table-responsive">
                      <table id="datatable" class="table table-bordered table-striped">
                        <thead class="table-primary">
                          <tr>
                            <th class="text-center">LAST NAME</th>
                            <th class="text-center">FIRST NAME</th>
                            <th class="text-center">MIDDLE NAME</th>
                            <th class="text-center">STATUS</th>
                            <th class="text-center">ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $find = $_POST['find'];
                            $query = $conn->prepare("SELECT * FROM `personal_info` WHERE `purok` LIKE ?");
                            $query->execute(["%$find%"]);
                            $count = $query->rowCount();

                            if ($count > 0) {
                              while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <tr>
                            <td class="text-center"><?php echo htmlspecialchars($row['Lname']); ?></td>
                            <td class="text-center"><?php echo htmlspecialchars($row['Fname']); ?></td>
                            <td class="text-center"><?php echo htmlspecialchars($row['MidName']); ?></td>
                            <td class="text-center"><?php echo htmlspecialchars($row['Status']); ?></td>
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
                                <i class="fas fa-eye"></i> View Detail
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
	<?php
	} else {
		echo '<b class="text-white fs-5"></b>';
	}
	?>

<script>
$(document).ready(function() {
  $('#datatable').DataTable();
});
</script>
</div>
</div>
</div>
</div>
</div>

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
        $.widget.bridge('uibutton', $.ui.button)
      </script>
  </div>
</body>
</html>
