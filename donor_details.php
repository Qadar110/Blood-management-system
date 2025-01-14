<?php
require('config.php');

// When form submitted, insert values into the database.
if (isset($_REQUEST['D_name'])) {
    // removes backslashes
    $D_name = stripslashes($_REQUEST['D_name']);
    // escapes special characters in a string
    $D_name = mysqli_real_escape_string($con, $D_name);
    $D_age    = stripslashes($_REQUEST['D_age']);
    $D_age    = mysqli_real_escape_string($con, $D_age);
    $D_sex    = stripslashes($_REQUEST['D_sex']);
    $D_sex    = mysqli_real_escape_string($con, $D_sex);
    $D_phno    = stripslashes($_REQUEST['D_phno']);
    $D_phno    = mysqli_real_escape_string($con, $D_phno);
    $D_bgrp    = stripslashes($_REQUEST['D_bgrp']);
    $D_bgrp    = mysqli_real_escape_string($con, $D_bgrp);
    $HLevel    = stripslashes($_REQUEST['HLevel']);
    $HLevel    = mysqli_real_escape_string($con, $HLevel);
    $BS    = stripslashes($_REQUEST['BS']);
    $BS    = mysqli_real_escape_string($con, $BS);
    $BP    = stripslashes($_REQUEST['BP']);
    $BP    = mysqli_real_escape_string($con, $BP);

    // Insert query
    $query    = "INSERT into `donor` (D_name , D_age, D_sex, D_phno, D_bgrp, HLevel, BS, BP, rdate)
                 VALUES ('$D_name' , '$D_age', '$D_sex', '$D_phno', '$D_bgrp', '$HLevel', '$BS', '$BP', current_timestamp());";
    $result   = mysqli_query($con, $query);

    if ($result) {
        echo "<div class='form'>
                  <h3>Donor registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='dashboard.php'>go to home page</a></p>
              </div>";
    } else {
        echo "<div class='form'>
                  <h3>Error: " . mysqli_error($con) . "</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>register</a> again.</p>
              </div>";
    }
}

// Fetch all donors
$fetchQuery = "SELECT * FROM `donor`";
$resultDonors = mysqli_query($con, $fetchQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Blood Bank Management</title>
    <!-- favicon -->
    <link href="favicons/favicon.ico" rel="icon" type="image/x-icon" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/donor_details.css">
    <!-- font awesome script -->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-a11y="true"></script>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="">Blood bank management</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav_elements" id="navbarTogglerDemo02">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#aboutus">About</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="donor_details">
        <form class="form" action="" method="post">
            <h1 class="Donor-title">Registration for Donor</h1>
            <h4><center>Please enter the details of Donor below</center></h4>
            <br>
            <input type="text" class="Donor-input" name="D_name" placeholder="Name" required />
            <input type="number" class="Donor-input" name="D_age" placeholder="Age" required />
            <input type="text" class="Donor-input" name="D_sex" placeholder="Sex" required />
            <input type="text" class="Donor-input" name="D_phno" placeholder="Phone" required />
            <input type="text" class="Donor-input" name="D_bgrp" placeholder="Blood Group" required />
            <input type="text" class="Donor-input" name="HLevel" placeholder="Hemoglobin Level" required />
            <input type="text" class="Donor-input" name="BS" placeholder="Blood Sugar" required />
            <input type="text" class="Donor-input" name="BP" placeholder="Blood Pressure" required />
            <br><br>
            <input type="submit" name="submit" value="Register" class="btn btn-dark btn-lg Donor-button">
        </form>
    </div>

    <!-- Display the list of donors -->
    <div class="container mt-5">
        <h2>List of Registered Donors</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Phone</th>
                    <th>Blood Group</th>
                    <th>Hemoglobin Level</th>
                    <th>Blood Sugar</th>
                    <th>Blood Pressure</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($donor = mysqli_fetch_assoc($resultDonors)) {
                    echo "<tr>
                            <td>" . $donor['D_name'] . "</td>
                            <td>" . $donor['D_age'] . "</td>
                            <td>" . $donor['D_sex'] . "</td>
                            <td>" . $donor['D_phno'] . "</td>
                            <td>" . $donor['D_bgrp'] . "</td>
                            <td>" . $donor['HLevel'] . "</td>
                            <td>" . $donor['BS'] . "</td>
                            <td>" . $donor['BP'] . "</td>
                            <td>
                                <a href='update.php?id=" . $donor['D_id'] . "' class='btn btn-primary btn-sm'>Update</a>
                                <a href='delete.php?id=" . $donor['D_id'] . "' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
