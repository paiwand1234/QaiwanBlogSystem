<?php

include "../database.php";
include "../../models/student_ids.php";
include "../../models/users.php";
session_start();
// Sanitize and validate inputs
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
$student_id = filter_input(INPUT_POST, "student_id", FILTER_SANITIZE_SPECIAL_CHARS);

if (empty($username) || empty($email) || empty($password) || empty($student_id)) {
    die("Please fill in all fields.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}


$db = new Database();
$pdo = $db->pdo; // Access the PDO instance directly from the Database class

try {
    $pdo->beginTransaction();

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $studentIds = new StudentIds($db); // Assuming StudentIds and Users classes use the Database instance
    $users = new Users($db);

    // Check if the student ID exists
    $result = $db->readOneColumn("student_ids", "student_id", $student_id);

    echo "Result: " . print_r($result, true). "\n";

    if ($result && $result['head_is_active'] != 1) {
        echo "reached here\n";
        // Student ID exists, proceed to create user
        $result[0]['head_is_active'] = 1;
        $studentIds->update($result[0]['id'], $result[0]);
        echo "reached here after the student id update\n";
        $user_id = $users->create(
            $username,        
            $hashed_password,
            $email,
            UserRole::HEAD,
            $result[0]['id']
        );

        $pdo->commit(); // Commit before redirecting
        $_SESSION['user_id'] = $user_id;
        $_SESSION['role'] = UserRole::HEAD;
        
        header('Location: ../../views/head/home.php');
        // exit();
    } else {
        $pdo->rollBack(); // Rollback before redirecting
        header('Location: ../../views/head/register.php');
        // exit();
    }

} catch (PDOException $e) {
    $pdo->rollBack();
    echo "Transaction failed: " . $e->getMessage();
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Transaction failed: " . $e->getMessage();
}
