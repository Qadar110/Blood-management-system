<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Here, you can send the message via email or store it in the database.
    // For example, using PHP's mail() function:
    $to = "your_email@example.com"; // Replace with your email
    $headers = "From: $email";
    $messageContent = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    if (mail($to, $subject, $messageContent, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
}
?>
