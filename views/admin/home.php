<!DOCTYPE html>
<html lang="en">
<?php 


// START THE SESSION
session_start();

$user_id = null;

// CHECK IF THE USER IS LOGGED IN
if (!isset($_SESSION['user_id'])) {
    // USER IS NOT LOGGED IN, REDIRECT TO LOGIN PAGE
    header("Location: ./login.php");
    exit();
}else{
    
    $user_id = $_SESSION['user_id'];

}


?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
   /* BASIC RESET */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    display: flex;
    height: 100vh;
}

.container {
    display: flex;
    width: 100%;
}

.sidebar {
    width: 60px;
    background-color: #333;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 20px;
}

.sidebar ul {
    list-style: none;
    width: 100%;
}

.sidebar ul li {
    width: 100%;
    margin-bottom: 20px;
}

.sidebar ul li a {
    color: #fff;
    text-decoration: none;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 50px;
}

.sidebar ul li a:hover {
    background-color: #555;
}

.icon-home::before,
.icon-activate::before,
.icon-department::before,
.icon-club::before,
.icon-logout::before {
    content: '🏠';
    /* ADD RELEVANT ICONS HERE */
}

.content {
    flex-grow: 1;
    padding: 20px;
}

.cards {
    display: flex;
    gap: 20px;
}

.card {
    flex: 1;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    color: #fff;
}

.card-activate {
    background-color: #ff6b6b;
}

.card-department {
    background-color: #4e89ff;
}

.card-club {
    background-color: #4caf50;
}

.card h3 {
    margin-bottom: 10px;
}

.card p {
    margin-bottom: 0;
}
 
</style>
<body>
    <div class="container">
        <nav class="sidebar">
            <ul>
                <li><a href="#home"><i class="fa-solid fa-house" style="color: #74C0FC;"></i></a></li>
                <li><a href="#activate"><i class="icon-activate"></i></a></li>
                <li><a href="#department"><i class="icon-department"></i></a></li>
                <li><a href="#club"><i class="icon-club"></i></a></li>
                <li><a href="#logout"><i class="icon-logout"></i></a></li>
            </ul>
        </nav>
        <main class="content">
            <div class="cards">
                <div class="card card-activate">
                    <h3>Activate</h3>
                    <p>Quick access to activation.</p>
                </div>
                <div class="card card-department">
                    <h3>Department</h3>
                    <p>Quick access to departments.</p>
                </div>
                <div class="card card-club">
                    <h3>Club</h3>
                    <p>Quick access to clubs.</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>