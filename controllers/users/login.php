<?php
include "../database.php";
include "../tables/users.php";

$username_or_email = filter_input(INPUT_POST, 'username_email', FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, 'password_signin', FILTER_SANITIZE_SPECIAL_CHARS);

if (!$username_or_email || !$password) {
    echo "Please don't leave the Username/Email or Password field empty!";
    exit();
}

$db = new Database();

try {
    // Determine if the input is an email address or a username
    if (filter_var($username_or_email, FILTER_VALIDATE_EMAIL)) {
        // Handle the input as an email address
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $db->pdo->prepare($sql);
        $stmt->execute([$username_or_email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "it was an email \n\n";
    } else {
        // Handle the input as a username
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $db->pdo->prepare($sql);
        $stmt->execute([$username_or_email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "it was a username \n\n";

    }

    echo "password: ". $password . "\n";
    print_r($user);
    // Verify password
    if ($user && password_verify($password, $user['password'])) {
        
        $_SESSION['user_id'] = $user['id'];
        // Password is correct
        header("Location: ../../views/user/home.php?login=1");
        exit(); // Ensure no further code is executed
    } else {
        // Password is incorrect or user not found
        header("Location: ../../views/user/register.php?login=0");
        exit(); // Ensure no further code is executed
    }

} catch (PDOException $e) {
    // Handle database errors
    echo "Error: " . $e->getMessage();

} catch (Exception $e){
    echo "Error: " . $e->getMessage();
}
