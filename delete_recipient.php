<?php
require('config.php');

// Xogta recipient-ka ee la doonayo in la tirtirro
if (isset($_GET['id'])) {
    $reci_id = $_GET['id'];
    
    // Query si loo tirtirro recipient-ka
    $query = "DELETE FROM recipient WHERE reci_id = $reci_id";
    if (mysqli_query($con, $query)) {
        header("Location: add_recipient_details.php");
        exit;
    } else {
        echo "Error deleting recipient.";
    }
}
?>
