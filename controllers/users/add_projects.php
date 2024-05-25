<?php

include "../tables/users.php";
include "../tables/projects.php"; // Assuming you have this file
include "../tables/project_content.php"; // Assuming you have this file
include "../database.php"; // Assuming you have this file

session_start();

$image_dir = "../../uploads/projects/images/";
$file_dir = "../../uploads/projects/files/";
$allowed_image = ['jpg', 'jpeg', 'png']; // Allowed image types
$allowed_file = ['pdf', 'docx', 'doc']; // Allowed file types
$max_file_size = 8 * 1024 * 1024; // 8MB
$max_image_size = 50 * 1024 * 1024; // 50MB
$image_uploaded = false;
$file_uploaded = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    try {
        if (isset($_FILES['file']) && isset($_FILES['image']) && $_FILES['file']['error'] == 0 && $_FILES['image']['error'] == 0) {
            $image_name = $_FILES['image']['name'];
            $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
            $image_size = $_FILES['image']['size'];
            $image_type = $_FILES['image']['type'];

            $file_name = $_FILES['file']['name'];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];

            // Verify file extensions
            if (!in_array($file_ext, $allowed_file)) {
                die("Error: Please select a valid file format.");
            }
            if (!in_array($image_ext, $allowed_image)) {
                die("Error: Please select a valid image format.");
            }

            // Verify file sizes
            if ($file_size > $max_file_size) {
                die("Error: File size is larger than the allowed limit.");
            }
            if ($image_size > $max_image_size) {
                die("Error: Image size is larger than the allowed limit.");
            }

            // Verify MIME types
            $allowed_file_mimes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
            $allowed_image_mimes = ['image/jpg', 'image/jpeg', 'image/png'];
            if (!in_array($file_type, $allowed_file_mimes)) {
                die("Error: Invalid file type.");
            }
            if (!in_array($image_type, $allowed_image_mimes)) {
                die("Error: Invalid image type.");
            }

            // Function to handle file uploads
            function handle_file_upload($file, $dir) {
                if (file_exists($dir . $file['name'])) {
                    echo $file['name'] . " already exists.<br>";
                    return false;
                }
                if (move_uploaded_file($file['tmp_name'], $dir . $file['name'])) {
                    echo "Your " . $file['name'] . " was uploaded successfully.<br>";
                    return true;
                } else {
                    echo "Error uploading " . $file['name'] . ".<br>";
                    return false;
                }
            }

            // Handle file and image uploads
            $file_uploaded = handle_file_upload($_FILES['file'], $file_dir);
            $image_uploaded = handle_file_upload($_FILES['image'], $image_dir);
            echo $file_uploaded . "<br>" . $image_uploaded;

            if ($image_uploaded && $file_uploaded) {
                echo "reached here after the file uploading was right \n";
                try {
                    echo "reached here in try catch";
                    $user_id = $_SESSION['user_id'];
                    $project_name = filter_input(INPUT_POST, 'project_name', FILTER_SANITIZE_SPECIAL_CHARS);
                    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

                    $db = new Database();             
                    $pdo = $db->pdo;    
                    $project = new Projects($db);
                    $project_contents = new ProjectContent($db);
       
                
                    $pdo->beginTransaction();
                    echo "reached here for transaction beginning \n";
                    
                    $result = $project->create($user_id, $project_name, $description);

                    $project_contents->create($result, $file_name, $file_dir, $file_type, $file_size);
                    $project_contents->create($result, $image_name, $image_dir, $image_type, $image_size);
                    
                    echo "reached here for committing \n";
                    $pdo->commit();

                } catch (PDOException $e) {
                    $pdo->rollBack();
                    die("Transaction failed: " . $e->getMessage());
                } catch (Exception $e) {
                    $pdo->rollBack();
                    die("Transaction failed: " . $e->getMessage());
                }
            } else {
                die("Error: Sorry, there was an error while uploading the files.");
            }
        } else {
            die("Error Uploading file: " . $_FILES['file']['error']);
        }
    } catch (Exception $e) {
        die("Error reading project content: " . $e->getMessage());
    }
} else {
    die("Error: Invalid request method or user not authenticated.");
}
