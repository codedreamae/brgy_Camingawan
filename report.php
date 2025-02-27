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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+57mN4Q4pI5tyBmH7ZivO59SmHY9I" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/js/jquery.overlayScrollbars.min.js" integrity="sha384-X5XYO5sZ5h3Aq/zyX5Xh0bONoI2xF8mXFNFFLCPBeSuyUsS7EoP26L45ePxFzZ1J" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>  
  <script src="dist/js/Script.js"></script>
  <script src="dist/js/pages/dashboard.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="dist/js/bootstrap.bundle.js"></script>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

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
              <a href="document.php" class="nav-link">
                <i class="nav-icon fas fa-file fs-4"></i>
                <p class="fs-5 ms-3">Documents</p>
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
              <a href="purAcc.php" class="nav-link">
                <i class="nav-icon fa-solid fa-unlock fs-4"></i>
                <p class="fs-5 ms-3">Officials Access</p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="official.php" class="nav-link">
                <i class="nav-icon fas fa-users fs-4"></i>
                <p class="fs-5 ms-2">Barangay Officials</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <?php
// Fetch data from database for gender distribution
$sql_female = $conn->prepare("SELECT COUNT(*) as count FROM personal_info WHERE gender = 'female'");
$sql_female->execute();
$count_female = $sql_female->fetch(PDO::FETCH_ASSOC)['count'];

$sql_male = $conn->prepare("SELECT COUNT(*) as count FROM personal_info WHERE gender = 'male'");
$sql_male->execute();
$count_male = $sql_male->fetch(PDO::FETCH_ASSOC)['count'];

$total_count = $count_female + $count_male;

// Calculate percentages
$percent_female = ($count_female / $total_count) * 100;
$percent_male = ($count_male / $total_count) * 100;

// Prepare data points for gender distribution
$dataPointsGender = array( 
    array("label" => "Female", "y" => round($percent_female)),
    array("label" => "Male", "y" => round($percent_male))
);

// Fetch data from database for educational attainment
$dataPointsEducation = array();

// SQL queries to count the number of each educational attainment
$queries = array(
    array("query" => "SELECT COUNT(*) as count FROM personal_info WHERE HEA = 'Elementary'", "label" => "Elementary"),
    array("query" => "SELECT COUNT(*) as count FROM personal_info WHERE HEA = 'High School'", "label" => "High School"),
    array("query" => "SELECT COUNT(*) as count FROM personal_info WHERE HEA = 'College'", "label" => "College"),
    array("query" => "SELECT COUNT(*) as count FROM personal_info WHERE HEA = 'Post Grad'", "label" => "Post Grad"),
    array("query" => "SELECT COUNT(*) as count FROM personal_info WHERE HEA = 'Vocational'", "label" => "Vocational")
);

// Execute each query and populate the dataPoints array for educational attainment
foreach ($queries as $queryData) {
    $sql = $conn->prepare($queryData["query"]);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    $dataPointsEducation[] = array("y" => $row["count"], "label" => $queryData["label"]);
}

$dataPointsDocument = array();

// SQL queries to count the number of each document type
$queries = array(
    "SELECT 'Clearance' as label, COUNT(*) as count FROM clearance",
    "SELECT 'Certification' as label, COUNT(*) as count FROM certificate",
    "SELECT 'Residency' as label, COUNT(*) as count FROM residency",
    "SELECT 'Indigency' as label, COUNT(*) as count FROM indigency",
    "SELECT 'Business Permit' as label, COUNT(*) as count FROM business"
);

// Execute each query and populate the dataPoints array
foreach ($queries as $query) {
    $sql = $conn->prepare($query);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $dataPointsDocument[] = array("y" => $row["count"], "label" => $row["label"]);
    }
}

//HEA

$sql = "
SELECT sub.group AS `group`, COUNT(pi.age) AS `count`
FROM personal_info pi
INNER JOIN (
    SELECT 18 AS min_age, 20 AS max_age, '18-20' AS `group`
    UNION ALL 
    SELECT 21, 30, '21-30'
    UNION ALL
    SELECT 31, 40, '31-40'
    UNION ALL
    SELECT 41, 50, '41-50'
    UNION ALL
    SELECT 51, 60, '51-60'
    UNION ALL
    SELECT 61, 70, '61-70'
) sub
ON pi.age BETWEEN sub.min_age AND sub.max_age
GROUP BY sub.group
";

$result = $conn->query($sql);

// Prepare data for graphs display
$dataPointshea = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $dataPointshea[] = array("label" => $row['group'], "y" => (int)$row['count']);
}

$conn = null;
?>

  <style>
        #chartContainer1, #chartContainer2, #chartContainer3, #chartContainer4 {
            height: 300px; 
            width: 100%; 
        }
        @media (max-width: 768px) {
            #chartContainer1, #chartContainer2, #chartContainer3, #chartContainer4 {
                height: 300px; 
            }
        }
        @media (max-width: 576px) {
            #chartContainer1, #chartContainer2, #chartContainer3, #chartContainer4 {
                height: 250px; 
            }
        }
    </style>
    <script type="text/javascript">
    window.onload = function() {
        // Sex Distribution Chart
        var chart1 = new CanvasJS.Chart("chartContainer1", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: ""
            },
            data: [{
                type: "pie",
                indexLabel: "{y}%", // Display percentage as a whole number
                indexLabelPlacement: "inside",
                indexLabelFontColor: "#36454F",
                indexLabelFontSize: 18,
                indexLabelFontWeight: "bolder",
                showInLegend: true,
                legendText: "{label}",
                dataPoints: <?php echo json_encode($dataPointsGender, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart1.render();

        // Educational Attainment Chart
        var chart2 = new CanvasJS.Chart("chartContainer2", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: ""
            },
            data: [{
                type: "doughnut",
                indexLabel: "{label} - {y}",
                yValueFormatString: "#,##0",
                showInLegend: true,
                legendText: "{label} : {y}",
                dataPoints: <?php echo json_encode($dataPointsEducation, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart2.render();

        // Document Statistics Chart
        var chart3 = new CanvasJS.Chart("chartContainer3", {
            theme: "light2", 
            animationEnabled: true,     
            title:{
                text: ""
            },
            axisY: {
                interval: 1,
                valueFormatString: "0"
            },
            data: [{
                type: "column",
                dataPoints: <?php echo json_encode($dataPointsDocument, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart3.render();

        // HEA Chart
        var chart4 = new CanvasJS.Chart("chartContainer4", {
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title:{
                text: ""
            },
            axisY: {
                title: "Number of People",
                includeZero: true,
                interval: 1 // Ensure the y-axis displays whole numbers
            },
            data: [{
                type: "column", // Change type to bar, line, area, pie, etc.
                dataPoints: <?php echo json_encode($dataPointshea, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart4.render();
    }
    </script>
</head>
<body>
    <div class="container my-5 mt-2">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header text-center">
                      <b>Sex Distribution</b>  
                    </div>
                    <div class="card-body">
                        <div id="chartContainer1"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header text-center">
                     <b> Educational Attainment</b>  
                    </div>
                    <div class="card-body">
                        <div id="chartContainer2"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header text-center">
                      <b>Documents Statistics</b>  
                    </div>
                    <div class="card-body">
                        <div id="chartContainer3"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header text-center">
                     <b> Age Distribution Statistical Report</b>  
                    </div>
                    <div class="card-body">
                        <div id="chartContainer4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

