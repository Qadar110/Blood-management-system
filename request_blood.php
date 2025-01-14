<?php
// Include the database connection
require('config.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reci_name'])) {
    
    // Collect and sanitize form data
    $reci_name = stripslashes($_POST['reci_name']);
    $reci_name = mysqli_real_escape_string($con, $reci_name);

    $reci_bgrp = stripslashes($_POST['reci_bgrp']);
    $reci_bgrp = mysqli_real_escape_string($con, $reci_bgrp);

    $reci_bqnty = stripslashes($_POST['reci_bqnty']);
    $reci_bqnty = mysqli_real_escape_string($con, $reci_bqnty);

    $reci_id = stripslashes($_POST['reci_id']);
    $reci_id = mysqli_real_escape_string($con, $reci_id);

    // Step 1: Check if recipient exists in the 'recipient' table
    $check_query = "SELECT * FROM recipient WHERE reci_id = '$reci_id' AND reci_name = '$reci_name'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Step 2: If recipient exists, insert the blood request into 'blood_request'
        $insert_query = "INSERT INTO blood_request (reci_name, reci_bgrp, reci_bqnty, reci_id)
                         VALUES ('$reci_name', '$reci_bgrp', '$reci_bqnty', '$reci_id')";
        
        $result = mysqli_query($con, $insert_query);

        if ($result) {
            echo "<div class='form'>
                    <h3>Blood Request registered successfully.</h3><br/>
                    <p class='link'>Click here to <a href='dashboard.php'>Dashboard</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                    <h3>There was an error processing your request.</h3><br/>
                    <p class='link'>Click here to <a href='blood_request.php'>Request again</a>.</p>
                  </div>";
        }
    } else {
        // If recipient does not exist
        echo "<div class='form'>
                <h3>Recipient does not exist. Please ensure the recipient is registered first.</h3><br/>
                <p class='link'>Click here to <a href='register_recipient.php'>Register Recipient</a></p>
              </div>";
    }
}

// Step 3: Display the list of blood requests
$query = "SELECT * FROM blood_request";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Blood Request Form</title>
    <!-- Add bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/request_blood.css">
</head>

<body>
    <div class="container">
        <form class="form" action="" method="POST">
            <h1 class="login-title">Blood Request Details</h1>
            <input type="text" class="login-input" name="reci_name" placeholder="Recipient Name" required />
            <input type="text" class="login-input" name="reci_bgrp" placeholder="Recipient Blood Group" required />
            <input type="number" class="login-input" name="reci_bqnty" placeholder="Recipient Blood Quantity" required />
            <input type="text" class="login-input" name="reci_id" placeholder="Recipient ID" required />
            <input type="submit" name="submit" value="Submit" class="btn btn-dark btn-lg register-button">
        </form>

        <!-- Display the list of blood requests -->
        <?php
        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Blood Request List</h2>";
            echo "<table class='table'>";
            echo "<thead><tr><th>Name</th><th>Blood Group</th><th>Quantity</th><th>Recipient ID</th></tr></thead><tbody>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['reci_name'] . "</td>";
                echo "<td>" . $row['reci_bgrp'] . "</td>";
                echo "<td>" . $row['reci_bqnty'] . "</td>";
                echo "<td>" . $row['reci_id'] . "</td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p>No blood requests found.</p>";
        }
        ?>
    </div>
</body>
</html>
