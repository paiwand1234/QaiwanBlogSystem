<!DOCTYPE html>
<html lang="en">

<?php 

include "../../models/clubs.php";
include "../../controllers/database.php";


// START THE SESSION
session_start();

$user_id = null;
// CHECK IF THE USER IS LOGGED IN
if (!isset($_SESSION['user_id']) or $_SESSION['role'] !== 'head') {
    // USER IS NOT LOGGED IN, REDIRECT TO LOGIN PAGE
    header("Location: ./register.php");
    exit();
}else{
    
    $user_id = $_SESSION['user_id'];

}


?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Contact Us</title>
    <!-- <link rel="stylesheet" href="../stylesheets/contact.css"> -->
</head>

<style>

        .card-container {
            position: relative;
            text-align: center;
            color: white;
            height: 100%;
        }
        .card-text {
            position: absolute;
            top: 80%;
            left: 20%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.8); /* Optional: to make the text more readable */
            padding: 10px;
            border-radius: 5px;
        }
       
        .card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .card img {
            flex-grow: 1;
            object-fit: cover;
            height: 300px;
        }
       
</style>

<body>
    <!-- Navbar -->
 
    <?php include "nav.html" ?>
   
    <div class="container m-5">
        <div class="row">
            <div class="col-12 rounded ">
               <h1>Club's Activity </h1>
            </div>
        </div>
    </div>
    <hr class="mx-5">

<?php

$db = new Database();
$clubs = new Clubs($db);

$club_results = $clubs->readAll();

echo '<div class="container d-flex flex-column my-4">';
for ($i = 0; $i < count($club_results); $i++) {
    if ($i % 3 == 0) {
        if ($i > 0) {
            echo '</div>'; // Close previous row if not the first item
        }
        echo '<div class="row w-100">'; // Start a new row
    }

    $delete_file = "../../controllers/head/clubs/delete_club.php";
    echo '<div class="col-4 mb-4">
    <div class="card shadow-lg border-0">
        <div class="card-container">
            <img src="' . $club_results[$i]['image'] . '" class="img-fluid rounded" alt="">
            <div class="d-flex justify-content-center">
                <a class="btn btn-primary col-5 rounded my-2" href="./club_activities.php?club_id=' . $club_results[$i]['id'] . '" role="button">View</a>
            </div>
        </div>
    </div>
</div>';


}

// Close the last row
echo '</div>';
echo '</div>';
?>


    
   
    <!-- <div class="text-end m-3 position-fixed " style="bottom: 0px; right: 0px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <img src="../../assets/svg/plus-solid (1).svg" style="padding: 5px;" width="60px" height="60px" class="bg-dark rounded-circle " alt="">
    </div> -->

      
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" action="../../controllers/head/clubs/add_club.php" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Adding Clubs</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Club Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="name" required>
          </div>
          <label for="inputGroupFile02" class="col-form-label">Club Image:</label>
          <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile02" name="image" required>
        </div>

          <div class="mb-3">
            <label for="message-text" class="col-form-label">Club Description:</label>
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