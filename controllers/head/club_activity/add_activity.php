<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../../../models/users.php";
include "../../../models/club_activity.php";
include "../../database.php";
include "../../utils/utils.php";

session_start();

$image_dir = "../../uploads/club_activity/";
$allowed_image = ['jpg', 'jpeg', 'png'];
$max_image_size = 8 * 1024 * 1024; // 8MB

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['user_id'])) {
    $error = "Error: Invalid request method or user not authenticated.";
    header("Location: ../../../views/head/club_activities.php?error=" . urlencode($error));
    exit();
}

$db = new Database();
$club_activities = new ClubActivities($db);
$pdo = $db->pdo;

try {
    echo "Reached here in try-catch block\n";

    $user_id = $_SESSION['user_id'];
    $club_id = filter_input(INPUT_POST, 'club_id', FILTER_SANITIZE_SPECIAL_CHARS);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

    $pdo->beginTransaction();
    $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image_name = $_FILES['image']['name'];
        $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
        $image_size = $_FILES['image']['size'];
        $image_type = $_FILES['image']['type'];

        if (!in_array($image_ext, $allowed_image)) {
            throw new Exception("Please select a valid image format.");
        }
        if ($image_size > $max_image_size) {
            throw new Exception("Image size is larger than the allowed limit.");
        }
        $allowed_image_mimes = ['image/jpg', 'image/jpeg', 'image/png'];
        if (!in_array($image_type, $allowed_image_mimes)) {
            throw new Exception("Invalid image type.");
        }

        $image_uploaded = handle_file_upload($_FILES['image'], "../" . $image_dir);
        if (!$image_uploaded) {
            throw new Exception("Failed to upload image.");
        }

        $club_activities->create($club_id, $name, $description, $image_dir . $image_name);
        echo "\nActivity image created\n";
        $success = "Activity created";
        header("Location: ../../../views/head/club_activities.php?club_id=".$club_id."&success=" . urlencode($success));
    } else {
        throw new Exception("Sorry, there was an error while reading the image.");
    }

    $pdo->commit();
} catch (PDOException $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    $error = "Transaction rolled back due to PDOException: " . $e->getMessage();
    header("Location: ../../../views/head/club_activities.php?club_id=".$club_id."&error=" . urlencode($error));
} catch (Exception $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    $error = "Transaction failed: " . $e->getMessage();
    header("Location: ../../../views/head/club_activities.php?club_id=".$club_id."&error=" . urlencode($error));
} finally {
    $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
}
