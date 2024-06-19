<!DOCTYPE html>
<html lang="en">


<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// START THE SESSION
session_start();

$user_id = null;

// CHECK IF THE USER IS LOGGED IN
if (!isset($_SESSION['user_id']) or $_SESSION['role'] !== 'user') {
    // USER IS NOT LOGGED IN, REDIRECT TO LOGIN PAGE
    header("Location: ./register.php");
    exit();
}else{
    
    $user_id = $_SESSION['user_id'];

}

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../stylesheets/index.css">
</head>

<body>
    <!-- NAVBAR -->
    <?php require 'nav.html'; ?>

    <!-- PARALLAX SECTION 1 -->
    <div class="parallax" id="parallax1">
        <div class="text-overlay">
            <h1>Welcome to Our University Blog</h1>
            <p>Stay updated with the latest news and articles.</p>
        </div>
    </div>

    <!-- CONTENT SECTION 1 -->
    <section class="content-section">
        <div class="container">
            <h2>About Our University</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque aliquam odio et faucibus.</p>
        </div>
    </section>

    <!-- PARALLAX SECTION 2 -->
    <div class="parallax" id="parallax2">
        <div class="text-overlay">
            <h1>Our Departments</h1>
            <p>Discover the diverse range of departments we offer.</p>
        </div>
    </div>

    <!-- CONTENT SECTION 2 -->
    <section class="content-section">
        <div class="container">
            <h2>Projects</h2>
            <p>Student's projects</p>
        </div>
    </section>
    <!-- PARALLAX SECTION 4 (NEW ACTIVITY SECTION) -->
    <div class="parallax" id="parallax4">
        <div class="text-overlay">
            <h1>Activities</h1>
            <p>Engage in various activities and events.</p>
        </div>
    </div>

    <!-- CONTENT SECTION 4 (NEW ACTIVITY CONTENT) -->
    <section class="content-section">
        <div class="container">
            <h2>Our Activities</h2>
            <p>Join our wide range of activities that promote learning and engagement.</p>
        </div>
    </section>
    <!-- PARALLAX SECTION 3 -->
    <div class="parallax" id="parallax3">
        <div class="text-overlay">
            <h1>Contact Us</h1>
            <p>Get in touch with us for more information.</p>
        </div>
    </div>

    <!-- CONTENT SECTION 3 -->
    <section class="content-section">
        <div class="container">
            <h2>Contact Information</h2>
            <p>Email: info@uniq.edu.iq</p>
            <p>Phone: +964 772 141 1414</p>
        </div>
    </section>



    <!-- FOOTER -->
    <footer class="bg-dark text-white pt-4 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>About Us</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque aliquam odio et
                        faucibus.</p>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Home</a></li>
                        <li><a href="#" class="text-white">About</a></li>
                        <li><a href="#" class="text-white">Departments</a></li>
                        <li><a href="#" class="text-white">Activity</a></li>
                        <li><a href="#" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>Contact Us</h5>
                    <p><a href="mailto:info@uniq.edu.iq" class="text-white"><i class="fas fa-envelope"></i>
                            info@uniq.edu.iq</a></p>
                    <p><a href="tel:+9647721411414" class="text-white"><i class="fas fa-phone"></i> +964 772 141
                            1414</a></p>
                    <h5>Follow Us</h5>
                    <a href="https://www.facebook.com" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com" class="text-white me-2"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="bg-secondary text-center py-2">
            <p class="mb-0">&copy; 2024 University Blog. All rights reserved.</p>
        </div>
    </footer>

    <!-- BOOTSTRAP AND FONT AWESOME SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>