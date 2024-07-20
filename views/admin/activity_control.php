<!DOCTYPE html>
<html lang="en">

<?php 


include "../../models/users.php";
include "../../models/club_user_registeration.php";
include "../../models/club_activity_registeration.php";
include "../../controllers/database.php";

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

$db = new Database();
$activity_registerations = new ClubActivityRegisteration($db);


$all_registrations = $activity_registerations->readOneColumn("status", Status::PENDING);


?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Custom CSS -->
  <style>
    body{
        background:linear-gradient(320deg,rgb(20,54,123)0%,rgb(255,255,255)100%) ;
    }
    .post-card {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <?php require 'nav.html'; ?>

  <!-- Content -->
  <div class="container mt-4">
    <h2 class="mb-3">Posts from Head of Department</h2>
    <div class="row">
      <!-- Post Card -->
      <?php foreach ($all_registrations as $registeration ){  ?>
            <div class="col-md-4">
              <div class="card post-card">
                <img src="<?php echo $registeration["image_dir"] ?>" class="card-img-top" alt="Activity Image">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $registeration["title"] ?></h5>
                  <p class="card-text"><?php echo $registeration["description"] ?></p>
                  <div class="text-center d-flex justify-content-center align-items-around">
                    <form action="../../controllers/admin/club_activity_registration/reject_registration.php" class="px-2" method="POST">
                        <input type="hidden" class="" name="id" value="<?php echo $registeration["id"] ?>">
                        <button type="submit" class="btn btn-danger mr-2">Reject</button>    
                    </form>
                    <form action="../../controllers/admin/club_activity_registration/accept_registration.php" class="px-2" method="POST">
                        <input type="hidden" class="" name="id" value="<?php echo $registeration["id"] ?>">
                        <button type="submit" class="btn btn-success">Accept</button>
                    </form>
              
                  </div>
                </div>
              </div>
            </div>
      <?php } ?>

      <!-- More Post Cards Here -->
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>