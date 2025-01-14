<?php
require('config.php');
session_start();

// Ensure that the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// Fetch the user's current details
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Update the user in the database
    $update_query = "UPDATE users SET name='$name', email='$email' WHERE id=$user_id";
    if (mysqli_query($con, $update_query)) {
        header("Location: users.php");
        exit;
    } else {
        echo "Error updating user.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Update User - Blood Bank Management</title>
    <link href="favicons/favicon.ico" rel="icon" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h1>Edit User Information</h1>
        <form action="" method="POST">
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>" required>
            </div>

            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
        <a href="users.php" class="btn btn-secondary mt-3">Back to User List</a>
    </div>

</body>

</html>
