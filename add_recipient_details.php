<?php
require('config.php');

// Xogta marka la geliyo
if (isset($_REQUEST['reci_name'])) {
    // Xogta la soo geliyey
    $reci_name = stripslashes($_REQUEST['reci_name']);
    $reci_name = mysqli_real_escape_string($con, $reci_name);
    $reci_age = stripslashes($_REQUEST['reci_age']);
    $reci_age = mysqli_real_escape_string($con, $reci_age);
    $reci_sex = stripslashes($_REQUEST['reci_sex']);
    $reci_sex = mysqli_real_escape_string($con, $reci_sex);
    $reci_phno = stripslashes($_REQUEST['reci_phno']);
    $reci_phno = mysqli_real_escape_string($con, $reci_phno);
    $reci_bgrp = stripslashes($_REQUEST['reci_bgrp']);
    $reci_bgrp = mysqli_real_escape_string($con, $reci_bgrp);

    // Query ku darista xogta
    $query = "INSERT into `recipient` (reci_name, reci_age, reci_sex, reci_phno, reci_bgrp, reci_reg_date) 
              VALUES ('$reci_name', '$reci_age', '$reci_sex', '$reci_phno', '$reci_bgrp', current_timestamp())";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<div class='form'>
                <h3>Recipient registered successfully.</h3><br/>
                <p class='link'>Click here to <a href='dashboard.php'>Dashboard</a></p>
              </div>";
    } else {
        echo "<div class='form'>
                <h3>Error in registration. Please try again.</h3><br/>
                <p class='link'>Click here to <a href='register.php'>Register again</a></p>
              </div>";
    }
}

// Xogta ka soo qaad database-ka si loo daabaco
$query = "SELECT * FROM `recipient` ORDER BY reci_reg_date DESC";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Recipient Details</title>
    <link href="favicons/favicon.ico" rel="icon" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/recipient_details.css">
</head>
<body>

<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="">Blood bank management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="dashboard.ph#aboutus">About</a></li>
            </ul>
        </div>
    </nav>
</div>

<div class="recipient_details">
    <form class="form" action="" method="post">
        <h1 class="Recipient-title">Registration</h1>
        <input type="text" class="Recipient-input" name="reci_name" placeholder="Recipient Name" required />
        <input type="number" class="Recipient-input" name="reci_age" placeholder="Recipient Age" required />
        <input type="text" class="Recipient-input" name="reci_sex" placeholder="Recipient Sex" required />
        <input type="text" class="Recipient-input" name="reci_phno" placeholder="Recipient Phone" required />
        <input type="text" class="Recipient-input" name="reci_bgrp" placeholder="Recipient Blood Group" required />
        <input type="submit" name="submit" value="Register" class="btn btn-dark btn-lg Recipient-button">
    </form>
</div>

<div class="container mt-5">
    <h2>List of Recipients</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Sex</th>
                <th>Phone</th>
                <th>Blood Group</th>
                <th>Registration Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Daabac xogta recipient-ka ee ku jirta database-ka
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>
                        <td>" . $row['reci_name'] . "</td>
                        <td>" . $row['reci_age'] . "</td>
                        <td>" . $row['reci_sex'] . "</td>
                        <td>" . $row['reci_phno'] . "</td>
                        <td>" . $row['reci_bgrp'] . "</td>
                        <td>" . $row['reci_reg_date'] . "</td>
                        <td>
                            <a href='update_recipient.php?id=" . $row['reci_id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete_recipient.php?id=" . $row['reci_id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this recipient?\");'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
