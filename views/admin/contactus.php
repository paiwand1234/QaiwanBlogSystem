<!DOCTYPE html>
<html lang="en">
<?php 


// START THE SESSION
session_start();

$user_id = null;
// CHECK IF THE USER IS LOGGED IN
if (!isset($_SESSION['user_id']) && $_SESSION['role'] !== 'admin') {
    // USER IS NOT LOGGED IN, REDIRECT TO LOGIN PAGE
    header("Location: ./login.php");
    exit();
}else{
    
    $user_id = $_SESSION['user_id'];

}


?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../../stylesheets/contact.css">
</head>
<style>
    * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #90C5F9;
            padding: 15px 0;
            border:2px solid #fff;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .logo {
            color: #fff;
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
        }

        .nav-links {
            list-style: none;
            display: flex;
        }

        .nav-links li {
            margin-right: 20px;
        }

        .nav-links li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .nav-links li a:hover {
            color: #3465ba;
        }

        .search-form {
            display: none;
        }

        .burger {
            display: none;
        }

        @media screen and (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .search-form {
                display: block;
                margin-right: auto;
            }

            .nav-active {
                display: flex;
                flex-direction: column;
                position: absolute;
                top: 70px;
                right: 20px;
                background-color: #90C5F9;
                width: 50%;
                padding: 10px;
                border-radius: 5px;
                z-index: 99;
                animation: navSlide 0.5s ease forwards;
            }

            @keyframes navSlide {
                from {
                    opacity: 0;
                    transform: translateY(-50px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .nav-active li {
                opacity: 0;
            }

            .nav-active li a {
                color: #fff;
                text-decoration: none;
                margin: 10px 0;
                opacity: 1;
                transition: opacity 0.5s ease;
            }

            .burger {
                display: block;
                cursor: pointer;
            }

            .burger .line {
                width: 25px;
                height: 3px;
                background-color: #fff;
                margin: 5px;
                transition: all 0.3s ease;
            }

            .burger.active .line:nth-child(1) {
                transform: rotate(-45deg) translate(-5px, 6px);
            }

            .burger.active .line:nth-child(2) {
                opacity: 0;
            }

            .burger.active .line:nth-child(3) {
                transform: rotate(45deg) translate(-5px, -6px);
            }
        }
</style>
<body>
    <!-- Navbar -->
    <?php require 'nav.html'; ?>
    <div class="contact-form">
        <h1>Contact Us</h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Contact Us</h2>
                    <form action="#" method="post">
                        <input type="text" name="name" placeholder="Enter Your Name">

                        <input type="email" name="name" placeholder="Enter Your Email">
                        <input type="tel" name="name" placeholder="Enter Your Number">
                        <textarea name="message" placeholder="Your Message"></textarea>
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
<script>
    const burger = document.querySelector('.burger');
    const navLinks = document.querySelector('.nav-links');

    burger.addEventListener('click', () => {
        navLinks.classList.toggle('nav-active');
        burger.classList.toggle('active');
    });


</script>

</html>