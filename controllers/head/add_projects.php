<?php

include "../tables/users.php";
include "../tables/projects.php"; // Assuming you have this file
include "../tables/project_content.php"; // Assuming you have this file
include "../database.php"; // Assuming you have this file

session_start();

$image_dir = "uploads/projects/images/";
$file_dir = "uploads/projects/files/";
$allowed_image = array('jpg', 'jpeg', 'png'); // Allowed file types
$allowed_file = array('pdf', 'docx', 'doc'); // Allowed file types
$image_uploaded = false;
$file_uploaded = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {

    // Check if a file was uploaded without errors
    try {
        if (isset($_FILES['file']) && isset($_FILES['image']) && $_FILES['file']['error'] == 0 && $_FILES['image']['error'] == 0) {

            $image_name = $_FILES['image']['name'];
            $image_type = $_FILES['image']['type'];
            $image_size = $_FILES['image']['size'];

            $file_name = $_FILES['file']['name'];
            $file_type = $_FILES['file']['type'];
            $file_size = $_FILES['file']['size'];

            // Verify the file extension
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            if (!in_array($file_ext, $allowed_file)) {
                die("Error: Please select a valid file format.");
            }

            // Verify the image extension
            $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
            if (!in_array($image_ext, $allowed_image)) {
                die("Error: Please select a valid image format.");
            }

            // Verify the file size - 8MB maximum
            $max_file_size = 8 * 1024 * 1024;
            if ($file_size > $max_file_size) {
                die("Error: File size is larger than the allowed limit.");
            }

            // Verify the image size - 50MB maximum
            $max_image_size = 50 * 1024 * 1024;
            if ($image_size > $max_image_size) {
                die("Error: Image size is larger than the allowed limit.");
            }

            // Verify MIME type for file
            if (in_array($file_type, array('application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'))) {
                // Check whether file exists before uploading it
                if (file_exists($file_dir . $file_name)) {
                    echo $file_name . " already exists.";
                } else {
                    move_uploaded_file($_FILES['file']['tmp_name'], $file_dir . $file_name);
                    echo "Your file was uploaded successfully.";
                }
                $file_uploaded = true;
            } else {
                die("Error: There was a problem uploading your file. Please try again.");
            }

            // Verify MIME type for image
            if (in_array($image_type, array('image/jpg', 'image/jpeg', 'image/png'))) {
                // Check whether image exists before uploading it
                if (file_exists($image_dir . $image_name)) {
                    echo $image_name . " already exists.";
                } else {
                    move_uploaded_file($_FILES['image']['tmp_name'], $image_dir . $image_name);
                    echo "Your image was uploaded successfully.";
                }
                $image_uploaded = true;
            } else {
                die("Error: There was a problem uploading your image. Please try again.");
            }

            if ($image_uploaded && $file_uploaded) {
                try {
                    $user_id = $_SESSION['user_id'];

                    $project_name = filter_input(INPUT_POST, 'project_name', FILTER_SANITIZE_SPECIAL_CHARS);
                    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

                    // Initializing the Database instance
                    $db = new Database();
                    $pdo = $db->pdo;
                    $pdo->beginTransaction();

                    // Initializing the database table instances
                    $project = new Projects($db);
                    $project_contents = new ProjectContent($db);

                    // Creating project and retrieving the ID
                    $result = $project->create($user_id, $project_name, $description);

                    // Creating project contents
                    $project_contents->create($result, $file_name, $file_dir, $file_type, $file_size);
                    $project_contents->create($result, $image_name, $image_dir, $image_type, $image_size);

                    // Committing the database transactions
                    $pdo->commit(); // Commit before redirecting

                } catch (PDOException $e) {
                    $pdo->rollBack();
                    echo "Transaction failed: " . $e->getMessage();
                } catch (Exception $e) {
                    $pdo->rollBack();
                    echo "Transaction failed: " . $e->getMessage();
                }
            } else {
                die("Error: Sorry, there was an error while uploading the files.");
            }
        } else {
            die("Error: " . $_FILES['file']['error']);
        }
    } catch (Exception $e) {
        throw new Exception("Error reading project content: " . $e->getMessage());
    }
}
