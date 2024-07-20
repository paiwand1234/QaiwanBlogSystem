<!DOCTYPE html>
<html lang="en">

<?php

include "../../models/clubs.php";
include "../../models/club_user_registeration.php";
include "../../models/club_heads.php";
include "../../controllers/database.php";

session_start();  // Ensure the session is started

$db = new Database();
$user_id = $_SESSION['user_id'];

// Prepare the query
$query = "SELECT * FROM club_user_registration WHERE club_id IN (SELECT club_id FROM club_heads WHERE user_id = :user_id)";

// Prepare the statement
$stmt = $db->pdo->prepare($query);

// Execute the statement with the user_id parameter
$stmt->execute([':user_id' => $user_id]);

// Fetch all results
$users_statuses = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

        <?php foreach ($users_statuses as $user_status) {
            if($user_status["status"] == "pending"){
            ?>
            
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
            <?php }?>
        <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
