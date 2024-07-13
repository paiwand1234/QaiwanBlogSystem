    <!DOCTYPE html>
<html lang="en">
<?php 
// START THE SESSION
session_start();

$user_id = null;

// CHECK IF THE USER IS LOGGED IN
if (!isset($_SESSION['user_id']) or $_SESSION['role'] !== 'head') {
    // USER IS NOT LOGGED IN, REDIRECT TO LOGIN PAGE
    header("Location: ./register.php");
    exit();
} else {
    $user_id = $_SESSION['user_id'];
}
?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php require 'nav.html'; ?>


<div class="container mt-5">
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card shadow p-3 bg-light rounded border-0">
                <div class="row">
                    <div class="col-3">
                        <img src="../../assets/svg/radiology.png"  width="60px" alt="">
                    </div>
                    <div class="col-9 my-auto">
                        <h4>Medical Imaging</h4>
                        <h6 class="col-12 my-auto text-primary"><a href="../user/departments/MI.php">See More</a></h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- new card  -->
        <div class="col-md-4 mb-4">
            <div class="card shadow p-3 bg-light rounded border-0">
                <div class="row">
                    <div class="col-3">
                        <img src="../../assets/svg/laptop-solid.svg" alt="">
                    </div>
                    <div class="col-9 my-auto">
                        <h4>M L T</h4>
                        <h6 class="col-12 my-auto text-primary"><a href="../user/departments/MLT.php">See More</a></h6>
                    </div>
                </div>
            </div>
        </div>
         <!-- new card  -->
        <div class="col-md-4 mb-4">
            <div class="card shadow p-3 bg-light rounded border-0">
                <div class="row">
                    <div class="col-3">
                        <img src="../../assets/svg/computer.png" width="60px" alt="">
                    </div>
                    <div class="col-9 my-auto">
                        <h4>Information Technology</h4>
                        <h6 class="col-12 my-auto text-primary"><a href="../user/departments/IT.php">See More</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card shadow p-3 bg-light rounded border-0">
                <div class="row">
                    <div class="col-3">
                        <img src="../../assets/svg/ophtalmology.png" width="60px" alt="">
                    </div>
                    <div class="col-9 my-auto">
                        <h4>Optometry</h4>
                        <h6 class="col-12 my-auto text-primary"><a href="../user/departments/optometry.php">See More</a></h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- new card  -->
        <div class="col-md-4 mb-4">
            <div class="card shadow p-3 bg-light rounded border-0">
                <div class="row">
                    <div class="col-3">
                        <img src="../../assets/svg/genetic.png"width="60px" alt="">
                    </div>
                    <div class="col-9 my-auto">
                        <h4>Biomedical Engineering</h4>
                        <h6 class="col-12 my-auto text-primary"><a href="../user/departments/biomedical.php">See More</a></h6>
                    </div>
                </div>
            </div>
        </div>
         <!-- new card  -->
        <div class="col-md-4 mb-4">
            <div class="card shadow p-3 bg-light rounded border-0">
                <div class="row">
                    <div class="col-3">
                        <img src="../../assets/svg/cyber-security.png" width="60px" alt="">
                    </div>
                    <div class="col-9 my-auto">
                        <h4>Network Security</h4>
                        <h6 class="col-12 my-auto text-primary"><a href="../user/departments/network.php">See More</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card shadow p-3 bg-light rounded border-0">
                <div class="row">
                    <div class="col-3">
                        <img src="../../assets/svg/laboratory.png"width="60px" alt="">
                    </div>
                    <div class="col-9 my-auto">
                        <h4>Medical Laboratory</h4>
                        <h6 class="col-12 my-auto text-primary"><a href="../user/departments/MLT.php">See More</a></h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- new card  -->
        <div class="col-md-4 mb-4">
            <div class="card shadow p-3 bg-light rounded border-0">
                <div class="row">
                    <div class="col-3">
                        <img src="../../assets/svg/agreement.png" width="60px" alt="">
                    </div>
                    <div class="col-9 my-auto">
                        <h4>International Business</h4>
                        <h6 class="col-12 my-auto text-primary"><a href="../user/departments/Business.php">See More</a></h6>
                    </div>
                </div>
            </div>
        </div>
         <!-- new card  -->
        <div class="col-md-4 mb-4">
            <div class="card shadow p-3 bg-light rounded border-0">
                <div class="row">
                    <div class="col-3">
                        <img src="../../assets/svg/staffing.png" width="60px" alt="">
                    </div>
                    <div class="col-9 my-auto">
                        <h4>Human Resource</h4>
                        <h6 class="col-12 my-auto text-primary"><a href="../user/departments/HR.php">See More</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>