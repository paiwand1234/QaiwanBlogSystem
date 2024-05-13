<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Project Management</title>
</head>
<style>
     * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #90C5F9;
            padding: 15px 0;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
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


    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #333;
        color: #fff;
        padding: 10px 0;
        text-align: center;
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        text-align: center;
    }

    nav ul li {
        display: inline;
        margin-right: 20px;
    }

    nav ul li a {
        color: #333;
        text-decoration: none;
    }

    main {
        padding: 20px;
    }

    #add-project {
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
        max-width: 400px;
        margin: 0 auto;
    }

    label,
    input,
    textarea {
        margin-bottom: 10px;
    }

    button {
        padding: 8px 16px;
        background-color: #333;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #555;
    }

    #project-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }

    .project-card {
        border: 1px solid #ccc;
        padding: 10px;
    }

    .project-card h3 {
        margin-top: 0;
    }

    footer {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 10px 0;
    }
</style>

<body>
<nav class="navbar">
            <div class="container">
                <a href="#" class="logo">Your Logo</a>
                <ul class="nav-links">
                    <li><a href="Home.php">Home</a></li>
                    <li><a href="Activity.html">Activity</a></li>
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
    </header>

    <main>
        <section id="add-project">
            <h2>Add New Project</h2>
            <form>
                <label for="project-name">Project Name:</label>
                <input type="text" id="project-name" name="project-name">
                <label for="project-desc">Project Description:</label>
                <textarea id="project-desc" name="project-desc"></textarea>
                <label for="project-file">Project File:</label>
                <input type="file" id="project-file" name="project-file">
                <button type="submit">Add Project</button>
            </form>
        </section>
        <section id="project-list">
            <h2>Projects</h2>

        </section>
    </main>
    <footer>
        <p>&copy; 2024 Project Management System</p>
    </footer>
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