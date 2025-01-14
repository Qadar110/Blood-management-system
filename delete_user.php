<?php
require('config.php');
session_start();

// Ensure that the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Delete the user from the database
    $delete_query = "DELETE FROM users WHERE id = $user_id";
    if (mysqli_query($con, $delete_query)) {
        header("Location: users.php");
        exit;
    } else {
        echo "Error deleting user.";
    }
}
?>
