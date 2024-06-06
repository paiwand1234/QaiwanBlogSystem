<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../../stylesheets/sport.css">

  <title>Document</title>
</head>
<style>

</style>

<body>
  <div class="video-container">
    <img src="../../assets/image/1.jpg" alt="" class="img">
    <div class="video-text">
      <h1>sport club</h1>
    </div>
    <div class="container-fliud border ">
      <nav class="navbar ">
        <div class="container">
          <a href="#" class="logo">Your Logo</a>
          <ul class="nav-links">
            <li><a href="Home.php">Home</a></li>
            <li><a href="Activity.php">Activity</a></li>
            <li><a href="Department.php">Department</a></li>
            <li><a href="Project.php">Project</a></li>
            <li><a href="Contactus.php">Contact Us</a></li>
          </ul>
          <form class="search-form">
            <input type="text" placeholder="Search...">
            <button type="submit">Search</button>
          </form>
          <div class="burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <div class="container mt-3">
    <div class="row ">
      <div class="col-6 ">
        <div class="card mb-3" style="max-width: 640px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="../../assets/image/500x500.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <button type="button" class="btn btn-outline-success">Chat</button>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 ">
        <div class="card mb-3" style="max-width: 640px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="../../assets/image/500x500.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <button type="button" class="btn btn-outline-success">Chat</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 ">
        <div class="card mb-3" style="max-width: 640px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="../../assets/image/500x500.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <button type="button" class="btn btn-outline-success">Chat</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 ">
        <div class="card mb-3" style="max-width: 640px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="../../assets/image/500x500.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <button type="button" class="btn btn-outline-success">Chat</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="text-end m-3 position-fixed " style="bottom: 0px; right: 0px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <img src="../../assets/svg/plus-solid (1).svg" style="padding: 5px;" width="60px" height="60px" class="bg-dark rounded-circle " alt="">
  </div>


  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>