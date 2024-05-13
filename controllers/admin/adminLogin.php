<?php
include "./database.php";
include "./tables/users.php";

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$db = new Database();

try {
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Fetch user from database
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $db->pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify password
    if ($user && password_verify($password, $user['password'])) {
        // Password is correct
        header("Location: ../views/Home.php?$queryString");
        // Redirect or perform other actions
    } else {
        // Password is incorrect or user not found
        header("Location: ../views/admin/AdminLogin.php?login=0");
    }
} catch (PDOException $e) {
    // Handle database errors
    echo "Error: " . $e->getMessage();
}
