<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Contact Us | Blood Bank Management</title>
    <!-- favicon -->
    <link href="favicons/favicon.ico" rel="icon" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css">
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-a11y="true"></script>
</head>

<body>
    <div class="container-fluid">
        <!-- Sidebar Section -->
        <div class="row">
            <div class="col-md-3 sidebar">
               
            </div>

            <!-- Main Content Section -->
            <div class="col-md-9">
                <!-- Contact Form -->
                <div class="contact-form">
                    <h2 class="text-center mt-5">Contact Us</h2>
                    <form action="send_message.php" method="post">
                        <div class="form-group mb-3">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0n7sM8cKF7XIVH3cg5hE4H3gwfQBX2fnD3v6Do4eUq+9z0p2" crossorigin="anonymous"></script>
</body>

</html>
