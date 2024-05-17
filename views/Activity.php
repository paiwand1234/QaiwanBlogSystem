<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Contact Us</title>
    <!-- <link rel="stylesheet" href="../stylesheets/contact.css"> -->
</head>
<style>
    * {
           
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #90C5F9;
            padding: 15px 0;
           
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
        .card-container {
            position: relative;
            text-align: center;
            color: white;
            height: 100%;
        }
        .card-text {
            position: absolute;
            top: 80%;
            left: 20%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.8); /* Optional: to make the text more readable */
            padding: 10px;
            border-radius: 5px;
        }
       
        .card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .card img {
            flex-grow: 1;
            object-fit: cover;
            height: 300px;
        }
</style>
<body>
    <!-- Navbar -->
 
    <nav class="navbar ">
            <div class="container">
                <a href="#" class="logo">Your Logo</a>
                <ul class="nav-links">
                    <li><a href="Home.php">Home</a></li>
                    <li><a href="Activity.php">Activity</a></li>
                    <li><a href="Department.php">Department</a></li>
                    <li><a href="Project.php">Project</a></li>
                    <li><a href="Contactus.php">Contact Us</a></li>
                </ul>
                <form class="search-form">
                    <input type="text" placeholder="Search...">
                    <button type="submit">Search</button>
                </form>
                <div class="burger">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </div>
        </nav>
   
   
    <div class="container m-5">
        <div class="row">
            <div class="col-12 rounded ">
               <h1>Club's Activity </h1>
            </div>
        </div>
    </div>
    <hr class="mx-5">

    <div class="container  my-4">
        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <div class="card  shadow-lg border-0">
                    <div class="card-container ">
                        <img src="../assets/image/spart-club.jpg" class="img-fluid rounded" alt="">
                        <!-- <div class="card-text">Text Overlay 1</div> -->
                        <a class="btn btn-dark col-12 rounded" href="sport-club.html" role="button">View</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-lg border-0">
                    <div class="card-container ">
                        <img src="../assets/image/art club.jpg" class="img-fluid rounded" alt="">
                        <!-- <div class="card-text">Text Overlay 2</div> -->
                        <a class="btn btn-dark col-12 rounded" href="sport-club.html" role="button">View</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card  shadow-lg border-0">
                    <div class="card-container">
                        <img src="../assets/image/images.jpeg" class="img-fluid rounded" alt="">
                        <!-- <div class="card-text">Text Overlay 3</div> -->
                        <a class="btn btn-dark col-12 rounded" href="sport-club.html" role="button">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container  my-4">
        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <div class="card  shadow-lg border-0">
                    <div class="card-container ">
                        <img src="../assets/image/spart-club.jpg" class="img-fluid rounded" alt="">
                        <!-- <div class="card-text">Text Overlay 1</div> -->
                        <a class="btn btn-dark col-12 rounded" href="sport-club.html" role="button">View</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-lg border-0">
                    <div class="card-container ">
                        <img src="../assets/image/art club.jpg" class="img-fluid rounded" alt="">
                        <!-- <div class="card-text">Text Overlay 2</div> -->
                        <a class="btn btn-dark col-12 rounded" href="sport-club.html" role="button">View</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card  shadow-lg border-0">
                    <div class="card-container">
                        <img src="../assets/image/images.jpeg" class="img-fluid rounded" alt="">
                        <!-- <div class="card-text">Text Overlay 3</div> -->
                        <a class="btn btn-dark col-12 rounded" href="sport-club.html" role="button">View</a>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    
      
 
   
    
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script>
    const burger = document.querySelector('.burger');
    const navLinks = document.querySelector('.nav-links');

    burger.addEventListener('click', () => {
        navLinks.classList.toggle('nav-active');
        burger.classList.toggle('active');
    });


</script>

</html>