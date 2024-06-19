<!DOCTYPE html>
<html lang="en">
<?php 


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


?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Custom CSS -->
  <style>
    /* Custom styles */
    body {
      background-color: #f8f9fa;
    }

    .user-card {
      margin-bottom: 20px;
    }

    .user-card .card-body {
      display: flex;
      align-items: center;
    }

    .user-card .card-img-circle {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 50%;
      margin-right: 15px;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <?php include "nav.html"; ?>

  <!-- User Cards -->
  <div class="container mt-5">
    <div id="user-container" class="row">
    
      <div class="col-lg-4">
        <div class="card user-card">
          <div class="card-body">
            <img src="../../assets/image/istockphoto-517188688-612x612.jpg" alt="User" class="card-img-circle">
            <div>
              <h5 class="card-title">Karo Kurda</h5>
              <p class="card-text">Department: software engineering</p>
              <p class="card-text">Role: Head Of Department</p>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-danger  col-12 ">Delete</button>
          </div>
        </div>
      </div>

      
     
      <!-- Add more user cards here -->
    </div>
  </div>

  <script>
    
  let userListRequest = async (limit, offset) => {
        // DEFINE THE URL OF THE API ENDPOINT
        const url = `${window.location.origin}/QaiwanBlogSystem/controllers/admin/users/read_users.php`;

        // DEFINE THE PARAMETERS
        const params = { 
            limit: limit,
            offset: offset,
        };

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
            
            console.log(data['data'])
            const user_container = document.getElementById('user-container');

            user_container.innerHTML = "";
            
            user_data = data['data']
            for(let i = 0 ; i < user_data.length ;i++){
                user_container.innerHTML += `
                      <div class="col-lg-4">
                        <div class="card user-card">
                          <div class="card-body">
                            <img src="../../assets/image/istockphoto-517188688-612x612.jpg" alt="User" class="card-img-circle">
                            <div>
                              <h5 class="card-title">${user_data[i]['username']}</h5>
                 
                              <p class="card-text">Role: ${user_data[i]['role']}</p>
                            </div>
                          </div>
                          <form class="card-footer" action="${window.location.origin}/QaiwanBlogSystem/controllers/admin/users/delete_users.php" method="POST">
                            <button type="submit" class="btn btn-danger  col-12 ">Delete</button>
                          </div>
                        </div>
                      </div>
                `
            }


            
        } catch (error) {
            console.error('There has been a problem with your fetch operation:', error);
        }
}

  document.addEventListener('DOMContentLoaded', async () => await userListRequest(50, 0))


  </script>


  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

</html>
