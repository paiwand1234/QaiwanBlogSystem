<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../../../models/users.php";
include "../../../models/club_activity.php";
include "../../../models/club_user_registeration.php";
include "../../../models/club_activity_registeration.php";
include "../../database.php";

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
$activities = new ClubActivities($db);
$activity_registeration = new ClubActivityRegisteration($db);
$pdo = $db->pdo;

try {

    echo "Reached here in try-catch block\n";

    $user_id = $_SESSION['user_id'];
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

    $pdo->beginTransaction();
    $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);


    $data = array(
        "status" => Status::ACCEPTED  
    );
    
    $activity = $activity_registeration->read($id);

    $activity_registeration->update($id, $data);
    
    $activities->create($activity['club_id'], $activity['title'], $activity['description'], $activity['image_dir']);
    
    echo "\nActivity image created\n";
    $success = "Activity created";
    header("Location: ../../../views/admin/activity_control.php?club_id=".$club_id."&success=" . urlencode($success));

    $pdo->commit();
} catch (PDOException $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    $error = "Transaction rolled back due to PDOException: " . $e->getMessage();
    header("Location: ../../../views/admin/activity_control.php?club_id=".$club_id."&error=" . urlencode($error));
} catch (Exception $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    $error = "Transaction failed: " . $e->getMessage();
    header("Location: ../../../views/admin/activity_control.php?club_id=".$club_id."&error=" . urlencode($error));
} finally {
    $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
}






