<!DOCTYPE html>
<html lang="en">

<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include "../../models/projects.php";
include "../../models/project_contents.php";
include "../../controllers/database.php";

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Project Management</title>
</head>

<body>
<?php require 'nav.html'; ?>

    <div class="container">
        <div class="row  mt-5">
            <div class="col-5 mx-auto my-auto">
            <h1>Add Project </h1>
            <form action="../../controllers/users/project/add_project.php" method="POST" enctype="multipart/form-data">
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
                <img style="width: 800px;" src="../../assets/image/DALL·E 2024-06-12 00.12.52 - A simple, flat illustration of a diverse group of college students working together on a project. They are sitting around a table, which shows various.webp" alt="">
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
            $club = new Projects($db);
            $project_contents = new ProjectContent($db);
            $projects = $club->readOneColumn("user_id", $user_id);

            if (count($projects) != 0) {
                // CREATING THE PROJECTS ARRAY
                $projects_array = array();

                foreach ($projects as $index_0 => $club) {
                    // INITIALIZE PROJECT ARRAY
                    $projects_array[$index_0] = array();
                    
                    // FIRST ONE IS FOR ADDING THE PROJECT TO THE ARRAY
                    $projects_array[$index_0][0] = $club;
                    $contents_result = $project_contents->readOneColumn('project_id', $club['id']);

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
            foreach ($projects_array as $index_0 => $club){ ?>
            <div class="col-3">
                <div class="card my-5" style="width: 18rem;">
                    <img src="<?php echo $club[2]['file_dir'].$club[2]['file_name']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $club[0]['name']; ?></h5>
                        <p class="card-text"><?php echo $club[0]['description']; ?></p>
                        <div class="col d-flex justify-content-around">
                        <form action="../../controllers/users/project/delete_project.php" method="POST" class="delete-form">
                                <input type="hidden" name="project_id" value="<?php echo $club[0]['id']; ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="<?php echo $club[1]['file_dir'].$club[1]['file_name']; ?>" class="btn btn-primary" download="<?php echo "project".$club[0]['id']; ?>">Download</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php }} ?>


        </div>
    </div>
 
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>