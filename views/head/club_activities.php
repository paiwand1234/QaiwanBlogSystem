<!DOCTYPE html>
<html lang="en">

<?php

include "../../controllers/database.php";
include "../../models/clubs.php";
include "../../models/club_heads.php";
include "../../models/club_activity.php";
include "../../models/club_user_registeration.php";
include "../../models/club_activity_registeration.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

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

$club_id = filter_input(INPUT_GET, 'club_id', FILTER_SANITIZE_SPECIAL_CHARS);

try {
    $db = new Database();
    $clubs = new Clubs($db);
    $club_heads = new ClubHeads($db);
    $club_activities = new ClubActivities($db);
    $activity_registerations = new ClubActivityRegisteration($db);

    $project = $clubs->read($club_id);

    $data = array(
        "user_id" => $user_id,
        "club_id" => $club_id
    );

    $club_head = $club_heads->readMultipleColumns($data, Operators::AND);
    $activities = $club_activities->readOneColumn('club_id', $club_id);
    $data = array(
        "user_id" => $user_id,
        "club_id" => $club_id,
        "status" => Status::PENDING
    );

    $activity_registeration = $activity_registerations->readMultipleColumns($data, Operators::AND);

    
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
    exit();
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../stylesheets/sport.css">
    <title><?php echo htmlspecialchars($project['name']); ?></title>
</head>

<style>
/* Add your custom styles here */
</style>

<body>
    <div class="video-container">
        <img src="<?php echo htmlspecialchars($project['image']); ?>" alt="" class="img">
        <div class="video-text">
            <h1><?php echo htmlspecialchars($project['name']); ?></h1>
        </div>
        <?php include 'nav.html'; ?>
    </div>

    <div class="container mt-3">
        <div class="row w-100">
            <?php foreach($activities as $activity) { ?>
              <div class="col-6">
                    <div class="card mb-3" style="max-width: 640px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?php echo htmlspecialchars($activity['image']); ?>" class="img-fluid object-fit-cover rounded-start w-100 h-100" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($activity['name']); ?></h5>
                                    <p class="card-text"><?php echo htmlspecialchars($activity['description']); ?></p>
                                    <div class="w-100 d-flex justify-content-start align-content-center">
                                        <button type="button" class="btn btn-outline-success col-3 p-0 my-2 mx-1" onclick="window.location.href='chat.php?club_id=<?php echo $activity['club_id']; ?>&activity_id=<?php echo $activity['id']; ?>'">
                                            Chat
                                        </button>
                                        <?php if ($club_head) { ?>
                                            <form action="../../controllers/head/club_activity/delete_activity.php" method="POST" class="col-3 p-0 my-2 mx-1">
                                                <input type="hidden" name="club_id" value="<?php echo htmlspecialchars($activity['club_id']); ?>">
                                                <input type="hidden" name="activity_id" value="<?php echo htmlspecialchars($activity['id']); ?>">
                                                <button type="submit" class="btn btn-danger col-12 rounded">Delete</button>
                                            </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php foreach($activity_registeration as $activity) { ?>
                <div class="col-6">
                    <div class="card mb-3" style="max-width: 640px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?php echo htmlspecialchars($activity['image_dir']); ?>" class="img-fluid object-fit-cover rounded-start w-100 h-100" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($activity['title']); ?></h5>
                                    <p class="card-text"><?php echo htmlspecialchars($activity['description']); ?></p>
                                    <div class="w-100 d-flex justify-content-start align-content-center">
                                        
                                        <div type="button" class="btn btn-outline-success col-3 p-0 py-1 my-2 mx-1" >
                                            <?php echo htmlspecialchars($activity["status"]) ?>
                                        </div>
                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php if ($club_head) { ?>
        <div class="text-end m-3 position-fixed" style="bottom: 0px; right: 0px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <img src="../../assets/svg/plus-solid (1).svg" style="padding: 5px;" width="60px" height="60px" class="bg-dark rounded-circle" alt="">
        </div>
    <?php } ?>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" action="../../controllers/head/club_activity/add_activity.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="club_id" value="<?php echo htmlspecialchars($club_id); ?>">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
