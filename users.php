<?php
require('config.php');
session_start();

// Ensure that the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// Fetch the list of users from the database
$query = "SELECT * FROM users";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Users List - Blood Bank Management</title>
    <link href="favicons/favicon.ico" rel="icon" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/users.css">
</head>

<body>

    <div class="container mt-5">
        <h1>Registered Users</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($user = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $user['name'] . "</td>";
                        echo "<td>" . $user['email'] . "</td>";
                        echo "<td>
                                <a href='update_user.php?id=" . $user['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete_user.php?id=" . $user['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="login.php" class="btn btn-primary">Log Out</a>
    </div>

</body>

</html>
