<?php
include "../database.php";
include "../tables/users.php";

$username_or_email = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

if(!$username_or_email){
    return "Please don't leave the Username or Email field empty!";
}

$db = new Database();

try {
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Determine if the input is an email address or a username
    if (filter_var($username_or_email, FILTER_VALIDATE_EMAIL)) {
        // Handle the input as an email address
        echo "The input is a valid email: $usernameOrEmail";
        
        // Fetch user from database
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $db->pdo->prepare($sql);
        $stmt->execute([$username_or_email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

    } else {

        echo "The input is a valid username: $usernameOrEmail";
        
        // Fetch user from database
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $db->pdo->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

    }

    // Verify password
    if ($user && password_verify($password, $user['password'])) {
        // Password is correct
        header("Location: ../../views/head/home.php?$queryString");
        // Redirect or perform other actions
    } else {
        // Password is incorrect or user not found
        header("Location: ../../views/head/login.php?login=0");
    }
} catch (PDOException $e) {
    // Handle database errors
    echo "Error: " . $e->getMessage();
}
