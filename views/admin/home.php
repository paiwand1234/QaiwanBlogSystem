<!DOCTYPE html>
<html lang="en">
<?php 


// START THE SESSION
session_start();

$user_id = null;
// CHECK IF THE USER IS LOGGED IN
if (!isset($_SESSION['user_id']) or $_SESSION['role'] !== 'admin') {
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
    <link rel="stylesheet" href="../../plugins/fontawesome/css/all.min.css">
</head>
<style>
/* BASIC RESET */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Roboto', sans-serif;
    background-color: #f5f5f5;
    display: flex;
    height: 100vh;
}

.container {
    display: flex;
    width: 100%;
}

.sidebar {
    width: 200px;
    background-color: #2c3e50;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 20px;
    position: fixed;
    height: 100%;
}

.sidebar ul {
    list-style: none;
    width: 100%;
    padding: 0;
}

.sidebar ul li {
    width: 100%;
    margin-bottom: 20px;
}

.sidebar ul li a {
    color: #ecf0f1;
    text-decoration: none;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: 100%;
    padding: 15px 20px;
    transition: background-color 0.3s ease;
}

.sidebar ul li a:hover {
    background-color: #34495e;
}

.sidebar ul li a i {
    margin-right: 10px;
}

.content {
    flex-grow: 1;
    margin-left: 200px;
    padding: 40px;
}

.cards {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.card {
    flex: 1 1 calc(33.333% - 40px); /* 3 cards per row, with gaps considered */
    max-width: calc(33.333% - 40px);
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    display: flex;
    align-items: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.card-icon {
    font-size: 40px;
    margin-right: 20px;
}

.card-activate {
    background-color: #ff6b6b;
    color: #fff;
}

.card-department {
    background-color: #4e89ff;
    color: #fff;
}

.card-club {
    background-color: #4caf50;
    color: #fff;
}
.card-add-club{
    background-color:rgb(255, 187, 0);
    color: #fff;
}

.card h3 {
    margin-bottom: 10px;
    font-size: 1.5em;
}

.card p {
    margin-bottom: 0;
    font-size: 1em;
}

/* Media Queries for smaller screens */
@media (max-width: 768px) {
    .card {
        flex: 1 1 calc(50% - 40px); /* 2 cards per row */
        max-width: calc(50% - 40px);
    }
}

@media (max-width: 480px) {
    .card {
        flex: 1 1 100%; /* 1 card per row */
        max-width: 100%;
    }
}
</style>
<body>
    <div class="container">
        <nav class="sidebar">
            <ul>
                <li><a href="home.php"><i class="fa-solid fa-house"></i> Home</a></li>
                <li><a href="club_activities.php"><i class="fa-solid fa-medal"></i> Activity</a></li>
                <li><a href="post.php"><i class="fa-solid fa-building"></i>Post control</a></li>
                <li><a href="clubs.php"><i class="fa-solid fa-people-group"></i> Club</a></li>
                <li><a href="users.php"><i class="fa-solid fa-user "></i> Users</a></li>
                <li><a href="admin_chat.php"><i class="fa-solid fa-user "></i> chat</a></li>
                <li><a href="login.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
            </ul>
        </nav>
        <main class="content">
            <div class="cards">
                <div class="card card-activate">
                    <i class="fa-solid fa-bolt card-icon"></i>
                    <div>
                        <h3>Activate</h3>
                        <p>Quick access to activation.</p>
                    </div>
                </div>
                <div class="card card-department">
                    <i class="fa-solid fa-building card-icon"></i>
                    <div>
                        <h3>Department</h3>
                        <p>Quick access to departments.</p>
                    </div>
                </div>
                <div class="card card-club">
                    <i class="fa-solid fa-users card-icon"></i>
                    <div>
                        <h3>Club</h3>
                        <p>Quick access to clubs.</p>
                    </div>
                </div>
                <div class="card card-club">
                <i class="fa-solid fa-user card-icon" style="color: #ffffff;"></i>
                    <div>
                        <h3>Users Controls</h3>
                        <p>Quick access to clubs.</p>
                    </div>
                </div>
                <div class="card card-add-club">
                <i class="fa-solid fa-user-plus card-icon"></i>
                    <div>
                        <h3>Add club </h3>
                        <p>Quick access to clubs.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
