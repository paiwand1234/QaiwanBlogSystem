<!DOCTYPE html>
<html lang="en">

<?php

include "../../controllers/database.php";
include "../../models/clubs.php";
include "../../models/club_heads.php";
include "../../models/club_activity.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$user_id = null;

// CHECK IF THE USER IS LOGGED IN
if (!isset($_SESSION['user_id'])) {
    // USER IS NOT LOGGED IN, REDIRECT TO LOGIN PAGE
    header("Location: ./login.php");
    exit();
} else {
    $user_id = $_SESSION['user_id'];
}

$club_id = filter_input(INPUT_GET, 'club_id', FILTER_SANITIZE_SPECIAL_CHARS);

$db = new Database();
$clubs = new Clubs($db);
$club_heads = new ClubHeads($db);
$club_activities = new ClubActivities($db);

$club = $clubs->read($club_id);


$club_activities = $club_activities->readOneColumn('club_id', $club_id);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../stylesheets/sport.css">

    <title><?php echo htmlspecialchars($club['name']); ?></title>
</head>
<style>
/* Add your custom styles here */
</style>

<body>
    <div class="video-container">
        <img src="<?php echo htmlspecialchars($club['image']); ?>" alt="" class="img">
        <div class="video-text">
            <h1><?php echo htmlspecialchars($club['name']); ?></h1>
        </div>
        <?php include 'nav.html'; ?>
    </div>

    <div class="container mt-3">
        <div class="row w-100">

            <?php foreach($club_activities as $index_0 => $activity ){ ?>
              <div class="col-6">
                    <div class="card mb-3" style="max-width: 640px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?php echo $activity['image'];?>" class="img-fluid object-fit-cover rounded-start w-100 h-100" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $activity['name'] ?></h5>
                                    <p class="card-text"><?php echo $activity['description'] ?></p>
                                    <div class="w-100 d-flex justify-content-start align-content-center">
                                        <button type="button" class="btn btn-outline-success col-3 p-0 my-2 mx-1" onclick="window.location.href='chat.php?club_id=<?php echo $activity['club_id'] ?>&activity_id=<?php echo $activity['id'] ?>'">Chat</button>
                                        <form action="../../controllers/head/club_activity/delete_activity.php" method="POST" class="col-3 p-0 my-2 mx-1">
                                            <input type="hidden" name="club_id" value="<?php echo htmlspecialchars($club['id']); ?>">
                                            <button type="submit" class="btn btn-danger col-12 rounded">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
      
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
