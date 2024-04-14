<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="../stylesheets/style.css">
    <title>signin-signup</title>
</head>

<body>
    <div class="container">
        <div class="signin-signup">
            <form class="sign-in-form">
                <h2 class="title">sign in</h2>
                <div class="input-field">
                    <i class="fa fa-user"></i>
                    <input type="text" placeholder="Username">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password">
                </div>
                <input type="submit" value="Login" class="btn">
                <p class="account-text">Don't have an account?<a href="#" id="sign-up-btn2">Sign up</a></p>

            </form>

            <form class="sign-up-form">
                <h2 class="title">sign up</h2>
                <div class="input-field">
                    <i class="fa fa-user"></i>
                    <input type="text" placeholder="Username">
                </div>
                <div class="input-field">
                    <i class="fa fa-user"></i>
                    <input type="text" placeholder="Email">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password">
                </div>
                <input type="submit" value="Sign up" class="btn">
                <p class="account-text">Already have an account?<a href="#" id="sign-in-btn2">Sign in</a></p>


            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Member of Brand?</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio odit perspiciatis ratione
                        officiis laboriosam placeat?</p>
                    <button class="btn" id="sign-in-btn">Sign in</button>
                </div>
                <img src="../assets/image/Sign%20in-amico.svg" alt="image" class="image">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>New to Brand?</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio odit perspiciatis ratione
                        officiis laboriosam placeat?</p>
                    <button class="btn" id="sign-up-btn">Sign up</button>
                </div>
                <img src="../assets/image/Sign%20up-amico.svg" alt="image" class="image">
            </div>
        </div>

    </div>
    <script src="../scripts/app.js"></script>
</body>

</html>