<?php
include "../database.php";
include "../../models/users.php";
session_start();
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

$db = new Database();

try {
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Fetch user from database
    $sql = "SELECT * FROM users WHERE username = ? AND role = ?";
    $stmt = $db->pdo->prepare($sql);
    $stmt->execute([$username, "admin"]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify password
    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        
        // Password is correct
        header("Location: ../../views/admin/home.php?");
        // Redirect or perform other actions
    } else {
        // Password is incorrect or user not found
        header("Location: ../../views/admin/login.php?login=0");
    }
} catch (PDOException $e) {
    // Handle database errors
    echo "Error: " . $e->getMessage();
}
