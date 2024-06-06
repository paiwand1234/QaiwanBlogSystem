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

            // Handle file and image uploads
            $file_uploaded = handle_file_upload($_FILES['file'], "../".$file_dir);
            $image_uploaded = handle_file_upload($_FILES['image'], "../".$image_dir);
            echo $file_uploaded . "<br>" . $image_uploaded;

            if ($image_uploaded && $file_uploaded) {
                echo "Reached here after the file uploading was successful\n";
                try {
                    echo "Reached here in try-catch block\n";

                    $user_id = $_SESSION['user_id'];
                    $project_name = filter_input(INPUT_POST, 'project_name', FILTER_SANITIZE_SPECIAL_CHARS);
                    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
            
                    echo "User ID: $user_id, Project Name: $project_name, Description: $description\n";
            
                    $db = new Database();
                    $pdo = $db->pdo;

                    if ($pdo) {
                        echo "Database connection successful\n";
                    } else {
                        die("Database connection failed\n");
                    }

                    // Check if the PDO supports transactions
                    if ($pdo->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql') {
                        echo "PDO driver is MySQL and supports transactions\n";
                    } else {
                        echo "PDO driver does not support transactions\n";
                    }

                    $project = new Projects($db);
                    $project_contents = new ProjectContent($db);
            
                    echo "Initialized database and project instances\n";

                    // Ensure autocommit is off
                    $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
                    echo "Autocommit disabled\n";
            
                    $pdo->beginTransaction();
                    echo "\nTransaction started\n";
            
                    // Creating project and retrieving the ID
                    $result = $project->create($user_id, $project_name, $description);
                    echo "\nProject created with ID: $result\n";
            
                    // Creating project contents
                    try {
                        $project_contents->create($result, $file_name, $file_dir, $file_type, $file_size);
                        echo "\nProject file content created\n";

                        $project_contents->create($result, $image_name, $image_dir, $image_type, $image_size);
                        echo "\nProject image content created\n";
                    } catch (Exception $e) {
                        echo "Error in project contents creation: " . $e->getMessage() . "\n";
                        throw $e;
                    }
            
                    $pdo->commit();
                    echo "\nTransaction committed successfully\n";
                    $success = "Transaction rolled back due to PDOException". $e->getMessage();
                    header("Location: ../../../views/user/project.php?success=".$success);

                } catch (PDOException $e) {
                    if ($pdo->inTransaction()) {
                        $pdo->rollBack();
                        $error = "Transaction rolled back due to PDOException". $e->getMessage();
                        header("Location: ../../../views/user/project.php?error=".$error);
                    }
                    die("Transaction failed: " . $e->getMessage());
                } catch (Exception $e) {
                    if ($pdo->inTransaction()) {
                        $pdo->rollBack();
                        echo "Transaction rolled back due to Exception\n";
                    }
                    $error = "Transaction failed: " . $e->getMessage();
                    header("Location: ../../../views/user/project.php?error=".$error);
                } finally {
                    // Ensure autocommit is back to normal
                    $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
                    echo "Autocommit re-enabled\n";
                    header("Location: ../../../views/user/project.php?");
                }
            } else {
                $error = "Error: Sorry, there was an error while uploading the files.";
                header("Location: ../../../views/user/project.php?error=".$error);
            }
        } else {
            $error = "Error Uploading file: " . $_FILES['file']['error'];
            header("Location: ../../../views/user/project.php?error=".$error);
        }
    } catch (Exception $e) {
        $error = "Error reading project content: " . $e->getMessage();
        header("Location: ../../../views/user/project.php?error=".$error);
    }
} else {
    $error = "Error: Invalid request method or user not authenticated.";
    header("Location: ../../../views/user/project.php?error=".$error);
}
