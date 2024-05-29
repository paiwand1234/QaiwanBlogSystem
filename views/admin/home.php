<!DOCTYPE html>
<html lang="en">
<?php 


// START THE SESSION
session_start();

$user_id = null;

// CHECK IF THE USER IS LOGGED IN
if (!isset($_SESSION['user_id'])) {
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
<title>Admin Dashboard</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>

.card-img-top {
    height: 200px;
    object-fit: cover;
}
.bg{
    background-color: #90C5F9;
}
.card-1{
    background-color: #3465ba;
}
</style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="sidebar bg-dark rounded mx-4 mt-2 shadow">
            <ul class="nav flex-column ">
                <li class="nav-item my-5">
                    <a class="nav-link " href="#"><img src="../../assets/svg/house-chimney-solid.svg" alt="" width="25px !important"></a>
                </li>
                <li class="nav-item my-5">
                <a class="nav-link " href="#"><img src="../../assets/svg/user-solid.svg" alt=""></a>
                </li>
                <li class="nav-item my-5">
                <a class="nav-link " href="#"><img src="../../assets/svg/house-chimney-solid.svg" alt=""></a>
                </li>
            </ul>
        </div>
        <!-- Content -->
        <div class="col-md-10  ">
        <div class="row   mt-5 ">
            <div class="col-3 mx-3 shadow rounded bg-dark">
                <h1 class="text-center text-light">Users</h1>
                <h1 class="text-center my-3 text-light">250</h1>
                <div class="col-4 text-center  mx-auto">
                    <img src="../../assets/svg/users-solid.svg" alt="" >
                </div>
            </div>
            <div class="col-3 mx-3 shadow rounded bg-dark">
                <h1 class="text-center text-light">Post</h1>
                <h1 class="text-center my-3 text-light">250</h1>
                <div class="col-3 text-center  mx-auto">
                    <img src="../../assets/svg/circle-plus-solid.svg" alt="" >
                </div>
            </div>
            <div class="col-3 mx-3 shadow rounded bg-dark">
                <h1 class="text-center text-light">Head</h1>
                <h1 class="text-center my-3 text-light">250</h1>
                <div class="col-4 text-center  mx-auto">
                    <img src="../../assets/svg/users-solid.svg" alt="" >
                </div>
            </div>
        </div>
        <h1 class="mt-5">New Users</h1>
        <hr class="">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <img src="../../assets/image/istockphoto-517188688-612x612.jpg" class="card-img-top" alt="User Image">
                            <div class="card-body">
                                <h5 class="card-title">John Doe</h5>
                                <p class="card-text">Role: User</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="../../assets/image/istockphoto-517188688-612x612.jpg" class="card-img-top" alt="User Image">
                            <div class="card-body">
                                <h5 class="card-title">John Doe</h5>
                                <p class="card-text">Role: Head Of Department</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="../../assets/image/istockphoto-517188688-612x612.jpg" class="card-img-top" alt="User Image">
                            <div class="card-body">
                                <h5 class="card-title">John Doe</h5>
                                <p class="card-text">Role: Head Of Department</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="../../assets/image/istockphoto-517188688-612x612.jpg" class="card-img-top" alt="User Image">
                            <div class="card-body">
                                <h5 class="card-title">John Doe</h5>
                                <p class="card-text">Role: User</p>
                            </div>
                        </div>
                    </div>
                    <!-- Add more user cards here -->
                </div>
            
        <h1 class="mt-5">New Post</h1>
        <hr class="">
        <div class="row">
        <div class="col-md-3">
                    <div class="card">
                        <img src="../../assets/image/istockphoto-517188688-612x612.jpg" class="card-img-top" alt="User Image">
                        <div class="card-body">
                            <h5 class="card-title">John Doe</h5>
                            <p class="card-text">Role: Administrator</p>
                            <div class="d-grid gap-2">
                                <button class="btn btn-danger" type="button">Delete</button>
                                <button class="btn btn-success" type="button">Accept</button>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- Add more user cards here -->
                </div>
            </div>
        
              
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
