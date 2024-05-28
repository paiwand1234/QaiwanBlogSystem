<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
     * {
            
        }

        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #90C5F9;
            padding: 15px 0;
        }

     

        .logo {
            color: #fff;
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
        }

        .nav-links {
            list-style: none;
            display: flex;
        }

        .nav-links li {
            margin-right: 20px;
        }

        .nav-links li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .nav-links li a:hover {
            color: #3465ba;
        }

        .search-form {
            display: none;
        }

        .burger {
            display: none;
        }

        @media screen and (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .search-form {
                display: block;
                margin-right: auto;
            }

            .nav-active {
                display: flex;
                flex-direction: column;
                position: absolute;
                top: 70px;
                right: 20px;
                background-color: #90C5F9;
                width: 50%;
                padding: 10px;
                border-radius: 5px;
                z-index: 99;
                animation: navSlide 0.5s ease forwards;
            }

            @keyframes navSlide {
                from {
                    opacity: 0;
                    transform: translateY(-50px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .nav-active li {
                opacity: 0;
            }

            .nav-active li a {
                color: #fff;
                text-decoration: none;
                margin: 10px 0;
                opacity: 1;
                transition: opacity 0.5s ease;
            }

            .burger {
                display: block;
                cursor: pointer;
            }

            .burger .line {
                width: 25px;
                height: 3px;
                background-color: #fff;
                margin: 5px;
                transition: all 0.3s ease;
            }

            .burger.active .line:nth-child(1) {
                transform: rotate(-45deg) translate(-5px, 6px);
            }

            .burger.active .line:nth-child(2) {
                opacity: 0;
            }

            .burger.active .line:nth-child(3) {
                transform: rotate(45deg) translate(-5px, -6px);
            }
        }

</style>
<body>
<?php require 'nav.html'; ?>

     <div class="container mt-5">
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card shadow p-3 bg-light rounded border-0">
                <div class="row">
                    <div class="col-3">
                        <img src="../../assets/svg/laptop-solid.svg" width="60px" alt="">
                    </div>
                    <div class="col-9 my-auto">
                        <h4>Software Engineering</h4>
                        <h6 class="col-12 my-auto text-primary">See More</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- new card  -->
        <div class="col-md-4 mb-4">
            <div class="card shadow p-3 bg-light rounded border-0">
                <div class="row">
                    <div class="col-3">
                        <img src="../../assets/svg/tooth-solid.svg" width="60px" alt="">
                    </div>
                    <div class="col-9 my-auto">
                        <h4>Dentistry</h4>
                        <h6 class="col-12 my-auto text-primary">See More</h6>
                    </div>
                </div>
            </div>
        </div>
         <!-- new card  -->
        <div class="col-md-4 mb-4">
            <div class="card shadow p-3 bg-light rounded border-0">
                <div class="row">
                    <div class="col-3">
                        <img src="../../assets/svg/prescription-bottle-medical-solid.svg" width="50px" alt="">
                    </div>
                    <div class="col-9 my-auto">
                        <h4>Pharmacy</h4>
                        <h6 class="col-12 my-auto text-primary">See More</h6>
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
                        <img src="../../assets/svg/radiology.png"  width="60px" alt="">
                    </div>
                    <div class="col-9 my-auto">
                        <h4>Medical Imaging</h4>
                        <h6 class="col-12 my-auto text-primary">See More</h6>
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
                        <h6 class="col-12 my-auto text-primary">See More</h6>
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
                        <h6 class="col-12 my-auto text-primary">See More</h6>
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
                        <h6 class="col-12 my-auto text-primary">See More</h6>
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
                        <h6 class="col-12 my-auto text-primary">See More</h6>
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
                        <h6 class="col-12 my-auto text-primary">See More</h6>
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
                        <h6 class="col-12 my-auto text-primary">See More</h6>
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
                        <h6 class="col-12 my-auto text-primary">See More</h6>
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
                        <h6 class="col-12 my-auto text-primary">See More</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
</body>
<script>
    const burger = document.querySelector('.burger');
    const navLinks = document.querySelector('.nav-links');

    burger.addEventListener('click', () => {
        navLinks.classList.toggle('nav-active');
        burger.classList.toggle('active');
    });


</script>
</html>