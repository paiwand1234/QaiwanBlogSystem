<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include "../../../models/users.php";
include "../../../models/projects.php"; // Assuming you have this file
include "../../../models/project_contents.php"; // Assuming you have this file
include "../../database.php"; // Assuming you have this file
include "../../utils/utils.php";

session_start();

$image_dir = "../../uploads/projects/images/";
$file_dir = "../../uploads/projects/files/";



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {

    $user_id = $_SESSION['user_id'];
    $project_name = filter_input(INPUT_POST, 'project_id', FILTER_SANITIZE_SPECIAL_CHARS);


} else {
    $error = "Error: Invalid request method or user not authenticated.";
    header("Location: ../../../views/head/project.php?error=".$error);
    
}
