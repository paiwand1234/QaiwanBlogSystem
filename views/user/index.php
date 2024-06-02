<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../../stylesheets/index.css">
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">University Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Departments</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="projectsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Projects
                        </a>
                        <div class="dropdown-menu" aria-labelledby="projectsDropdown">
                            <a class="dropdown-item" href="#">See All Project</a>
                            <a class="dropdown-item" href="#">Add Project</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Activity</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- PARALLAX SECTION 1 -->
    <div class="parallax" id="parallax1">
        <div class="text-overlay">
            <h1>Welcome to Our University Blog</h1>
            <p>Stay updated with the latest news and articles.</p>
        </div>
    </div>

    <!-- CONTENT SECTION 1 -->
    <section class="content-section">
        <div class="container">
            <h2>About Our University</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque aliquam odio et faucibus.</p>
        </div>
    </section>

    <!-- PARALLAX SECTION 2 -->
    <div class="parallax" id="parallax2">
        <div class="text-overlay">
            <h1>Our Departments</h1>
            <p>Discover the diverse range of departments we offer.</p>
        </div>
    </div>

    <!-- CONTENT SECTION 2 -->
    <section class="content-section">
        <div class="container">
            <h2>Projects</h2>
            <p>Student's projects</p>
        </div>
    </section>
    <!-- PARALLAX SECTION 4 (NEW ACTIVITY SECTION) -->
    <div class="parallax" id="parallax4">
        <div class="text-overlay">
            <h1>Activities</h1>
            <p>Engage in various activities and events.</p>
        </div>
    </div>

    <!-- CONTENT SECTION 4 (NEW ACTIVITY CONTENT) -->
    <section class="content-section">
        <div class="container">
            <h2>Our Activities</h2>
            <p>Join our wide range of activities that promote learning and engagement.</p>
        </div>
    </section>
    <!-- PARALLAX SECTION 3 -->
    <div class="parallax" id="parallax3">
        <div class="text-overlay">
            <h1>Contact Us</h1>
            <p>Get in touch with us for more information.</p>
        </div>
    </div>

    <!-- CONTENT SECTION 3 -->
    <section class="content-section">
        <div class="container">
            <h2>Contact Information</h2>
            <p>Email: info@uniq.edu.iq</p>
            <p>Phone: +964 772 141 1414</p>
        </div>
    </section>



    <!-- FOOTER -->
    <footer class="bg-dark text-white pt-4 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>About Us</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque aliquam odio et
                        faucibus.</p>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Home</a></li>
                        <li><a href="#" class="text-white">About</a></li>
                        <li><a href="#" class="text-white">Departments</a></li>
                        <li><a href="#" class="text-white">Activity</a></li>
                        <li><a href="#" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>Contact Us</h5>
                    <p><a href="mailto:info@uniq.edu.iq" class="text-white"><i class="fas fa-envelope"></i>
                            info@uniq.edu.iq</a></p>
                    <p><a href="tel:+9647721411414" class="text-white"><i class="fas fa-phone"></i> +964 772 141
                            1414</a></p>
                    <h5>Follow Us</h5>
                    <a href="https://www.facebook.com" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com" class="text-white me-2"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="bg-secondary text-center py-2">
            <p class="mb-0">&copy; 2024 University Blog. All rights reserved.</p>
        </div>
    </footer>

    <!-- BOOTSTRAP AND FONT AWESOME SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>