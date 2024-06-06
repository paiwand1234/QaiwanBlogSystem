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
      <div class="col-md-4">
        <div class="card post-card">
          <img src="../../assets/image/bg1.png" class="card-img-top" alt="Post Image">
          <div class="card-body">
            <h5 class="card-title">Post Title</h5>
            <p class="card-text">Name of User or Head of Department</p>
            <p class="card-text">Rule</p>
            <div class="text-center">
              <button type="button" class="btn btn-danger mr-2">Delete</button>
              <button type="button" class="btn btn-success">Accept</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card post-card">
          <img src="../../assets/image/bg1.png" class="card-img-top" alt="Post Image">
          <div class="card-body">
            <h5 class="card-title">Post Title</h5>
            <p class="card-text">Name of User or Head of Department</p>
            <p class="card-text">Rule</p>
            <div class="text-center">
              <button type="button" class="btn btn-danger mr-2">Delete</button>
              <button type="button" class="btn btn-success">Accept</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card post-card">
          <img src="../../assets/image/bg1.png" class="card-img-top" alt="Post Image">
          <div class="card-body">
            <h5 class="card-title">Post Title</h5>
            <p class="card-text">Name of User or Head of Department</p>
            <p class="card-text">Rule</p>
            <div class="text-center">
              <button type="button" class="btn btn-danger mr-2">Delete</button>
              <button type="button" class="btn btn-success">Accept</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card post-card">
          <img src="../../assets/image/bg1.png" class="card-img-top" alt="Post Image">
          <div class="card-body">
            <h5 class="card-title">Post Title</h5>
            <p class="card-text">Name of User or Head of Department</p>
            <p class="card-text">Rule</p>
            <div class="text-center">
              <button type="button" class="btn btn-danger mr-2">Delete</button>
              <button type="button" class="btn btn-success">Accept</button>
            </div>
          </div>
        </div>
      </div>
      <!-- More Post Cards Here -->
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>