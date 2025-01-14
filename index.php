<?php
// index.php

// Include the necessary files
include('config.php');  // Database connection
include('header.php');   // Optional header file

// Check if the user is logged in, otherwise redirect
session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Blood Donation Portal</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link to your styles -->
</head>
<body>
    <header>
        <h1>Welcome to the Blood Donation Portal</h1>
        <nav>
            <ul>
                <li><a href="donor_details.php">Donor Details</a></li>
                <li><a href="request_blood.php">Request Blood</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
                </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Your Dashboard</h2>
            <p>Welcome back! Here you can manage your blood donations, view requests, and more.</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Blood Donation Portal. All rights reserved.</p>
    </footer>
</body>
</html>
