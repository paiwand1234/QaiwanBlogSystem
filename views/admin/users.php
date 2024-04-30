<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Posts</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- User Cards -->
  <div class="container mt-5">
    <div class="row">
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
      <div class="col-lg-4">
        <div class="card user-card">
          <div class="card-body">
            <img src="../../assets/image/istockphoto-517188688-612x612.jpg" alt="User" class="card-img-circle">
            <div>
              <h5 class="card-title">Paiwand Hadi</h5>
              <p class="card-text">Department:software engineering</p>
              <p class="card-text">Role: Head Of Department</p>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-danger  col-12 ">Delete</button>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card user-card">
          <div class="card-body">
            <img src="../../assets/image/istockphoto-517188688-612x612.jpg" alt="User" class="card-img-circle">
            <div>
              <h5 class="card-title">Alan Ali</h5>
              <p class="card-text">Department: IT</p>
              <p class="card-text">Role: Head Of Department</p>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-danger  col-12 ">Delete</button>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card user-card">
          <div class="card-body">
            <img src="../../assets/image/istockphoto-517188688-612x612.jpg" alt="User" class="card-img-circle">
            <div>
              <h5 class="card-title">Braw Araz</h5>
              <p class="card-text">Department: Network</p>
              <p class="card-text">Role: Head Of Department</p>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-danger  col-12 ">Delete</button>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card user-card">
          <div class="card-body">
            <img src="../../assets/image/istockphoto-517188688-612x612.jpg" alt="User" class="card-img-circle">
            <div>
              <h5 class="card-title">Didan Dana</h5>
              <p class="card-text">Department: Biomedical</p>
              <p class="card-text">Role: Head Of Department</p>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-danger  col-12 ">Delete</button>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card user-card">
          <div class="card-body">
            <img src="../../assets/image/istockphoto-517188688-612x612.jpg" alt="User" class="card-img-circle">
            <div>
              <h5 class="card-title">Diray Dana</h5>
              <p class="card-text">Department: Network</p>
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

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
