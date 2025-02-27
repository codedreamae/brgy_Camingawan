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


  <style>
        * {
            outline: none;
        }

        html, body {
            height: 100%;
            min-height: 100%;
        }

        body {
            margin: 0;
            background-color:transparent;
           
        }

    

        #app-cover {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            width: 400px;
            margin:  auto;
            margin-top: -40px;
        }

        #cover {
            position: relative;
            height: 80px;
            background-color: #25bf2b;
            border-radius: 120px;
            box-shadow: 0 10px 40px #208a23;
            overflow: hidden;
        }

        #key-icon,
        #key-cover,
        #key-dots,
        #show-key {
            position: absolute;
            top: 0;
            bottom: 0;
        }

        #key-icon {
            left: 0;
            width: 23px;
            height: 26px;
            color: #fff;
            font-size: 26px;
            text-align: center;
            line-height: 1;
            padding: 27px 28.63px;
        }

        #key-cover,
        #key-dots {
            left: 80px;
            right: 80px;
        }

        #key-cover {
            z-index: 2;
        }

        #key {
            position: relative;
            left: 6px;
            top: 1px;
            height: 80px;
            font-size: 80px;
            color: #fff;
            letter-spacing: 12px;
            background-color: transparent;
            border: 0;
            line-height: 1;
        }

        #key-dots {
            z-index: 1;
            overflow: hidden;
        }

        #dots {
            position: absolute;
            top: 0;
            right: 0;
            left: 20px;
            height: 80px;
        }

        #key,
        #dots {
            width: 160px;
            margin: 0 auto;
        }

        .dot {
            position: relative;
            top: 50%;
            width: 20px;
            height: 20px;
            float: left;
            margin-right: 20px;
            margin-top: -10px;
            background-color: #1b841f;
            border-radius: 50%;
            transform: scale(1);
            transition: 0.2s ease;
            overflow: hidden;
        }

        .dot:last-child {
            margin-right: 0;
        }

        #key-dots.active .dot {
            transform: scale(1.7);
        }

        #show-key {
            right: 20px;
        }

        #show-key i.fas {
            display: block;
            width: 26px;
            height: 27px;
            color: #fff;
            font-size: 23px;
            padding: 28.5px 27.07px;
        }

        .bn {
    position: relative;
    display: block; 
    margin: 20px auto; 
    width: 160px; 
    height: 50px; 
    font-size: 16px; 
    background-color: #25bf2b; 
    color: #fff; 
    border: none; 
    border-radius: 25px; 
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); 
    cursor: pointer; 
    transition: background-color 0.3s, transform 0.2s; 
}

.bn:hover {
    background-color: #208a23; 
    transform: scale(1.05); 
}

.bn:active {
    background-color: #1b841f; 
    transform: scale(1); 
}

        
    </style>
    
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
                Resident added successfully!
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="resident.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error adding the Resident. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="resident.php"></a>
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
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="resident.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'update_error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error updating the resident. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="resident.php"></a>
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
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="resident.php"></a>
            </div>';
        } elseif ($_GET['status'] == 'delete_error') {
          echo '
            <div class="alert alert-danger float-end mt-3 mx-2" style="width: 30%;" role="alert">
                There was an error deleting the resident. Please try again.
                <a class="text-decoration-none btn-close float-end" aria-label="Close" href="resident.php"></a>
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
              <h1 class="m-0 fs-2">Resident</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section>
        <div class="container-fluid">
          <div class="row">
          <form method="POST"  action="search.php">
     <div class="ms-3" style="display: flex; align-items: center;">
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
            <div class="col d-flex justify-content-end">
            <button type="button"   class="btn btn-primary mt-3 float-end" data-bs-toggle="modal" data-bs-target="#residentModal">
    <i class="bi bi-plus-square-fill my-2 "></i>
  <span>Resident</span> 
</button>
             
<!-- Modal -->

<form method="POST" action="function.php">
  <div class="modal fade" id="residentModal" tabindex="-1" aria-labelledby="residentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title w-100 text-center" id="residentModalLabel"><b><i>RESIDENT MANAGEMENT</i></b></h5>
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
              <input class="form-control" type="number" id="age" placeholder="" name="Age" readonly />
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
          <button type="submit" name="r_add" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
</form>

      </div>
    </div>
  </div>
</section>

                <!----------------------- TABLE ------------------>

<div class="container-fluid">
    <div class="row mt-3">
    <div id="rl">
         <table id="datatable"  class="table table-bordered border-dark table-striped table-responsive-sm">
         <caption>List of residents</caption>
             <thead class="table-primary">
                 <tr>
                                <th  class="text-center" >LAST NAME</th>
                                <th  class="text-center" >FIRST NAME</th>
                                <th  class="text-center" >MIDDLE NAME</th>
                                <th  class="text-center" >PUROK</th>
                                <th  class="text-center" >Action</th>
                            </tr>
                 
             </thead>
             <tbody class="table table-hover">
         <?php
         $sql = $conn->prepare("SELECT * FROM `personal_info` ORDER BY `p_id` DESC");
         $sql->execute();
         while ($row = $sql->fetch()) {
         ?>
             <tr>
                 <td><?php echo $row['Lname'] ?></td>
                            <td class="text-center"><?php echo $row['Fname'] ?></td>
                            <td class="text-center"><?php echo $row['MidName'] ?></td>
                            <td class="text-center"><?php echo $row['purok'] ?></td>
                 <td class="text-center">
         <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#residenceModal" data-id="<?php echo $row['p_id']; ?>" data-Lname="<?php echo $row['Lname']; ?> " data-Fname="<?php echo $row['Fname']; ?>" data-MidName="<?php echo $row['MidName']; ?>"
data-EXT="<?php echo $row['EXT']; ?>" data-Age="<?php echo $row['Age']; ?>" data-Gender="<?php echo $row['Gender']; ?>" data-purok="<?php echo $row['purok']; ?>" data-Status="<?php echo $row['Status']; ?>" data-DBirth="<?php echo $row['DBirth']; ?>" data-PBirth="<?php echo $row['PBirth']; ?>" data-ResidentAdd="<?php echo $row['ResidentAdd']; ?>"
data-Religion =" <?php echo $row['Religion']; ?>" data-CivilStat="<?php echo $row['CivilStat']; ?>" data-Citizenship="<?php echo $row['Citizenship']; ?>" data-PhilCardNum="<?php echo $row['PhilCardNum']; ?>" data-Contact="<?php echo $row['Contact']; ?>" data-Email="<?php echo $row['Email']; ?>" data-HEA="<?php echo $row['HEA']; ?>" data-specify= "<?php echo $row['specify']; ?>"  data-detail="<?php echo $row['detail']; ?>">

                     <i class="bi bi-pencil-fill"></i>
                     <span> edit</span>
         </button>
    
         
         <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#passc" data-id="<?php echo $row['p_id']; ?>">
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

     <script>
    $(document).ready(function () {
                let table = $('#datatable').DataTable();
        function refreshTable() {
            $.ajax({
                url: 'resident.php', 
                type: 'GET',
                success: function (data) {
       const newContent = $(data).find('#rl').html();
                    $('#rl').html(newContent);
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

<!-- password Modal ---->

     <div class="modal fade" id="passc" tabindex="-1" aria-labelledby="passcLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: transparent; border: none; box-shadow: none;">
      <div class="modal-body text-center">
      <div id="app-cover">
    <div id="cover">
        <i class="fas fa-lock" id="key-icon"></i>
        <form method="POST" action="function.php" id="key-cover">
            <input type="hidden" name="action" value="unlock"> 
            <input type="password" name="password" id="key" maxlength="4" required>
        </form>
        <div id="key-dots">
            <div id="dots">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>
        <div id="show-key">
            <i class="fas fa-eye-slash"></i>
        </div>
    </div> 
  
    <button type="button" name="ok" class="bn" id="validate">Submit</button> 
    <a href="change_pass.php" class="d-block mt-3 text-white" style="font-size: large;">Privacy Password </a>
</div>
<script>
    $(document).ready(function () {
        const keyInput = $("#key");
        const showKey = $("#show-key");
        const dot = $(".dot");
        let viewPass = false;

        // Update dots based on input
        function updateKey() {
            const keyArr = keyInput.val().split("");
            dot.removeClass("white").text(""); // Clear all dots

            // Update dots with characters from input
            keyArr.forEach((char, index) => {
                if (index < 4) {
                    dot.eq(index).addClass("white").text(char);
                }
            });
        }

        // Toggle password visibility
        function toggleView() {
            viewPass = !viewPass; // Switch the flag
            showKey.find("i").toggleClass("fa-eye fa-eye-slash"); // Toggle icon
            keyInput.attr("type", viewPass ? "text" : "password"); // Toggle input type
        }

        // Event listeners
        keyInput.on("keyup", updateKey); // Update dots on keyup
        showKey.on("click", toggleView); // Toggle visibility on click
    });
</script>

      </div>
    </div>
</div>
 </div> 

                          <!--- Delete Modal ------>
   
      <div class="modal fade" id="deleteresidentModal" tabindex="-1" aria-labelledby="deleteresidentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="deleteresidentModalLabel">Delete Confirmation</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete the selected data?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
              <form method="POST" action="function.php" id="deleteForm">
                <input type="hidden" name="p_id" id="p_id" value="">
                <button type="submit" class="btn btn-primary" name="r_del">Yes</button>
              </form>
            </div>
          </div>
        </div>
      </div>


      <script>
 var personal_infoId = document.querySelector('[data-bs-target="#passc"]').getAttribute('data-id');
var pIdInput = document.getElementById('p_id');
pIdInput.value = personal_infoId;

// Add event listener for the submit button inside the passcode modal
var validate = document.getElementById('validate');
validate.addEventListener('click', function () {
    var passwordInput = document.querySelector('input[name="password"]');
    var password = passwordInput.value;

    if (password.trim() === '') {
        alert('Password is required!');
        return;
    }

    // Use AJAX to validate the password against the backend
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'function.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                // Password is valid, show the delete modal
                var passcModal = bootstrap.Modal.getInstance(document.getElementById('passc'));
                passcModal.hide(); // Hide the passcode modal

                var deleteModalInstance = new bootstrap.Modal(document.getElementById('deleteresidentModal'));
                deleteModalInstance.show(); // Show the delete modal
            } else {
                // Invalid password
                alert(response.message || 'Invalid password!');
            }
        } else {
            alert('An error occurred while validating the password.');
        }
    };

    xhr.send('password=' + encodeURIComponent(password));
});
</script>

 


                              <!--------------  Edit Modal --------------->


                        <?php
                            if(isset($_GET['p_id'])){
                                $p_id = $_GET['p_id'];
                                $sql = $conn->prepare("SELECT * FROM `personal_info` WHERE `p_id` = '$p_id'");
                                $sql->execute([$p_id]);
                                $row = $sql->fetch();
                            }
                        ?>

 <form method="POST" action="function.php?p_id=<?php echo $p_id?>">
      <div class="modal fade" id="residenceModal" tabindex="-1" aria-labelledby="residenceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="residenceModalLabel">Resident Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
          <div class="row g-4">
            <label class="form-label">Name</label>            
            <div class="col-sm mt-0">
            <input type="hidden" id="edit_p_id" name="p_id">

              <input class="form-control" type="text" placeholder="Last Name" name="Lname" id="edit_Lname" value="<?php echo $row['Lname']?>" required />
            </div>
            <div class="col-sm mt-0">
              <input class="form-control" type="text" placeholder="First Name" name="Fname" id="edit_Fname" value="<?php echo $row['Fname']?>" required />
            </div>
            <div class="col-sm mt-0">
              <input class="form-control" type="text" placeholder="Middle Name" name="MidName" id="edit_MidName" value="<?php echo $row['MidName']?>" required />
            </div>
            <div class="col-sm mt-0">
              <input class="form-control" type="text" placeholder="Suffix, e.g., Jr., I, II, III" value="<?php echo $row['EXT']?>" id="edit_EXT"  name="EXT" required />
            </div>
          </div>

          <div class="row g-3 mt-3">
            <div class="col-sm-3">
              <label class="ms-2">AGE</label>
              <input class="form-control" type="text" placeholder="" name="Age" id="edit_Age" value="<?php echo $row['Age']?>" readonly />
            </div>
            <div class="col-sm">
              <label class="ms-2">Gender</label>
              <select class="form-select" name="Gender" id="edit_Gender" value="<?php echo $row['Gender']?>" >
                <option value="female">Female</option>
                <option value="male">Male</option>
              </select>
            </div>
            <div class="col-sm">
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
        

          <div class="row g-3 mt-3">
            <div class="col-sm-2">
              <label class="ms-2">Status:</label>
              <select class="form-select" name="Status" id="edit_Status" value ="<?php echo $row['Status']?>" >
                <option value="leader">Leader</option>
                <option value="member">Member</option>
              </select>
            </div>
            <div class="col-sm">
              <label class="ms-2">DATE OF BIRTH:</label>
              <input class="form-control" type="date" id="edit_DBirth" name="DBirth" value ="<?php echo $row['DBirth']?>"  required />
            </div>
            <div class="col-sm">
              <label class="ms-2">PLACE OF BIRTH:</label>
              <input class="form-control" type="text" placeholder="" id="edit_PBirth" name="PBirth" value ="<?php echo $row['PBirth']?>"  required />
            </div>
          </div>

          <div class="row g-2 mt-3">
            <div class="col-sm-8">
              <label class="ms-2">RESIDENT ADDRESS:</label>
              <input class="form-control" type="text" placeholder="" name="ResidentAdd" id="edit_ResidentAdd" value ="<?php echo $row['ResidentAdd']?> " required />
            </div>
            <div class="col-sm">
              <label class="ms-2">RELIGION:</label>
              <input class="form-control" type="text" placeholder="" name="Religion" id="edit_Religion" value ="<?php echo $row['Religion']?>" required />
            </div>
          </div>

          <div class="row g-3 mt-3">
            <div class="col-sm-3">
              <label class="ms-2">Civil Status:</label>
              <select class="form-select" name="CivilStat" id="edit_CivilStat" value ="<?php echo $row['CivilStat']?>" >
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="others">Others</option>
              </select>
            </div>
            <div class="col-sm">
              <label class="ms-2">CITIZENSHIP:</label>
              <input class="form-control" type="text" placeholder="" name="Citizenship" id="edit_Citizenship" value ="<?php echo $row['Citizenship']?>"  required />
            </div>
            <div class="col-sm">
              <label class="ms-2">PHILSYs CARD NO.:</label>
              <input class="form-control" type="text" placeholder="" name="PhilCardNum" id="edit_PhilCardNum" value ="<?php echo $row['PhilCardNum']?>"  required />
            </div>
          </div>

          <div class="row g-3 mt-3">
            <div class="col-sm-3">
              <label class="ms-2">CONTACT #:</label>
              <input class="form-control" type="text" placeholder="" name="Contact" id="edit_Contact" value ="<?php echo $row['Contact']?>"  required />
            </div>
            <div class="col-sm">
              <label class="ms-2">EMAIL ADDRESS:</label>
              <input class="form-control" type="text" placeholder="" name="Email" id="edit_Email" value ="<?php echo $row['Email']?>" required />
            </div>
            <div class="col-sm">
              <label class="ms-2 fs-6">Highest Educational Attainment:</label>
              <select class="form-select ms-3" style="width:95%" name="HEA" id="edit_HEA" value ="<?php echo $row['HEA']?>">
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
              <select class="form-select ms-3" style="width:95%" name="specify" id="edit_specify" value ="<?php echo $row['specify']?>">
                <option value="Graduate">Graduate</option>
                <option value="Under Graduate">Under Graduate</option>
              </select>
            </div>
            <div class="col-sm">
              <label class="ms-2 fs-6">Details:</label>
              <select class="form-select ms-3" style="width:95%" name="detail" id="edit_detail" value ="<?php echo $row['detail']?>">
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
              <button type="submit" name="r_update" class="btn btn-primary">Save </button>
            </div>
          </div>
          </div>   
    </div>
    </form>
      
   
     
      <script>
    document.addEventListener('DOMContentLoaded', (event) => {
      
         // Handle edit modal
    var editModal = document.getElementById('residenceModal');
    editModal.addEventListener('show.bs.modal', function (event) {
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

        document.getElementById('edit_p_id').value = pId;
        document.getElementById('edit_Lname').value = Lname;
        document.getElementById('edit_Fname').value = Fname;
        document.getElementById('edit_MidName').value = MidName;
        document.getElementById('edit_EXT').value = EXT;
        document.getElementById('edit_Age').value = Age;
        document.getElementById('edit_Gender').value = Gender;
        document.getElementById('edit_purok').value = purok;
        document.getElementById('edit_Status').value = Status;
        document.getElementById('edit_DBirth').value = DBirth;
        document.getElementById('edit_PBirth').value = PBirth;
        document.getElementById('edit_ResidentAdd').value = ResidentAdd;
        document.getElementById('edit_Religion').value = Religion;
        document.getElementById('edit_CivilStat').value = CivilStat;
        document.getElementById('edit_Citizenship').value = Citizenship;
        document.getElementById('edit_PhilCardNum').value = PhilCardNum;
        document.getElementById('edit_Contact').value = Contact;
        document.getElementById('edit_Email').value = Email;
        document.getElementById('edit_HEA').value = HEA;
        document.getElementById('edit_specify').value = specify;
        document.getElementById('edit_detail').value = detail;

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

<script>
        $.widget.bridge('uibutton', $.ui.button)
      </script>
  </div>
</body>
</html>
