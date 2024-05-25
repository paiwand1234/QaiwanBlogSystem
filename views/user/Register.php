<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register</title>
    <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .auth-container {
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
                <div class="auth-container">
                    <ul class="nav nav-tabs" id="authTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="signUpTab" data-bs-toggle="tab" data-bs-target="#signUp" type="button" role="tab" aria-controls="signUp" aria-selected="false">Sign Up</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="signInTab" data-bs-toggle="tab" data-bs-target="#signIn" type="button" role="tab" aria-controls="signIn" aria-selected="true">Sign In</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="authTabContent">
                        <div class="tab-pane fade" id="signUp" role="tabpanel" aria-labelledby="signUpTab">
                            <h2 class="text-center mb-4">Register As User</h2>
                            <form action="../../controllers/users/register.php" method="POST">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="student_id" class="form-label">Student Id</label>
                                    <input type="text" class="form-control" id="student_id" name="student_id" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Sign Up</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade show active" id="signIn" role="tabpanel" aria-labelledby="signInTab">
                            <h2 class="text-center mb-4">Sign In</h2>
                            <form action="../../controllers/users/login.php" method="POST">
                                <div class="mb-3">
                                    <label for="usernameEmail" class="form-label">Username or Email</label>
                                    <input type="text" class="form-control" id="usernameEmail" name="username_email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordSignIn" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="passwordSignIn" name="password_signin" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
