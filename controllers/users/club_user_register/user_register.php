<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../../../models/users.php";
include "../../../models/club_activity.php";
include "../../../models/club_user_registration.php";
include "../../database.php";
include "../../utils/utils.php";

session_start();

$image_dir = "../../uploads/club_activity/";
$allowed_image = ['jpg', 'jpeg', 'png'];
$max_image_size = 8 * 1024 * 1024; // 8MB

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['user_id'])) {
    $error = "Error: Invalid request method or user not authenticated.";
    header("Location: ../../../views/user/.php?error=" . urlencode($error));
    exit();
}

$db = new Database();
$activities = new ClubActivities($db);
$club_user_registration = new ClubUserRegistration($db);
$pdo = $db->pdo;

try {

    echo "Reached here in try-catch block\n";

    $user_id =  filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_SPECIAL_CHARS);
    $club_id = filter_input(INPUT_POST, 'club_id', FILTER_SANITIZE_SPECIAL_CHARS);
    $user_name =  filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $department_name = filter_input(INPUT_POST, 'department_name', FILTER_SANITIZE_SPECIAL_CHARS);
    

    $pdo->beginTransaction();
    $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    
    $club_user_registration->create($user_id, $club_id, $user_name, $department_name, Status::PENDING);
    echo "\nCreated the registration\n";
    $success = "Regristration created";
    
    $pdo->commit();
    
    header("Location: ../../../views/user/clubs.php?club_id=".$club_id."&success=" . urlencode($success));

   
} catch (PDOException $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    $error = "Transaction rolled back due to PDOException: " . $e->getMessage();
    header("Location: ../../../views/user/clubs.php?club_id=".$club_id."&error=" . urlencode($error));
} catch (Exception $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    $error = "Transaction failed: " . $e->getMessage();
    header("Location: ../../../views/user/clubs.php?club_id=".$club_id."&error=" . urlencode($error));
} finally {
    $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
}
