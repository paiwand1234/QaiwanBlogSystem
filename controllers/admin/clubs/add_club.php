<?php

include "../../database.php"; // Assuming you have this file
include "../../utils/utils.php";
include "../../../models/clubs.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$user_id = $_SESSION['user_id'];
$project_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

$image_dir = "../../../uploads/clubs/";
$allowed_image_ext = ['jpg', 'jpeg', 'png']; // Allowed image extensions
$allowed_image_mimes = ['image/jpeg', 'image/png', 'image/jpg']; // Allowed MIME types
$max_file_size = 8 * 1024 * 1024; // 8MB

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    try {
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image_name = $_FILES['image']['name'];
            $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
            $image_size = $_FILES['image']['size'];
            $image_type = $_FILES['image']['type'];

            if (!in_array($image_ext, $allowed_image_ext)) {
                $error = "Error: Please select a valid image format.";
                echo "Error: Please select a valid image format.";
                // header("Location: ../../../views/admin/activity.php?error=" . urlencode($error));
                // exit();
            }

            if ($image_size > $max_file_size) {
                $error = "Error: Image size is larger than the allowed limit.";
                echo "Error: Image size is larger than the allowed limit.";
                // header("Location: ../../../views/admin/activity.php?error=" . urlencode($error));
                // exit();
            }

            if (!in_array($image_type, $allowed_image_mimes)) {
                $error = "Error: Invalid image type.";
                echo "Error: Invalid image type.";
                // header("Location: ../../../views/admin/activity.php?error=" . urlencode($error));
                // exit();
            }

            $image_uploaded = handle_file_upload($_FILES['image'], $image_dir);
            $db = new Database();
            $pdo = $db->pdo;
            if ($image_uploaded) {
                try {

                    $club = new Clubs($db);

                    // Ensure autocommit is off
                    $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);

                    $pdo->beginTransaction();

                    // Creating project and retrieving the ID
                    $result = $club->create($project_name, $description, $image_dir . $image_name);
                    echo "\nProject created with ID: $result\n";

                    $pdo->commit();
                    echo "\nTransaction committed successfully\n";
                    $success = "Transaction was successful";
                    header("Location: ../../../views/admin/activity.php?success=" . urlencode($success));
                } catch (PDOException $e) {
                    if ($pdo->inTransaction()) {
                        $pdo->rollBack();
                        $error = "Transaction rolled back due to PDOException: " . $e->getMessage();
                        echo "Transaction rolled back due to PDOException: " . $e->getMessage();
                        header("Location: ../../../views/admin/activity.php?error=" . urlencode($error));
                    }
                    die("Transaction failed: " . $e->getMessage());
                } catch (Exception $e) {
                    if ($pdo->inTransaction()) {
                        $pdo->rollBack();
                        echo "Transaction rolled back due to Exception\n";
                    }
                    $error = "Transaction failed: " . $e->getMessage();
                    echo "Transaction failed: " . $e->getMessage();
                    header("Location: ../../../views/admin/activity.php?error=" . urlencode($error));
                } finally {
                    // Ensure autocommit is back to normal
                    $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
                    echo "Autocommit re-enabled\n";
                }
            } else {
                $error = "Error: Sorry, there was an error while uploading the file.";
                echo "Error: Sorry, there was an error while uploading the file.";
                header("Location: ../../../views/admin/activity.php?error=" . urlencode($error));
            }
        } else {
            $error = "Error Uploading file: " . $_FILES['image']['error'];
            echo "Error Uploading file: " . $_FILES['image']['error'];
            header("Location: ../../../views/admin/activity.php?error=" . urlencode($error));
        }
    } catch (Exception $e) {
        $error = "Error reading project content: " . $e->getMessage();
        echo "Error reading project content: " . $e->getMessage();
        header("Location: ../../../views/admin/activity.php?error=" . urlencode($error));
    }
}
