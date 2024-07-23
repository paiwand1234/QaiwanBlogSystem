<!DOCTYPE html>
<html lang="en">
    

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../../controllers/database.php";
include "../../models/users.php";
include "../../models/projects.php";
include "../../models/project_contents.php";

session_start();

$user_id = null;
// CHECK IF THE USER IS LOGGED IN
if (!isset($_SESSION['user_id']) or $_SESSION['role'] !== 'head') {
    // USER IS NOT LOGGED IN, REDIRECT TO LOGIN PAGE
    header("Location: ./register.php");
    exit();
}else{
    
    $user_id = $_SESSION['user_id'];

}


   // THIS PART IS FOR ADDING THE FILES IN THE LIST
   $file_array = array('application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
   $image_array = array('image/jpg', 'image/jpeg', 'image/png');
    // CREATING THE PROJECTS ARRAY
    $projects_array = array();
   $db = new Database();
   $projects = new Projects($db);
   $project_contents = new ProjectContent($db);
   $projects = $projects->readAll();

   if (count($projects) != 0) {


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
    //    print_r($projects_array);
   }

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Project Cards</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-width: 1200px;
            margin: 20px auto;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 22%;
            min-width: 200px;
            text-align: center;
            overflow: hidden;
        }

        .project-image {
            width: 100%;
            height: auto;
        }

        .project-name {
            font-size: 1.5em;
            margin: 15px 0 10px 0;
        }

        .project-description {
            font-size: 1em;
            color: #666;
            padding: 0 15px;
            margin-bottom: 15px;
        }

        .download-btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 15px 0;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .download-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include "nav.html" ?>
    <div class="container">
    <?php if ($projects_array){ ?>
        <?php foreach( $projects_array as $index => $project) {?>
            <div class="card">
                <img src="<?php echo $project[2]['file_dir'].$project[2]['file_name'] ?>" alt="Project Image 1" class="project-image">
                <h2 class="project-name"><?php echo $project[0]['name'] ?></h2>
                <p class="project-description">
                    <?php echo $project[0]['description'] ?>
                <a href="<?php echo $project[1]['file_dir'].$project[1]['file_name'] ?>" class="download-btn col-6 mx-auto"  download="<?php echo "project-".$project[0]['id']; ?>" >Download</a>
            </div>
        <?php }?>
        <?php }?>

    </div>
</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</html>
