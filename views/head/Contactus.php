<!DOCTYPE html>
<html lang="en">
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
</script>
<script type="text/javascript">
   (function(){
      emailjs.init({
        publicKey: "LXHJK4XTHTA--P7_9",
      });
   })();
</script>
<?php 
// START THE SESSION
session_start();

$user_id = null;

// CHECK IF THE USER IS LOGGED IN
if (!isset($_SESSION['user_id']) or $_SESSION['role'] !== 'user') {
    // USER IS NOT LOGGED IN, REDIRECT TO LOGIN PAGE
    header("Location: ./register.php");
    exit();
} else {
    $user_id = $_SESSION['user_id'];
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../../stylesheets/contact.css">
</head>

<body>
    <!-- Navbar -->
    <?php require 'nav.html'; ?>
    <div class="contact-form">
        <h1>Contact Us</h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Contact Us</h2>
                    <form action="process_contact.php" method="post">
    <input type="text" name="name" id="name" placeholder="Enter Your Name" required>
    <input type="email" name="email" id="email" placeholder="Enter Your Email" required>
    <input type="tel" name="phone" id="phone" placeholder="Enter Your Number" required>
    <textarea name="message" id="message" placeholder="Your Message" required></textarea>
    <button type="submit" class="btn" id="btn">Send <i class="fas fa-paper-plane"></i></button>
    </form>
                </div>
                <div class="form-img">
                    <img src="../../assets/svg/Contact%20us-amico.svg" alt="contact">
                </div>
            </div>
        </div>
    </div>
</body>
<script src="contact.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
