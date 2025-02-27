<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Camingawan</title>
    <link href="img/logo2.png" rel="icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        
        font-family: "Courier New", Courier, monospace; /* Updated font */
    }

    .invoice-container {
        max-width: 800px;
        background: white;
        padding: 30px;
        /* Removed the top and bottom borders */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-family: "Courier New", Courier, monospace; /* Ensure all text uses Courier New */
        text-align: justify;
        margin: auto;
    }

    .header-container {
        display: flex;
        align-items: left; /* Align items vertically */
        justify-content: center; /* Center content horizontally */
        text-align: center; /* Align text properly */
        border-bottom: 3px solid black;
        padding-bottom: 10px;
        margin-bottom: 20px;
        gap: 30px; /* Add space between image and text */
    }

    .header-container img {
        max-width: 120px;
        height: auto;
    }

    .header-container .text-content {
        display: flex;
        flex-direction: column;
        text-align: center; 
        
    }

    .content {
        margin-top: 40px;
        font-size: 16px;
        font-family: "Courier New", Courier, monospace; /* Ensure content uses Courier New */
    }

    .signature {
        margin-top: 90px;
        text-align: right;
        font-weight: bold;
        font-family: "Courier New", Courier, monospace;
        margin-right: 50px;
      font-size: 18px;
     line-height: 0.5;
    }
    h3{
        font-size: 35px;
        padding: 10px;
        font-family: "Courier New", Courier, monospace;
        font-weight: bold;
    }

    .text-content h6 {
        font-size: 16px;
        font-family: "Courier New", Courier, monospace;
        line-height: 1;
        font-weight: 900;
    }
    .buttons-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        gap: 10px;
    }

    .buttons-container button {
        padding: 10px 20px;
        border: none;
        color: #fff;
        cursor: pointer;
        transition: background 0.3s;
        font-family: "Courier New", Courier, monospace;
    }

    #save {
        background-color: green;
    }

    #print {
        background-color: blue;
    }

    #save:hover,
    #print:hover {
        background-color: #333;
    }

    @media print {
        .header-container {
            border-top: none !important; 
        }
    }
</style>

</head>
<body>
<div class="invoice-container" style="box-shadow: none;">
    <div class="header-container">
        <img src="img/logo2.png" alt="Barangay Logo">
        <div class="text-content">
            <h6><b>Republic of the Philippines</b></h6>
            <h6><b>Province of Negros Occidental</b></h6>
            <h6><b>City of Kabankalan</b></h6>
            <h6><b>Barangay Camingawan</b></h6>
            <h6><b>OFFICE OF THE PUNONG BARANGAY</b></h6>
        </div>
    </div>

    <h3 class="text-center"><b>BUSINESS PERMIT</b></h3>
    <?php
    // Fetch only the most recently added data
    $sql = $conn->prepare("SELECT * FROM `business` ORDER BY `bp_id` DESC LIMIT 1");
    $sql->execute();
    if ($row = $sql->fetch()) {
    ?>
    <div class="content">
        <p style="text-indent: 40px; margin-top: 20px; line-height: 1.5;"> 
            Pursuant to th Provision of Barangay Ordinance No 003 Series of 2018. Clearance is 
            hereby granted to  <b><?php echo htmlspecialchars($row['name']); ?></b>, 
            Purok  <b><?php echo htmlspecialchars($row['purok']); ?></b>, Brgy. 
            Camingawan, Kabankalan City, Negros Occidental to pursue or engaged in business on the place set below with
            invested capital/gross sales of Php.<b><?php echo htmlspecialchars($row['capital']); ?></b>  as per application filled in the office.
        </p>

        <div class="container-fluid" style="margin-top: 30px;">
            <div class="row">
                <table>
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 20%;">kinds of Business <br> Trade, Profession</th>
                            <th class="text-center" style="width: 20%;">Place of Business <br> in the Barangay</th>
                            <th class="text-center" style="width: 15%;">Annual Barangay Clearance Fee</th>
                        </tr>
                    </thead>
                    <tbody class="table table-hover" style="font-size: 17px;">
                        <tr>
                            <td class="text-center"><?php echo $row['trade'] ?></td>
                            <td class="text-center">Purok <?php echo $row['purok'] ?></td>
                            <td class="text-center"><?php echo $row['fee'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br> 
        <p style="text-indent: 40px; line-height: 1.5;">
            This permit is good <?php echo date('Y', strtotime($row['issued'])); ?>
            unless otherwise revoked or cancelled or suspended for cause.
        </p>

        <p style="text-indent: 40px; line-height: 1.5;">
            In witness whereof, I have hereunto set my signature this <b><?php echo date('jS', strtotime($row['issued'])); ?></b> day of <b><?php echo date('F', strtotime($row['issued'])); ?></b>, <b><?php echo date('Y', strtotime($row['issued'])); ?></b> 
            at Barangay Camingawan, Kabankalan City, Negros Occidental.
        </p>
        <p>
            
            <i> Clearance Fee: <b><?php echo $row['fee']; ?></b> <br></i>
            <i>  Paid Under O.R.: __________ <br></i>
            <i> Date of Payment: <b><?php echo date('F', strtotime($row['issued'])); ?></b> <b><?php echo date('j', strtotime($row['issued'])); ?></b>, <b><?php echo date('Y', strtotime($row['issued'])); ?></b> </i>
        </p>
    </div>

    <div class="signature">
        <?php
        try {
            // Fetch data from database
            $stmt = $conn->prepare("SELECT name FROM official WHERE position = 'Captain'");
            $stmt->execute();

            // Check if any results were returned
            if ($stmt->rowCount() > 0) {
                // Output data of each row
                while ($official = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<p><b>" . htmlspecialchars($official["name"]) . "</b></p>";
                }
            } else {
                echo "<p><b>Not yet appointed</b></p>"; // Default name if no data found
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . htmlspecialchars($e->getMessage());
        }
        ?>
        <p><b>Punong Barangay </b></p>
    </div>
    <?php
    }
    ?>
</div>

<div style="page-break-before: always;"></div>

<div class="invoice-container" style="box-shadow: none;">
    <div class="header-container">
        <img src="img/logo2.png" alt="Barangay Logo">
        <div class="text-content">
            <h6><b>Republic of the Philippines</b></h6>
            <h6><b>Province of Negros Occidental</b></h6>
            <h6><b>City of Kabankalan</b></h6>
            <h6><b>Barangay Camingawan</b></h6>
            <h6><b>OFFICE OF THE PUNONG BARANGAY</b></h6>
        </div>
    </div>

    <h3 class="text-center"><b>BARANGAY CLEARANCE</b></h3>
    <?php
    // Fetch only the most recently added data
    $sql = $conn->prepare("SELECT * FROM `business` ORDER BY `bp_id` DESC LIMIT 1");
    $sql->execute();
    if ($row = $sql->fetch()) {
    ?>
    <div class="content">
    <p><b>TO WHOM IT MAY CONCERN:</b></p>
        <p style="text-indent: 40px; margin-top: 20px; line-height: 1.5;"> 
           This is to certify that <b><?php echo htmlspecialchars($row['name']); ?></b>,
           <b><?php echo htmlspecialchars($row['purok']); ?></b>, is a bonafide business
           establishment operator of this Barangay and is cleared from all its obligation due to this level.
    </p>

        <p style="text-indent: 40px; line-height: 1.5;">
           This futher certifies that the said establishment has not violated any ordinance and national
           law implemented by the goverment authorities as per record and ocular inspection.
        </p>

        <p style="text-indent: 40px; line-height: 1.5;">
            Issued on this <b><?php echo date('jS', strtotime($row['issued'])); ?></b> day of <b><?php echo date('F', strtotime($row['issued'])); ?></b>, <b><?php echo date('Y', strtotime($row['issued'])); ?></b> 
            upon request of the above-named person for Renewal of Business Permit purposes only.
        </p>
        
    </div>

    <div class="signature">
        <?php
        try {
            // Fetch data from database
            $stmt = $conn->prepare("SELECT name FROM official WHERE position = 'Captain'");
            $stmt->execute();

            // Check if any results were returned
            if ($stmt->rowCount() > 0) {
                // Output data of each row
                while ($official = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<p><b>" . htmlspecialchars($official["name"]) . "</b></p>";
                }
            } else {
                echo "<p><b>Not yet appointed</b></p>"; // Default name if no data found
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . htmlspecialchars($e->getMessage());
        }
        ?>
        <p><b>Punong Barangay </b></p>
    </div>
    <?php
    }
    ?>
</div>

<div class="buttons-container">
    <button id="save" onclick="savePDF()">Save</button>
    <button id="print" onclick="savePDF()">Print</button>
</div>
</div>
</div>
<script>
function savePDF() {
    // Hide the buttons before saving the PDF
    document.querySelector(".buttons-container").style.display = "none";

    // Use setTimeout to allow UI changes before saving
    setTimeout(() => {
        window.print(); // Simulates PDF saving (replace with actual PDF generation if needed)

        // Show the buttons again after printing
        document.querySelector(".buttons-container").style.display = "flex";
    }, 500);
}
</script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/index.js"></script>
<script src="dist/js/html2canvas.js"></script>
</html>
