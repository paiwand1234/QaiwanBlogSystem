<!DOCTYPE html>
<html lang="en">

<?php

    include "../../models/clubs.php";
    include "../../models/club_user_registration.php";
    include "../../controllers/database.php";

    $db = new Database();
    $club_user_registration = new ClubUserRegistration($db);

    $user_id = $_SESSION['user_id'];
    $users_statuses = $club_user_registration->readOneColumn("status", "pending"); 
    

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Registration Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            margin: 10px;
        }
    </style>
</head>


<body>
    <div class="container mt-5">
        <h1>Club Registrations</h1>
        <div class="row">

        <?php foreach ($users_statuses as $user_status) {?>
            <!-- Card 1 -->
            <div class="card col-lg-3 col-md-6 col-sm-12">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $user_status["username"]; ?></h5>
                    <p class="card-text"><?php echo $user_status["department"]; ?></p>
                    <div class="d-flex justify-content-between">
                        
                        <form method="POST" action="../../controllers/head/club_user_register/user_acceptance.php" class=""> 
                            <input type="hidden" name="id" value="<?php echo $user_status["id"]; ?>"> 
                            <input type="hidden" name="user_id" value="<?php echo $user_status["user_id"]; ?>"> 
                            <input type="hidden" name="club_id" value="<?php echo $user_status["club_id"]; ?>"> 
                            <input type="hidden" name="status" value="accepted"> 
                            <button class="btn btn-success">Accept</button>
                        </form>
                        
                        <form method="POST" action="../../controllers/head/club_user_register/user_acceptance.php" class=""> 
                            <input type="hidden" name="id" value="<?php echo $user_status["id"]; ?>"> 
                            <input type="hidden" name="user_id" value="<?php echo $user_status["user_id"]; ?>"> 
                            <input type="hidden" name="club_id" value="<?php echo $user_status["club_id"]; ?>"> 
                            <input type="hidden" name="status" value="rejected">
                            <button class="btn btn-danger">Reject</button>
                        </form>

                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
