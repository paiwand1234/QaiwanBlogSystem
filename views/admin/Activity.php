<!DOCTYPE html>
<html lang="en">

<?php 


// START THE SESSION
session_start();

$user_id = null;

// CHECK IF THE USER IS LOGGED IN
if (!isset($_SESSION['user_id'])) {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <div class="container my-4">
        <div class="row w-100">
            <div class="col-4 mb-4 ">
                <div class="card shadow-lg border-0">
                    <div class="card-container ">
                        <img src="../../assets/image/art club.jpg" class="img-fluid rounded" alt="">
                        <a class="btn btn-dark col-5 rounded my-2" href="sport-club.php" role="button">View</a>
                        <a class="btn btn-danger col-5 rounded" href="sport-club.php" role="button">Delete</a>
                    </div>
                </div>
            </div>
            <!-- <div class="col-4 mb-4 border border-danger">
                <div class="card  shadow-lg border-0">
                    <div class="card-container ">
                        <img src="../../assets/image/art club.jpg" class="img-fluid rounded" alt="">
                        <a class="btn btn-dark col-5 rounded my-2" href="sport-club.php" role="button">View</a>
                        <a class="btn btn-danger col-5 rounded" href="sport-club.php" role="button">Delete</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

   
    <div class="text-end m-3 position-fixed " style="bottom: 0px; right: 0px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <img src="../../assets/svg/plus-solid (1).svg" style="padding: 5px;" width="60px" height="60px" class="bg-dark rounded-circle " alt="">
    </div>

      
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" action="../../controllers/admin/clubs/add_club.php" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Adding Clubs</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Club Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="name" required>
          </div>
          <label for="inputGroupFile02" class="col-form-label">Club Image:</label>
          <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile02" name="image" required>
        </div>

          <div class="mb-3">
            <label for="message-text" class="col-form-label">Club Description:</label>
            <textarea class="form-control" id="message-text" name="description" required></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
    
    
</body>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    const burger = document.querySelector('.burger');
    const navLinks = document.querySelector('.nav-links');

    burger.addEventListener('click', () => {
        navLinks.classList.toggle('nav-active');
        burger.classList.toggle('active');
    });


</script>

</html>