<!DOCTYPE html>
<html lang="en">

<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_abort();

$user_id = null;

// CHECK IF THE USER IS LOGGED IN
if (!isset($_SESSION['user_id'])) {
    // USER IS NOT LOGGED IN, REDIRECT TO LOGIN PAGE
    header("Location: ./register.php");
    exit();
}else{

    // if()
    $user_id = $_SESSION['user_id'];

}



?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="../../stylesheets/sport.css">

    <title>Document</title>
</head>
<style>

</style>
<body>
    <div class="video-container">
        <img  src="../../assets/image/1.jpg" alt="" class="img">
        <div class="video-text">
            <h1>sport club</h1>
        </div>
        <div class="container-fliud border ">
          <?php include "nav.html" ?>
      </div>
    </div>
    <div class="container mt-3">
      <div class="row ">
        <div class="col-6 ">
          <div class="card mb-3" style="max-width: 640px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="../../assets/image/500x500.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <button type="button" class="btn btn-outline-success">Chat</button>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 ">
          <div class="card mb-3" style="max-width: 640px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="../../assets/image/500x500.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <button type="button" class="btn btn-outline-success">Chat</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 ">
          <div class="card mb-3" style="max-width: 640px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="../../assets/image/500x500.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <button type="button" class="btn btn-outline-success">Chat</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 ">
          <div class="card mb-3" style="max-width: 640px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="../../assets/image/500x500.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <button type="button" class="btn btn-outline-success">Chat</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

            
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



