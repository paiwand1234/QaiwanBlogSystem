<!DOCTYPE html>
<html lang="en">

<?php 
include "../../controllers/database.php";
include "../../models/clubs.php";


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


$club_id = filter_input(INPUT_GET, 'club_id', FILTER_SANITIZE_SPECIAL_CHARS);


$db = new Database();
$clubs = new Clubs($db);

$club = $clubs->read($club_id);

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
        <img  src="<?php echo $club['image'] ?>" alt="" class="img">
        <div class="video-text">
            <h1><?php echo $club['name'] ?></h1>
        </div>
        <div class="container-fliud border ">
          <?php include "nav.html" ?>
      </div>
    </div>
    <div class="container mt-3">
      <div class="row w-100">
        <div class="col-6 ">
          <div class="card mb-3" style="max-width: 640px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="../../assets/image/500x500.jpg" class="img-fluid object-fit-cover rounded-start w-100 h-100" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="w-100 d-flex justify-content-start align-content-center">
                    <button type="button" class="btn btn-outline-success col-3 p-0 my-2 mx-1" onclick="window.location.href='chat.php'">Chat</button>
                    <form action="' . $delete_file . '" method="POST" class="col-3 p-0 my-2 mx-1">
                                <input type="hidden" name="club_id" value="' . $club_results[$i]['id'] . '">
                                <button type="submit" class="btn btn-danger col-12 rounded">Delete</button>
                    </form>

                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>



