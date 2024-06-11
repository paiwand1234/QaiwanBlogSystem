<!DOCTYPE html>
<html lang="en">

<?php
include "../../models/clubs.php";
include "../../controllers/database.php";

// START THE SESSION
session_start();

$user_id = null;
// CHECK IF THE USER IS LOGGED IN
if (!isset($_SESSION['user_id'])  && $_SESSION['role'] === 'admin') {
    // USER IS NOT LOGGED IN, REDIRECT TO LOGIN PAGE
    header("Location: ./login.php");
    exit();
} else {
    $user_id = $_SESSION['user_id'];
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Contact Us</title>
    <!-- <link rel="stylesheet" href="../stylesheets/contact.css"> -->
</head>
<style>
    /* Your CSS here */
</style>

<body>
    <!-- Navbar -->
    <?php include "nav.html"; ?>

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
    $club_activities = new Clubs($db);
    $club_results = $club_activities->readAll();

    echo '<div class="container d-flex flex-column my-4">';
    for ($i = 0; $i < count($club_results); $i++) {
        if ($i % 3 == 0) {
            if ($i > 0) {
                echo '</div>'; // Close previous row if not the first item
            }
            echo '<div class="row w-100">'; // Start a new row
        }

        $delete_file = "../../controllers/admin/clubs/delete_club.php";
        echo '<div class="col-4 mb-4">
                <div class="card shadow-lg border-0">
                    <div class="card-container">
                        <img src="' . $club_results[$i]['image'] . '" class="img-fluid rounded" alt="">
                        <div class="d-flex justify-content-around">
                            <a class="btn btn-primary col-3 rounded my-2" href="./club_activities.php?club_id=' . $club_results[$i]['id'] . '" role="button">View</a>
                            <!-- Delete Form -->
                            <form action="' . $delete_file . '" method="POST" class="col-3 p-0 my-2">
                                <input type="hidden" name="club_id" value="' . $club_results[$i]['id'] . '">
                                <button type="submit" class="btn btn-danger col-12 rounded">Delete</button>
                            </form>
                            <div class="head-buttons btn btn-success col-3 rounded my-2" href="./club_activities.php?club_id=' . $club_results[$i]['id'] . '" 
                                data-club-id="' . $club_results[$i]['id'] . '" role="button" data-bs-toggle="modal" data-bs-target="#headModal">
                                head <i class="fa-solid fa-plus" style="width:15px; height: 15px"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }
    echo '</div>';
    echo '</div>';
    ?>

    <div class="text-end m-3 position-fixed" style="bottom: 0px; right: 0px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#addClubModal">
        <img src="../../assets/svg/plus-solid (1).svg" style="padding: 5px;" width="60px" height="60px" class="bg-dark rounded-circle" alt="">
    </div>

    <!-- Add Club Modal -->
    <div class="modal fade" id="addClubModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addClubModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" action="../../controllers/admin/clubs/add_club.php" method="POST" enctype="multipart/form-data">
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

    <!-- Head Modal -->
    <div class="modal fade" id="headModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" action="../../controllers/admin/clubs/add_head.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Head</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="head_exists" value="0" id="head-existence">
                    <input type="hidden" name="club_id" value="0" id="head-club-id">
                    <input type="hidden" name="head_id" value="0" id="head-id">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Head Username:</label>
                        <input type="text" class="form-control" id="head-name" name="name" required>
                    </div>
                    <div id="head-name-alert" class="container px-0 w-100"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const burger = document.querySelector('.burger');
            const navLinks = document.querySelector('.nav-links');

            if (burger) {
                burger.addEventListener('click', () => {
                    navLinks.classList.toggle('nav-active');
                    burger.classList.toggle('active');
                });
            }

            const head_name = document.getElementById('head-name');
            const head_buttons = [...document.getElementsByClassName('head-buttons')];

            head_buttons.forEach((button, index) => {
                button.addEventListener('click', (event) => {
                    const head_club_id = document.getElementById('head-club-id');
                    head_club_id.value = button.dataset.clubId;
                });
            });

            // ADD AN EVENT LISTENER FOR THE 'input' EVENT
            if (head_name) {
                head_name.addEventListener('input', async (event) => {
                    // DEFINE THE URL OF THE API ENDPOINT
                    const url = `${window.location.origin}/QaiwanBlogSystem/controllers/admin/clubs/read_head.php`;

                    // DEFINE THE PARAMETERS
                    const params = { name: event.target.value };

                    // DEFINE THE REQUEST OPTIONS
                    const options = {
                        method: 'POST', // CAN BE 'GET', 'POST', 'PUT', 'DELETE', ETC.
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(params)
                    };

                    try {
                        // MAKE THE FETCH REQUEST
                        const response = await fetch(url, options);

                        // CHECK IF THE RESPONSE STATUS IS OK (STATUS CODE 200-299)
                        if (!response.ok) throw new Error('Network response was not ok ' + response.statusText);

                        // RETURN THE RESPONSE AS JSON
                        const data = await response.json();
                        const head_name_alert = document.getElementById('head-name-alert');
                        const head_existence = document.getElementById('head-existence');
                        const head_id = document.getElementById('head-id');

                        if (data.status === "error") {
                            head_name_alert.innerHTML = `<div class="alert alert-danger p-2 w-100" role="alert">User doesn't exist</div>`;
                            head_existence.value = '0';
                        } else {
                            head_name_alert.innerHTML = `<div class="alert alert-primary p-2 w-100" role="alert">User exists!</div>`;
                            head_existence.value = '1';
                            head_id.value = data.data[0].id;
                        }
                    } catch (error) {
                        console.error('There has been a problem with your fetch operation:', error);
                    }
                });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
