<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            width: 400px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div class="container vh-100 vw-100">
        <div class="row h-100">
            <div class="col-md-6 offset-md-3 d-flex justify-content-center align-items-center">
                <div class="login-container">
                    <h2 class="text-center mb-4">Login</h2>
                    <form action="../../controllers/adminLogin.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <!-- <div class="mt-3 text-center">
                        <p>Don't have an account? <a href="#">Sign up</a></p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
