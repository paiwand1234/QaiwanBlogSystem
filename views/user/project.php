<!DOCTYPE html>
<html lang="en">

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include "../../models/projects.php";
include "../../models/project_contents.php";
include "../../controllers/database.php";

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Project Management</title>
</head>
<style>

        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #90C5F9;
            padding: 15px 0;
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
<nav class="navbar">
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
    </header>

    <div class="container">
        <div class="row  mt-5">
            <div class="col-5 mx-auto my-auto">
            <h1>Add Project </h1>
            <form action="../../controllers/users/project/add_projects.php" method="POST" enctype="multipart/form-data">
                 <div class="mb-3">
                   <label for="Name-Project" class="form-label">Project Name</label>
                   <input type="text" class="form-control" id="Name-Project" aria-describedby="emailHelp" name="project_name">
                 </div>
                 <div class="mb-3">
                   <label for="Description" class="form-label">Description</label>
                   <input type="text" class="form-control" id="Description" name="description">
                 </div>
                 <div class="mb-3">
                     <label for="formFile" class="form-label">Project Image</label>
                    <input class="form-control" type="file" id="project" name="image">
                </div>
                 <div class="mb-3">
                     <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" id="formFile" name="file">
                </div>
                
                 <button type="submit" class="btn btn-primary col-12 mt-3">Submit</button>
            </form>
            </div>
            <div class="col-5 mx-auto">
                <img src="../assets/svg/Work time-amico.svg" alt="">
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
        <h1>Show Project</h1>
            <?php 
            // THIS PART IS FOR ADDING THE FILES IN THE LIST
            $file_array = array('application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            $image_array = array('image/jpg', 'image/jpeg', 'image/png');

            $db = new Database();
            $project = new Projects($db);
            $project_contents = new ProjectContent($db);
            $projects = $project->readOneColumn("user_id", $user_id);

            if (count($projects) != 0) {
                // CREATING THE PROJECTS ARRAY
                $projects_array = array();

                foreach ($projects as $index_0 => $project) {
                    // INITIALIZE PROJECT ARRAY
                    $projects_array[$index_0] = array();
                    
                    // FIRST ONE IS FOR ADDING THE PROJECT TO THE ARRAY
                    $projects_array[$index_0][0] = $project;
                    $contents_result = $project_contents->readOneColumn('project_id', $project['id']);

                    foreach ($contents_result as $index_1 => $content) {
                        if (in_array($content["file_type"], $file_array)) {
                            // ADDING THE FILE TO THE ARRAY IF IT EXISTS
                            $projects_array[$index_0][1] = $content;
                        } else if (in_array($content["file_type"], $image_array)) {
                            // ADDING THE IMAGE TO THE ARRAY IF IT EXISTS
                            $projects_array[$index_0][2] = $content;
                        }
                    }
                }

                // DEBUG: PRINT THE PROJECTS ARRAY
                // print_r($projects_array);
            }
            ?>
            <!-- <div class=""><?php  print_r($projects_array); ?></div> -->
            
            <?php 
            if(isset($projects_array)){
            foreach ($projects_array as $index_0 => $project){ ?>
            <div class="col-3">
                <div class="card my-5" style="width: 18rem;">
                    <img src="<?php echo $project[2]['file_dir'].$project[2]['file_name']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $project[0]['name']; ?></h5>
                        <p class="card-text"><?php echo $project[0]['description']; ?></p>
                        <div class="col d-flex justify-content-around">
                            <form action="delete_project.php" method="POST" class="delete-form">
                                <input class="d-none" type="hidden" name="project_id" value="<?php echo $project[0]['id']; ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="<?php echo $project[1]['file_dir'].$project[1]['file_name']; ?>" class="btn btn-primary" download="<?php echo "project".$project[0]['id']; ?>">Download</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php }} ?>


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