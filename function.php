 <?php
    include 'connection.php';

    ////password///
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
        $inputPassword = $_POST['password'];
    
        try {
            // Fetch the registered password from the database
            $sql = $conn->prepare("SELECT password FROM code WHERE en_id = :en_id");
            $sql->execute([':en_id' => 1]); // Replace '1' with the relevant user ID
            $storedPassword = $sql->fetchColumn();
    
            // Check if the password matches
            if (password_verify($inputPassword, $storedPassword)) {
                echo json_encode(['success' => true, 'message' => 'Password is correct.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Password is incorrect.']);
            }
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            echo json_encode(['success' => false, 'message' => 'An error occurred. Please try again later.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Password not provided.']);
    }
    
  /////household add//////

  if (isset($_POST['h_add'])) {
    try {
        // Ensure the connection is set to throw exceptions
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Extract form data
        $house_num = $_POST['house_num'];
        $purok = $_POST['purok'];
        $totalmem = $_POST['totalmem'];
        $head_fam = $_POST['head_fam'];

        // Check for existing household
        $sql = $conn->prepare("SELECT COUNT(*) FROM household WHERE house_num = :house_num");
        $sql->execute([':house_num' => $house_num]);
        $num_rows = $sql->fetchColumn();

        // Insert new household if none exists
        if ($num_rows == 0) {
            $sql = $conn->prepare("INSERT INTO household (house_num, purok, totalmem, head_fam) 
                                   VALUES (:house_num, :purok, :totalmem, :head_fam)");
            $sql->execute([
                ':house_num' => $house_num,
                ':purok' => $purok,
                ':totalmem' => $totalmem,
                ':head_fam' => $head_fam
            ]);
            header('Location: household.php?status=success');
        } else {
            header('Location: household.php?status=exists');
        }
    } catch (PDOException $e) {
        // Log the error for debugging and redirect with an error status
        error_log("Database error: " . $e->getMessage());
        header('Location: household.php?status=error');
    }
    exit();
}




       ////////  Update household  ////////////

        if (isset($_POST['h_update'])) {
            try {
                // Retrieve form data
                $data = [
                    ':house_id' => $_POST['house_id'],
                    ':house_num' => $_POST['house_num'],
                    ':purok' => $_POST['purok'],
                    ':totalmem' => $_POST['totalmem'],
                    ':head_fam' => $_POST['head_fam']
                ];
        
                // Prepare and execute update query
                $sql = "UPDATE `household` SET 
                        `house_num` = :house_num, 
                        `purok` = :purok, 
                        `totalmem` = :totalmem, 
                        `head_fam` = :head_fam 
                        WHERE `house_id` = :house_id";
                $res = $conn->prepare($sql);
                $res->execute($data);
        
                // Redirect to the same page with success status
                header('Location: household.php?status=update_success');
                exit();
            } catch (Exception $e) {
                // Log the error message and redirect with error status
                error_log($e->getMessage());
                header('Location: household.php?status=update_error&message=' . urlencode($e->getMessage()));
                exit();
            }
        }
        
        

// delete household
if (isset($_POST['h_del'])) {
    try {
        $house_id = $_POST['house_id'];
        $sql = $conn->prepare("DELETE FROM `household` WHERE `house_id` = :house_id");
        $sql->bindParam(':house_id', $house_id, PDO::PARAM_INT);
        $sql->execute();
        header('Location: household.php?status=delete_success');
        exit();
    } catch (Exception $e) {
        // Log the error message and redirect with error status
        error_log($e->getMessage());
        header('Location: household.php?status=delete_error&message=' . urlencode($e->getMessage()));
        exit();
    }
}

///// resident add /////

if (isset($_POST['r_add'])) {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Extract form data
        $Lname = $_POST['Lname'];
        $Fname = $_POST['Fname'];
        $MidName = $_POST['MidName'];
        $EXT = $_POST['EXT'];
        $Age = $_POST['Age'];
        $Gender = $_POST['Gender'];
        $purok = $_POST['purok'];
        $Status = $_POST['Status'];
        $DBirth = $_POST['DBirth'];
        $PBirth = $_POST['PBirth'];
        $ResidentAdd = $_POST['ResidentAdd']; 
        $Religion = $_POST['Religion'];
        $CivilStat = $_POST['CivilStat'];            
        $Citizenship = $_POST['Citizenship'];
        $PhilCardNum = $_POST['PhilCardNum'];
        $Contact = $_POST['Contact'];
        $Email = $_POST['Email'];
        $HEA = $_POST['HEA'];
        $specify = $_POST['specify'];
        $detail = $_POST['detail'];

        // Check for existing resident
        $sql = $conn->prepare("SELECT COUNT(*) FROM personal_info WHERE PhilCardNum = :PhilCardNum");
        $sql->execute([':PhilCardNum' => $PhilCardNum]);
        $num_rows = $sql->fetchColumn();

        // Insert new resident if none exists
        if ($num_rows == 0) {
            $sql = $conn->prepare("INSERT INTO personal_info (Lname, Fname, MidName, EXT, Age, Gender, purok, Status, DBirth, PBirth, ResidentAdd, Religion, CivilStat, Citizenship, PhilCardNum, Contact, Email, HEA, specify, detail) 
                                   VALUES (:Lname, :Fname, :MidName, :EXT, :Age, :Gender, :purok, :Status, :DBirth, :PBirth, :ResidentAdd, :Religion, :CivilStat, :Citizenship, :PhilCardNum, :Contact, :Email, :HEA, :specify, :detail)");
            $sql->execute([
                ':Lname' => $Lname,
                ':Fname' => $Fname,
                ':MidName' => $MidName,
                ':EXT' => $EXT,
                ':Age' => $Age,
                ':Gender' => $Gender,
                ':purok' => $purok,
                ':Status' => $Status,
                ':DBirth' => $DBirth,
                ':PBirth' => $PBirth,
                ':ResidentAdd' => $ResidentAdd,
                ':Religion' => $Religion,
                ':CivilStat' => $CivilStat,
                ':Citizenship' => $Citizenship,
                ':PhilCardNum' => $PhilCardNum,
                ':Contact' => $Contact,
                ':Email' => $Email,
                ':HEA' => $HEA,
                ':specify' => $specify,
                ':detail' => $detail
            ]);
            header('Location: resident.php?status=success');
        } else {
            header('Location: resident.php?status=exists');
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        header('Location: resident.php?status=error');
    }
    exit();
}


///// update resident ////
if (isset($_POST['r_update'])) {
    try {
        // Retrieve form data
        $data = [
            ':p_id' => $_POST['p_id'],
            ':Lname' => $_POST['Lname'],
            ':Fname' => $_POST['Fname'],
            ':MidName' => $_POST['MidName'],
            ':EXT' => $_POST['EXT'],
            ':Age' => $_POST['Age'],
            ':Gender' => $_POST['Gender'],
            ':purok' => $_POST['purok'],
            ':Status' => $_POST['Status'],
            ':DBirth' => $_POST['DBirth'],
            ':PBirth' => $_POST['PBirth'],
            ':ResidentAdd' => $_POST['ResidentAdd'],
            ':Religion' => $_POST['Religion'],
            ':CivilStat' => $_POST['CivilStat'],
            ':Citizenship' => $_POST['Citizenship'],
            ':PhilCardNum' => $_POST['PhilCardNum'],
            ':Contact' => $_POST['Contact'],
            ':Email' => $_POST['Email'],
            ':HEA' => $_POST['HEA'],
            ':specify' => $_POST['specify'],
            ':detail' => $_POST['detail'],
        ];

        // Prepare and execute update query
        $sql = "UPDATE `personal_info` SET 
                `Lname` = :Lname,
                `Fname` = :Fname,
                `MidName` = :MidName,
                `EXT` = :EXT,
                `Age`  = :Age,
                `Gender`  = :Gender,
                `purok`   = :purok,
                `Status`  = :Status,
                `DBirth`  = :DBirth,
                `PBirth`  = :PBirth,
                `ResidentAdd` = :ResidentAdd,
                `Religion`    = :Religion,
                `CivilStat`   = :CivilStat,
                `Citizenship` = :Citizenship,
                `PhilCardNum` = :PhilCardNum,
                `Contact`     = :Contact,
                `Email`       = :Email,
                `HEA`         = :HEA,
                `specify`     = :specify,
                `detail`      = :detail
                WHERE `p_id` = :p_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);

        
        header('Location: resident.php?status=update_success');
        exit();
    } catch (Exception $e) {
       
        error_log($e->getMessage());
        header('Location: resident.php?status=update_error&message=' . urlencode($e->getMessage()));
        exit();
    }
}

            ////delete Resident//////
            if (isset($_POST['r_del'])) {
                try {
                    $p_id = $_POST['p_id'];
                    $sql = $conn->prepare("DELETE FROM `personal_info` WHERE `p_id` = :p_id");
                    $sql->bindParam(':p_id', $p_id, PDO::PARAM_INT);
                    $sql->execute();
                    header('Location: resident.php?status=delete_success');
                    exit();
                } catch (Exception $e) {
                    // Log the error message and redirect with error status
                    error_log($e->getMessage());
                    header('Location: resident.php?status=delete_error&message=' . urlencode($e->getMessage()));
                    exit();
                }
            }

//////////////// blotter add  ////////

if (isset($_POST['b_add'])) {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Extract form data
        $daterecorded = $_POST['daterecorded']; 
        $complainant = $_POST['complainant'];
        $cage = $_POST['cage'];
        $caddress = $_POST['caddress'];
        $ccontact = $_POST['ccontact'];
        $persontocomplain = $_POST['persontocomplain'];
        $page = $_POST['page'];
        $paddress = $_POST['paddress'];
        $pcontact = $_POST['pcontact'];
        $complaint = $_POST['complaint'];
        $actiontaken = $_POST['actiontaken'];
        $status = $_POST['status'];
        $locationOfincidence = $_POST['locationOfincidence'];


        // to insert new data
        $sql = $conn->prepare("INSERT INTO blotter (daterecorded, complainant, cage, caddress, ccontact, persontocomplain, page, paddress, pcontact, complaint, actiontaken, status, locationOfincidence) 
                               VALUES (:daterecorded, :complainant, :cage, :caddress, :ccontact, :persontocomplain, :page, :paddress, :pcontact, :complaint, :actiontaken, :status, :locationOfincidence)");
        $sql->execute([
            ':daterecorded' => $daterecorded,
            ':complainant' => $complainant,
            ':cage' => $cage,
            ':caddress' => $caddress,
            ':ccontact' => $ccontact,
            ':persontocomplain' => $persontocomplain,
            ':page' => $page,
            ':paddress' => $paddress,
            ':pcontact' => $pcontact,
            ':complaint' => $complaint,
            ':actiontaken' => $actiontaken,
            ':status' => $status,
            ':locationOfincidence' => $locationOfincidence
        ]);

        header('Location: blotter.php?status=success');
    } catch (PDOException $e) {
        error_log($e->getMessage());
        header('Location: blotter.php?status=error');
    }
    exit();
}


///////////// update blotter /////////////

if (isset($_POST['b_update'])) {
    try {
        // Retrieve form data
        $data = [
            ':b_id' => $_POST['b_id'],
            ':daterecorded' => $_POST['daterecorded'],
            ':complainant' => $_POST['complainant'],
            ':cage' => $_POST['cage'],
            ':caddress' => $_POST['caddress'],
            ':ccontact' => $_POST['ccontact'],
            ':persontocomplain' => $_POST['persontocomplain'],
            ':page' => $_POST['page'],
            ':paddress' => $_POST['paddress'],
            ':pcontact' => $_POST['pcontact'],
            ':complaint' => $_POST['complaint'],
            ':actiontaken' => $_POST['actiontaken'],
            ':status' => $_POST['status'],
            ':locationOfincidence' => $_POST['locationOfincidence']   

        ];

        // Prepare and execute update query
        $sql = "UPDATE `blotter` SET 
                `daterecorded` = :daterecorded, 
                `complainant` = :complainant, 
                `cage` = :cage, 
                `caddress` = :caddress,
                `ccontact` = :ccontact, 
                `persontocomplain` = :persontocomplain,
                `page` = :page, 
                `paddress` = :paddress,
                `pcontact` = :pcontact,  
                `complaint` = :complaint, 
                `actiontaken` = :actiontaken, 
                `status` = :status, 
                `locationOfincidence` = :locationOfincidence
                WHERE `b_id` = :b_id";
        $res = $conn->prepare($sql);
        $res->execute($data);

        // Redirect to the same page with success status
        header('Location: blotter.php?status=update_success');
        exit();
    } catch (Exception $e) {
        // Log the error message and redirect with error status
        error_log($e->getMessage());
        header('Location: blotter.php?status=update_error&message=' . urlencode($e->getMessage()));
        exit();
    }
}




///////////////// delete blotter //////////////////

// delete blotter
if (isset($_POST['b_del'])) {
    try {
        $b_id = $_POST['b_id'];
        $sql = $conn->prepare("DELETE FROM `blotter` WHERE `b_id` = :b_id");
        $sql->bindParam(':b_id', $b_id, PDO::PARAM_INT);
        $sql->execute();
        header('Location: blotter.php?status=delete_success');
        exit();
    } catch (Exception $e) {
        error_log($e->getMessage());
        header('Location: blotter.php?status=delete_error&message=' . urlencode($e->getMessage()));
        exit();
    }
}


//////// purok add//////

if (isset($_POST['p_add'])) {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Extract form data
        $purok_name = $_POST['purok_name'];
        $purok_leader = $_POST['purok_leader'];
        

        // Check for existing m
        $sql = $conn->prepare("SELECT COUNT(*) FROM purok WHERE purok_name = :purok_name ");
        $sql->execute([':purok_name' => $purok_name]);
        $num_rows = $sql->fetchColumn();

        // Insert new m if none exists
        if ($num_rows == 0) {
            $sql = $conn->prepare("INSERT INTO purok (purok_name,purok_leader) 
                                   VALUES (:purok_name, :purok_leader)");
            $sql->execute([
                ':purok_name' => $purok_name,
                ':purok_leader' => $purok_leader,
                
            ]);
            header('Location: purok.php?status=success');
        } else {
            header('Location: purok.php?status=exists');
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        header('Location: purok.php?status=error');
    }
    exit();
}

////////  Update purok  ////////////

if (isset($_POST['p_update'])) {
    try {
        // Retrieve form data
      $data = [
        ':purok_id' => $_POST['purok_id'],
        ':purok_name' => $_POST['purok_name'],
        ':purok_leader' => $_POST['purok_leader']
    ];

    // Prepare and execute update query
    $sql = "UPDATE `purok` SET 
            `purok_name` = :purok_name, 
            `purok_leader` = :purok_leader 
            WHERE `purok_id` = :purok_id";
    $res = $conn->prepare($sql);
    $res->execute($data);

        // Redirect to the same page with success status
        header('Location: purok.php?status=update_success');
        exit();
    } catch (Exception $e) {
        // Log the error message and redirect with error status
        error_log($e->getMessage());
        header('Location: purok.php?status=update_error&message=' . urlencode($e->getMessage()));
        exit();
    }
}



// delete purok
if (isset($_POST['p_del'])) {
try {
$purok_id = $_POST['purok_id'];
$sql = $conn->prepare("DELETE FROM `purok` WHERE `purok_id` = :purok_id");
$sql->bindParam(':purok_id', $purok_id, PDO::PARAM_INT);
$sql->execute();
header('Location: purok.php?status=delete_success');
exit();
} catch (Exception $e) {
// Log the error message and redirect with error status
error_log($e->getMessage());
header('Location: purok.php?status=delete_error&message=' . urlencode($e->getMessage()));
exit();
}
}


///// indigency add///


if (isset($_POST['indigency_add'])) {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $issue = $_POST['issue'];
        $name = $_POST['name'];
        $purok = $_POST['purok'];
        $purpose = $_POST['purpose'];


        if ($num_rows == 0) {
            $sql = $conn->prepare("INSERT INTO indigency (issue, name, purok, purpose) 
                                   VALUES (:issue, :name, :purok, :purpose)");
            $sql->execute([
                ':issue' => $issue,
                ':name' => $name,
                ':purok' => $purok,
                ':purpose' => $purpose
            ]);
            header('Location: indigency.php?status=success');
        } else {
            header('Location: indigency.php?status=exists');
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        header('Location: indigency.php?status=error');
    }
    exit();
}


///////////indigency update///////////

if (isset($_POST['indigency_update'])) {
    try {
        // Retrieve form data
        $data = [
            ':bi_id' => $_POST['bi_id'],
            ':issue' => $_POST['issue'],
            ':name' => $_POST['name'],
            ':purok' => $_POST['purok'], 
            ':purpose' => $_POST['purpose']
        ];

        // Prepare and execute update query
        $sql = "UPDATE `indigency` SET 
                `issue` = :issue,
                `name` = :name, 
                `purok` = :purok,  
                `purpose` = :purpose 
                WHERE `bi_id` = :bi_id";
        $res = $conn->prepare($sql);
        $res->execute($data);

        // Redirect to the same page with success status
        header('Location: indigency.php?status=update_success');
        exit();
    } catch (Exception $e) {
        // Log the error message and redirect with error status
        error_log($e->getMessage());
        header('Location: indigency.php?status=update_error&message=' . urlencode($e->getMessage()));
        exit();
    }
}


///////indigency delete/////////////

if (isset($_POST['indigency_del'])) {
    try {
        $bi_id = $_POST['bi_id'];
        $sql = $conn->prepare("DELETE FROM `indigency` WHERE `bi_id` = :bi_id");
        $sql->bindParam(':bi_id', $bi_id, PDO::PARAM_INT);
        $sql->execute();
        header('Location: indigency.php?status=delete_success');
        exit();
    } catch (Exception $e) {
        // Log the error message and redirect with error status
        error_log($e->getMessage());
        header('Location: indigency.php?status=delete_error&message=' . urlencode($e->getMessage()));
        exit();
    }
}


//////clearance add //////

if (isset($_POST['clearance_add'])) {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $fname = $_POST['fname'];
        $purok = $_POST['purok'];
        $Daccomplish = $_POST['Daccomplish'];
        $purpose = $_POST['purpose'];


        if ($num_rows == 0) {
            $sql = $conn->prepare("INSERT INTO clearance (fname, purok, Daccomplish, purpose) 
                                   VALUES (:fname, :purok, :Daccomplish, :purpose)");
            $sql->execute([
                ':fname' => $fname,
                ':purok' => $purok,
                ':Daccomplish' => $Daccomplish,
                ':purpose' => $purpose
            ]);
            header('Location: clearance.php?status=success');
        } else {
            header('Location: clearance.php?status=exists');
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        header('Location: clearance.php?status=error');
    }
    exit();
}





       ////////  Update clearance  ////////////

       if (isset($_POST['clearance_update'])) {
        try {
            // Retrieve form data
            $data = [
                ':c_id' => $_POST['c_id'],
                ':fname' => $_POST['fname'],
                ':purok' => $_POST['purok'],
                ':Daccomplish' => $_POST['Daccomplish'], 
                ':purpose' => $_POST['purpose']
            ];
    
            // Prepare and execute update query
            $sql = "UPDATE `clearance` SET 
                    `fname` = :fname,
                    `purok` = :purok, 
                    `Daccomplish` = :Daccomplish,  
                    `purpose` = :purpose 
                    WHERE `c_id` = :c_id";
            $res = $conn->prepare($sql);
            $res->execute($data);
    
            // Redirect to the same page with success status
            header('Location: clearance.php?status=update_success');
            exit();
        } catch (Exception $e) {
            // Log the error message and redirect with error status
            error_log($e->getMessage());
            header('Location: clearance.php?status=update_error&message=' . urlencode($e->getMessage()));
            exit();
        }
    }

// delete clearance
if (isset($_POST['clearance_del'])) {
    try {
        $c_id = $_POST['c_id'];
        $sql = $conn->prepare("DELETE FROM `clearance` WHERE `c_id` = :c_id");
        $sql->bindParam(':c_id', $c_id, PDO::PARAM_INT);
        $sql->execute();
        header('Location: clearance.php?status=delete_success');
        exit();
    } catch (Exception $e) {
        // Log the error message and redirect with error status
        error_log($e->getMessage());
        header('Location: clearance.php?status=delete_error&message=' . urlencode($e->getMessage()));
        exit();
    }
}



//////certificate add //////

if (isset($_POST['certification_add'])) {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Extract form data
        $fname = $_POST['fname'];
        $purok = $_POST['purok'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $death_date = $_POST['death_date'];
        $pname = $_POST['pname'];
        $purpose = $_POST['purpose'];
        $date_complish = $_POST['date_complish'];

        $sql = $conn->prepare("SELECT COUNT(*) FROM certificate WHERE name = :name");
        $sql->execute([':name' => $name]);
        $num_rows = $sql->fetchColumn();

        // Insert new household if none exists
        if ($num_rows == 0) {
            $sql = $conn->prepare("INSERT INTO certificate (fname, purok, name, age, death_date, pname, purpose, date_complish) 
                                   VALUES (:fname, :purok, :name, :age, :death_date, :pname, :purpose, :date_complish)");
            $sql->execute([
                ':fname' => $fname,
                ':purok' => $purok,
                ':name' => $name,
                ':age' => $age,
                ':death_date' => $death_date,
                ':pname' => $pname,
                ':purpose' => $purpose,
                ':date_complish' => $date_complish
            ]);
            header('Location: certificate.php?status=success');
        } else {
            header('Location: certificate.php?status=exists');
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        header('Location: certificate.php?status=error');
    }
    exit();
}



       ////////  Update certificate  ////////////

        if (isset($_POST['certification_update'])) {
            try {
                // Retrieve form data
                $data = [
                    ':bc_id' => $_POST['bc_id'],
                    ':fname' => $_POST['fname'],
                    ':purok' => $_POST['purok'],
                    ':name' => $_POST['name'],
                    ':age' => $_POST['age'],
                    ':death_date' => $_POST['death_date'],
                    ':pname' => $_POST['pname'],
                    ':purpose' => $_POST['purpose'],
                    ':date_complish' => $_POST['date_complish']
                ];
        
                // Prepare and execute update query
                $sql = "UPDATE `certificate` SET 
                        `fname` = :fname, 
                        `purok` = :purok, 
                        `name` = :name, 
                         `age` = :age, 
                        `death_date` = :death_date, 
                        `pname` = :pname, 
                        `purpose` = :purpose,
                         `date_complish` = :date_complish 
                        WHERE `bc_id` = :bc_id";
                $res = $conn->prepare($sql);
                $res->execute($data);
        
                // Redirect to the same page with success status
                header('Location: certificate.php?status=update_success');
                exit();
            } catch (Exception $e) {
                // Log the error message and redirect with error status
                error_log($e->getMessage());
                header('Location: certificate.php?status=update_error&message=' . urlencode($e->getMessage()));
                exit();
            }
        }
        
        

// delete certificate
if (isset($_POST['certification_del'])) {
    try {
        $bc_id = $_POST['bc_id'];
        $sql = $conn->prepare("DELETE FROM `certificate` WHERE `bc_id` = :bc_id");
        $sql->bindParam(':bc_id', $bc_id, PDO::PARAM_INT);
        $sql->execute();
        header('Location: certificate.php?status=delete_success');
        exit();
    } catch (Exception $e) {
        // Log the error message and redirect with error status
        error_log($e->getMessage());
        header('Location: certificate.php?status=delete_error&message=' . urlencode($e->getMessage()));
        exit();
    }
}


//////residency add //////

if (isset($_POST['residency_add'])) {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       
        // Extract form data
     $accomplish = $_POST['accomplish'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $purok = $_POST['purok'];
        $year = $_POST['year'];
        $purpose = $_POST['purpose'];
       
        $sql = $conn->prepare("SELECT COUNT(*) FROM residency WHERE name = :name");
        $sql->execute([':name' => $name]);
        $num_rows = $sql->fetchColumn();

        // Insert new household if none exists
        if ($num_rows == 0) {
            $sql = $conn->prepare("INSERT INTO residency (accomplish, name, age, purok,  year, purpose) 
                                   VALUES (:accomplish, :name, :age, :purok, :year, :purpose )");
            $sql->execute([ 
                ':accomplish' => $accomplish,
                ':name' => $name,
                ':age' => $age,
                ':purok' => $purok,
                ':year' => $year,
                ':purpose' => $purpose
               
            ]);
            header('Location: residency.php?status=success');
        } else {
            header('Location: residency.php?status=exists');
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        header('Location: residency.php?status=error');
    }
    exit();
}



       ////////  Update residency  ////////////

        if (isset($_POST['residency_update'])) {
            try {
                // Retrieve form data
                $data = [
                    ':br_id' => $_POST['br_id'],
                    ':accomplish' => $_POST['accomplish'],
                    ':name' => $_POST['name'],
                    ':age' => $_POST['age'],
                    ':purok' => $_POST['purok'],
                    ':year' => $_POST['year'],
                    ':purpose' => $_POST['purpose']
                    
                ];
        
                // Prepare and execute update query
                $sql = "UPDATE `residency` SET 
                `accomplish` = :accomplish,
                         `name` = :name, 
                        `age` = :age,
                        `purok` = :purok, 
                        `year` = :year,  
                        `purpose` = :purpose
                        WHERE `br_id` = :br_id";
                $res = $conn->prepare($sql);
                $res->execute($data);
        
                // Redirect to the same page with success status
                header('Location: residency.php?status=update_success');
                exit();
            } catch (Exception $e) {
                // Log the error message and redirect with error status
                error_log($e->getMessage());
                header('Location: residency.php?status=update_error&message=' . urlencode($e->getMessage()));
                exit();
            }
        }
        
        

// delete residency
if (isset($_POST['residency_del'])) {
    try {
        $br_id = $_POST['br_id'];
        $sql = $conn->prepare("DELETE FROM `residency` WHERE `br_id` = :br_id");
        $sql->bindParam(':br_id', $br_id, PDO::PARAM_INT);
        $sql->execute();
        header('Location: residency.php?status=delete_success');
        exit();
    } catch (Exception $e) {
        // Log the error message and redirect with error status
        error_log($e->getMessage());
        header('Location: residency.php?status=delete_error&message=' . urlencode($e->getMessage()));
        exit();
    }
}


//////business add //////

if (isset($_POST['business_add'])) {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Extract form data 
        $issued = $_POST['issued'];
        $name = $_POST['name'];
        $purok = $_POST['purok'];
        $capital = $_POST['capital'];
        $fee = $_POST['fee'];
        $trade = $_POST['trade'];

        $sql = $conn->prepare("SELECT COUNT(*) FROM business WHERE name = :name");
        $sql->execute([':name' => $name]);
        $num_rows = $sql->fetchColumn();

        // Insert new household if none exists
        if ($num_rows == 0) {
            $sql = $conn->prepare("INSERT INTO business (issued, name, purok, capital, fee, trade) 
                                   VALUES (:issued, :name, :purok, :capital, :fee, :trade)");
            $sql->execute([
                ':issued' => $issued,
                ':name' => $name,
                ':purok' => $purok,
                ':capital' => $capital,
                ':fee' => $fee,
                ':trade' => $trade
            ]);
            header('Location: business.php?status=success');
        } else {
            header('Location: business.php?status=exists');
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        header('Location: business.php?status=error');
    }
    exit();
}



       ////////  Update business  ////////////

        if (isset($_POST['business_update'])) {
            try {
                // Retrieve form data
                $data = [
                    ':bp_id' => $_POST['bp_id'],
                    ':issued' => $_POST['issued'],
                    ':name' => $_POST['name'],
                    ':purok' => $_POST['purok'],
                    ':capital' => $_POST['capital'],
                    ':fee' => $_POST['fee'],
                    ':trade' => $_POST['trade']
                ];
        
                // Prepare and execute update query
                $sql = "UPDATE `business` SET 
                         `issued` = :issued,
                        `name` = :name, 
                        `purok` = :purok,
                        `capital` = :capital,
                        `fee` = :fee, 
                        `trade` = :trade 
                        WHERE `bp_id` = :bp_id";
                $res = $conn->prepare($sql);
                $res->execute($data);
        
                // Redirect to the same page with success status
                header('Location: business.php?status=update_success');
                exit();
            } catch (Exception $e) {
                // Log the error message and redirect with error status
                error_log($e->getMessage());
                header('Location: business.php?status=update_error&message=' . urlencode($e->getMessage()));
                exit();
            }
        }
        
        

// delete business
if (isset($_POST['business_del'])) {
    try {
        $bp_id = $_POST['bp_id'];
        $sql = $conn->prepare("DELETE FROM `business` WHERE `bp_id` = :bp_id");
        $sql->bindParam(':bp_id', $bp_id, PDO::PARAM_INT);
        $sql->execute();
        header('Location: business.php?status=delete_success');
        exit();
    } catch (Exception $e) {
        // Log the error message and redirect with error status
        error_log($e->getMessage());
        header('Location: business.php?status=delete_error&message=' . urlencode($e->getMessage()));
        exit();
    }
}



///// resident add /////

if (isset($_POST['PL_add'])) {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Extract form data
        $Lname = $_POST['Lname'];
        $Fname = $_POST['Fname'];
        $MidName = $_POST['MidName'];
        $EXT = $_POST['EXT'];
        $Age = $_POST['Age'];
        $Gender = $_POST['Gender'];
        $purok = $_POST['purok'];
        $Status = $_POST['Status'];
        $DBirth = $_POST['DBirth'];
        $PBirth = $_POST['PBirth'];
        $ResidentAdd = $_POST['ResidentAdd']; 
        $Religion = $_POST['Religion'];
        $CivilStat = $_POST['CivilStat'];            
        $Citizenship = $_POST['Citizenship'];
        $PhilCardNum = $_POST['PhilCardNum'];
        $Contact = $_POST['Contact'];
        $Email = $_POST['Email'];
        $HEA = $_POST['HEA'];
        $specify = $_POST['specify'];
        $detail = $_POST['detail'];

        // Check for existing resident
        $sql = $conn->prepare("SELECT COUNT(*) FROM personal_info WHERE PhilCardNum = :PhilCardNum");
        $sql->execute([':PhilCardNum' => $PhilCardNum]);
        $num_rows = $sql->fetchColumn();

        // Insert new resident if none exists
        if ($num_rows == 0) {
            $sql = $conn->prepare("INSERT INTO personal_info (Lname, Fname, MidName, EXT, Age, Gender, purok, Status, DBirth, PBirth, ResidentAdd, Religion, CivilStat, Citizenship, PhilCardNum, Contact, Email, HEA, specify, detail) 
                                   VALUES (:Lname, :Fname, :MidName, :EXT, :Age, :Gender, :purok, :Status, :DBirth, :PBirth, :ResidentAdd, :Religion, :CivilStat, :Citizenship, :PhilCardNum, :Contact, :Email, :HEA, :specify, :detail)");
            $sql->execute([
                ':Lname' => $Lname,
                ':Fname' => $Fname,
                ':MidName' => $MidName,
                ':EXT' => $EXT,
                ':Age' => $Age,
                ':Gender' => $Gender,
                ':purok' => $purok,
                ':Status' => $Status,
                ':DBirth' => $DBirth,
                ':PBirth' => $PBirth,
                ':ResidentAdd' => $ResidentAdd,
                ':Religion' => $Religion,
                ':CivilStat' => $CivilStat,
                ':Citizenship' => $Citizenship,
                ':PhilCardNum' => $PhilCardNum,
                ':Contact' => $Contact,
                ':Email' => $Email,
                ':HEA' => $HEA,
                ':specify' => $specify,
                ':detail' => $detail
            ]);
            header('Location: lead.php?status=success');
        } else {
            header('Location: lead.php?status=exists');
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        header('Location: lead.php?status=error');
    }
    exit();
}


///// update mresident ////
if (isset($_POST['PL_update'])) {
    try {
        // Retrieve form data
        $data = [
            ':p_id' => $_POST['p_id'],
            ':Lname' => $_POST['Lname'],
            ':Fname' => $_POST['Fname'],
            ':MidName' => $_POST['MidName'],
            ':EXT' => $_POST['EXT'],
            ':Age' => $_POST['Age'],
            ':Gender' => $_POST['Gender'],
            ':purok' => $_POST['purok'],
            ':Status' => $_POST['Status'],
            ':DBirth' => $_POST['DBirth'],
            ':PBirth' => $_POST['PBirth'],
            ':ResidentAdd' => $_POST['ResidentAdd'],
            ':Religion' => $_POST['Religion'],
            ':CivilStat' => $_POST['CivilStat'],
            ':Citizenship' => $_POST['Citizenship'],
            ':PhilCardNum' => $_POST['PhilCardNum'],
            ':Contact' => $_POST['Contact'],
            ':Email' => $_POST['Email'],
            ':HEA' => $_POST['HEA'],
            ':specify' => $_POST['specify'],
            ':detail' => $_POST['detail'],
        ];

        // Prepare and execute update query
        $sql = "UPDATE `personal_info` SET 
                `Lname` = :Lname,
                `Fname` = :Fname,
                `MidName` = :MidName,
                `EXT` = :EXT,
                `Age`  = :Age,
                `Gender`  = :Gender,
                `purok`   = :purok,
                `Status`  = :Status,
                `DBirth`  = :DBirth,
                `PBirth`  = :PBirth,
                `ResidentAdd` = :ResidentAdd,
                `Religion`    = :Religion,
                `CivilStat`   = :CivilStat,
                `Citizenship` = :Citizenship,
                `PhilCardNum` = :PhilCardNum,
                `Contact`     = :Contact,
                `Email`       = :Email,
                `HEA`         = :HEA,
                `specify`     = :specify,
                `detail`      = :detail
                WHERE `p_id` = :p_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);

        
        header('Location: lead.php?status=update_success');
        exit();
    } catch (Exception $e) {
       
        error_log($e->getMessage());
        header('Location: lead.php?status=update_error&message=' . urlencode($e->getMessage()));
        exit();
    }
}

// delete user

if (isset($_POST['u_del'])) {
    try {
        $id = $_POST['id'];
        $sql = $conn->prepare("DELETE FROM `users` WHERE `id` = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        header('Location: purAcc.php?status=delete_success');
        exit();
    } catch (Exception $e) {
        error_log($e->getMessage());
        header('Location: purAcc.php?status=delete_error&message=' . urlencode($e->getMessage()));
        exit();
    }
}

// delete appointment

if (isset($_POST['appoint_del'])) {
    try {
        $app_id = $_POST['app_id'];
        $sql = $conn->prepare("DELETE FROM `appointment` WHERE `app_id` = :app_id");
        $sql->bindParam(':app_id', $app_id, PDO::PARAM_INT);
        $sql->execute();
        header('Location: app.php?status=delete_success');
        exit();
    } catch (Exception $e) {
        error_log($e->getMessage());
        header('Location: app.php?status=delete_error&message=' . urlencode($e->getMessage()));
        exit();
    }
}

////////// add official///////
if (isset($_POST['official_add'])) {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Extract form data 
        $name = $_POST['name'];
        $position = $_POST['position'];
        $contact = $_POST['contact'];

        $sql = $conn->prepare("SELECT COUNT(*) FROM official WHERE name = :name");
        $sql->execute([':name' => $name]);
        $num_rows = $sql->fetchColumn();

        // Insert new household if none exists
        if ($num_rows == 0) {
            $sql = $conn->prepare("INSERT INTO official (name, position, contact) 
                                   VALUES (:name, :position, :contact)");
            $sql->execute([
                ':name' => $name,
                ':position' => $position,
                ':contact' => $contact
            ]);
            header('Location: official.php?status=success');
        } else {
            header('Location: official.php?status=exists');
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        header('Location: oficial.php?status=error');
    }
    exit();
}


       ////////  Update official  ////////////

        if (isset($_POST['official_update'])) {
            try {
                // Retrieve form data
                $data = [
                    ':f_id' => $_POST['f_id'],
                    ':name' => $_POST['name'],
                    ':position' => $_POST['position'],
                    ':contact' => $_POST['contact']
                ];
        
                // Prepare and execute update query
                $sql = "UPDATE `official` SET 
                        `name` = :name, 
                        `position` = :position, 
                        `contact` = :contact 
                        WHERE `f_id` = :f_id";
                $offi = $conn->prepare($sql);
                $offi->execute($data);
        
                // Redirect to the same page with success status
                header('Location: official.php?status=update_success');
                exit();
            } catch (Exception $e) {
                // Log the error message and redirect with error status
                error_log($e->getMessage());
                header('Location: official.php?status=update_error&message=' . urlencode($e->getMessage()));
                exit();
            }
        }
        
        

// delete official
if (isset($_POST['official_del'])) {
    try {
        $f_id = $_POST['f_id'];
        $sql = $conn->prepare("DELETE FROM `official` WHERE `f_id` = :f_id");
        $sql->bindParam(':f_id', $f_id, PDO::PARAM_INT);
        $sql->execute();
        header('Location: official.php?status=delete_success');
        exit();
    } catch (Exception $e) {
        // Log the error message and redirect with error status
        error_log($e->getMessage());
        header('Location: official.php?status=delete_error&message=' . urlencode($e->getMessage()));
        exit();
    }
}

////////// add official///////
if (isset($_POST['puroff_add'])) {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Extract form data 
        $POname = $_POST['POname'];
        $purok_officer = $_POST['purok_officer'];

        $sql = $conn->prepare("SELECT COUNT(*) FROM purok_official WHERE POname = :POname");
        $sql->execute([':POname' => $POname]);
        $num_rows = $sql->fetchColumn();

        // Insert new household if none exists
        if ($num_rows == 0) {
            $sql = $conn->prepare("INSERT INTO purok_official (POname, purok_officer) 
                                   VALUES (:POname, :purok_officer)");
            $sql->execute([
                ':POname' => $POname,
                ':purok_officer' => $purok_officer
            ]);
            header('Location: purok_off.php?status=success');
        } else {
            header('Location: purok_off.php?status=exists');
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        header('Location: purok_off.php?status=error');
    }
    exit();
}


       ////////  Update official  ////////////

        if (isset($_POST['puroff_update'])) {
            try {
                // Retrieve form data
                $data = [
                    ':po_id' => $_POST['po_id'],
                    ':POname' => $_POST['POname'],
                    ':purok_officer' => $_POST['purok_officer']
                ];
        
                // Prepare and execute update query
                $sql = "UPDATE `purok_official` SET 
                        `POname` = :POname, 
                        `purok_officer` = :purok_officer
                        WHERE `po_id` = :po_id";
                $offi = $conn->prepare($sql);
                $offi->execute($data);
        
                // Redirect to the same page with success status
                header('Location: purok_off.php?status=update_success');
                exit();
            } catch (Exception $e) {
                // Log the error message and redirect with error status
                error_log($e->getMessage());
                header('Location: purok_off.php?status=update_error&message=' . urlencode($e->getMessage()));
                exit();
            }
        }
        
        

?>

