<?php
require('config.php');

// Xogta recipient-ka ka hel database-ka
if (isset($_GET['id'])) {
    $reci_id = $_GET['id'];
    $query = "SELECT * FROM recipient WHERE reci_id = $reci_id";
    $result = mysqli_query($con, $query);
    $recipient = mysqli_fetch_assoc($result);
}

// Xogta cusub ee la soo geliyo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reci_name = stripslashes($_POST['reci_name']);
    $reci_name = mysqli_real_escape_string($con, $reci_name);
    $reci_age = stripslashes($_POST['reci_age']);
    $reci_age = mysqli_real_escape_string($con, $reci_age);
    $reci_sex = stripslashes($_POST['reci_sex']);
    $reci_sex = mysqli_real_escape_string($con, $reci_sex);
    $reci_phno = stripslashes($_POST['reci_phno']);
    $reci_phno = mysqli_real_escape_string($con, $reci_phno);
    $reci_bgrp = stripslashes($_POST['reci_bgrp']);
    $reci_bgrp = mysqli_real_escape_string($con, $reci_bgrp);

    // Update query
    $query = "UPDATE recipient SET reci_name='$reci_name', reci_age='$reci_age', reci_sex='$reci_sex', reci_phno='$reci_phno', reci_bgrp='$reci_bgrp' WHERE reci_id=$reci_id";
    if (mysqli_query($con, $query)) {
        echo "<div class='form'>
                <h3>Recipient updated successfully.</h3><br/>
                
              </div>";
              header("Location: add_recipient_details.php");
    } else {
        echo "<div class='form'>
                <h3>Error updating recipient. Please try again.</h3><br/>
                <p class='link'>Click here to <a href='update_recipient.php?id=$reci_id'>Try Again</a></p>
              </div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Update Recipient - Blood Bank Management</title>
    <link href="favicons/favicon.ico" rel="icon" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Recipient</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="reci_name">Name</label>
            <input type="text" class="form-control" id="reci_name" name="reci_name" value="<?php echo $recipient['reci_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="reci_age">Age</label>
            <input type="number" class="form-control" id="reci_age" name="reci_age" value="<?php echo $recipient['reci_age']; ?>" required>
        </div>
        <div class="form-group">
            <label for="reci_sex">Sex</label>
            <input type="text" class="form-control" id="reci_sex" name="reci_sex" value="<?php echo $recipient['reci_sex']; ?>" required>
        </div>
        <div class="form-group">
            <label for="reci_phno">Phone</label>
            <input type="text" class="form-control" id="reci_phno" name="reci_phno" value="<?php echo $recipient['reci_phno']; ?>" required>
        </div>
        <div class="form-group">
            <label for="reci_bgrp">Blood Group</label>
            <input type="text" class="form-control" id="reci_bgrp" name="reci_bgrp" value="<?php echo $recipient['reci_bgrp']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Recipient</button>
    </form>
</div>

</body>
</html>
