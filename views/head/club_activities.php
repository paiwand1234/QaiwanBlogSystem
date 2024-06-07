<!DOCTYPE html>
<html lang="en">

<?php

include "../../controllers/database.php";
include "../../models/clubs.php";
include "../../models/club_heads.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$user_id = null;

// CHECK IF THE USER IS LOGGED IN
if (!isset($_SESSION['user_id'])) {
  // USER IS NOT LOGGED IN, REDIRECT TO LOGIN PAGE
  header("Location: ./register.php");
  exit();
} else {

  $user_id = $_SESSION['user_id'];
}


$club_id = filter_input(INPUT_GET, 'club_id', FILTER_SANITIZE_SPECIAL_CHARS);


$db = new Database();
$clubs = new Clubs($db);
$club_heads = new ClubHeads($db);

$project = $clubs->read($club_id);

$data = array(
  "user_id" => $user_id,
  "club_id" => $project['id']
);

$club_head = $club_heads->readMultipleColumns($data, Operators::AND);


// print_r($club_head);

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../stylesheets/sport.css">

  <title>Document</title>
</head>
<style>

</style>

<body>
  <div class="video-container">
  <img  src="<?php echo $club['image'] ?>" alt="" class="img">
        <div class="video-text">
            <h1><?php echo $club['name'] ?></h1>
        </div>
        <?php require 'nav.html'; ?>
  </div>
  <div class="container mt-3">

    <div class="row ">

      <div class="col-6">
        <div class="card-body d-flex">
          <!-- Image Column -->
          <div class="me-3">
            <img src="path/to/your/image.jpg" alt="Image" class="img-fluid" style="max-width: 150px;">
          </div>
          <!-- Content Column -->
          <div>
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <div class="d-flex">
              <button type="button" class="btn btn-outline-success me-2">Chat</button>
              <form action="../../controllers/head/club_activity/delete_activity.php" method="POST" class="delete-form d-flex">
                <input type="hidden" name="project_id" value="<?php echo ""; ?>">
                <input class="d-none" type="hidden" name="project_id">
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      

    </div>

  </div>

  <?php if ($club_head) { ?>

    <div class="text-end m-3 position-fixed " style="bottom: 0px; right: 0px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      <img src="../../assets/svg/plus-solid (1).svg" style="padding: 5px;" width="60px" height="60px" class="bg-dark rounded-circle " alt="">
    </div>

  <?php } ?>



  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form class="modal-content" action="../../controllers/admin/head/add_activity.php" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Adding Club Activity</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Activity Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="name" required>
          </div>
          <label for="inputGroupFile02" class="col-form-label">Activity Image:</label>
          <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile02" name="image" required>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Activity Description:</label>
            <textarea class="form-control" id="message-text" name="description" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>


 
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>