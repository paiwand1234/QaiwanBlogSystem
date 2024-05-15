<?php

include "../database.php";
include "../tables/student_ids.php";
include "../tables/users.php";


$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
$student_id = filter_input(INPUT_POST, "student_id", FILTER_SANITIZE_STRING);

$db = new Database();

try {
    $db->$pdo->beginTransaction();

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $user = new Users($db);
    $studentIds = new StudentIds($db);
    
    $read = $studentIds->readOneRow("student_id", $student_id);

    print_r($read);

    // $user->create();

    $db->$pdo->commit();

    header('Location: ../../views/head/register.php');

} catch (PDOException $e) {
 // Step 5: Rollback the transaction if any operation fails
    $db->$pdo->rollBack();
    echo "Transaction failed: " . $e->getMessage();
}



