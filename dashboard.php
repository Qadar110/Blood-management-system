<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            display: flex;
        }
        .sidebar {
            min-width: 250px;
            max-width: 250px;
            height: 100vh;
            background: #343a40;
            color: #fff;
            display: flex;
            flex-direction: column;
        }
        .sidebar .nav-link {
            color: #ddd;
            margin: 10px 0;
        }
        .sidebar .nav-link:hover {
            background: #495057;
            color: #fff;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-center py-3">Dashboard</h3>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a href="donor_registration.php" class="nav-link">
                    <i class="fas fa-user-plus"></i> Donor Registration
                </a>
            </li>
            <li class="nav-item">
                <a href="donor_details.php" class="nav-link">
                    <i class="fas fa-list"></i> Donor List
                </a>
            </li>
            <li class="nav-item">
                <a href="#about" class="nav-link">
                    <i class="fas fa-info-circle"></i> About
                </a>
            </li>
            <li class="nav-item">
                <a href="#contact" class="nav-link">
                    <i class="fas fa-envelope"></i> Contact
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div id="donor_details.php">
          
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
