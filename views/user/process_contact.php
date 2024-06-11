<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // SANITIZE AND VALIDATE INPUTS
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // VALIDATE EMAIL
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format'); window.location.href = 'contactus.php';</script>";
        exit();
    }

    // CHECK IF EMAIL IS karokurd45@gmail.com
    if ($email == "karokurda45@gmail.com") {
        echo "<script>alert('This email address is not allowed.'); window.location.href = 'contactus.php';</script>";
        exit();
    }

    // SIMULATE EMAIL SENDING (DISABLE ACTUAL EMAIL SENDING)
    // $to = "your_destination_email@example.com";
    // $subject = "Contact Form Submission from $name";
    // $body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage:\n$message";
    // mail($to, $subject, $body);

    // PROVIDE FEEDBACK TO THE USER
    echo "<script>alert('Your message has been received.'); window.location.href = 'contactus.php';</script>";
}
?>
