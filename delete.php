<?php
require('config.php');

// Delete donor record
if (isset($_GET['id'])) {
    $D_id = $_GET['id'];
    $deleteQuery = "DELETE FROM donor WHERE D_id='$D_id'";

    if (mysqli_query($con, $deleteQuery)) {
        header("Location: donor_details.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}
?>
