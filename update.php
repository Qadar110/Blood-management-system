<?php
require('config.php');

// Fetch existing donor details
if (isset($_GET['id'])) {
    $D_id = $_GET['id'];
    $query = "SELECT * FROM donor WHERE D_id='$D_id'";
    $result = mysqli_query($con, $query);
    $donor = mysqli_fetch_assoc($result);
}

// Update donor details in the database
if (isset($_POST['update'])) {
    $D_name = mysqli_real_escape_string($con, $_POST['D_name']);
    $D_age = mysqli_real_escape_string($con, $_POST['D_age']);
    $D_sex = mysqli_real_escape_string($con, $_POST['D_sex']);
    $D_phno = mysqli_real_escape_string($con, $_POST['D_phno']);
    $D_bgrp = mysqli_real_escape_string($con, $_POST['D_bgrp']);
    $HLevel = mysqli_real_escape_string($con, $_POST['HLevel']);
    $BS = mysqli_real_escape_string($con, $_POST['BS']);
    $BP = mysqli_real_escape_string($con, $_POST['BP']);

    $updateQuery = "UPDATE donor SET 
        D_name='$D_name', 
        D_age='$D_age', 
        D_sex='$D_sex', 
        D_phno='$D_phno', 
        D_bgrp='$D_bgrp', 
        HLevel='$HLevel', 
        BS='$BS', 
        BP='$BP' 
        WHERE D_id='$D_id'";

    if (mysqli_query($con, $updateQuery)) {
        header("Location: donor_details.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Donor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Update Donor Details</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="D_name" value="<?php echo $donor['D_name']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Age</label>
            <input type="number" name="D_age" value="<?php echo $donor['D_age']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Sex</label>
            <input type="text" name="D_sex" value="<?php echo $donor['D_sex']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="D_phno" value="<?php echo $donor['D_phno']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Blood Group</label>
            <input type="text" name="D_bgrp" value="<?php echo $donor['D_bgrp']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Hemoglobin Level</label>
            <input type="text" name="HLevel" value="<?php echo $donor['HLevel']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Blood Sugar</label>
            <input type="text" name="BS" value="<?php echo $donor['BS']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Blood Pressure</label>
            <input type="text" name="BP" value="<?php echo $donor['BP']; ?>" class="form-control" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
