<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Project Cards</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-width: 1200px;
            margin: 20px auto;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 22%;
            min-width: 200px;
            text-align: center;
            overflow: hidden;
        }

        .project-image {
            width: 100%;
            height: auto;
        }

        .project-name {
            font-size: 1.5em;
            margin: 15px 0 10px 0;
        }

        .project-description {
            font-size: 1em;
            color: #666;
            padding: 0 15px;
            margin-bottom: 15px;
        }

        .download-btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 15px 0;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .download-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include "nav.html" ?>
    <div class="container">
        <div class="card">
            <img src="../../assets/image/background.png" alt="Project Image 1" class="project-image">
            <h2 class="project-name">Project Name 1</h2>
            <p class="project-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime dolor autem perferendis voluptate obcaecati sequi sint sed accusantium accusamus possimus ratione, ea veritatis beatae! Laboriosam impedit nemo eius deserunt ut.</p>
            <a href="download-link1" class="download-btn col-6 mx-auto">Download</a>
        </div>
        <div class="card">
            <img src="../../assets/image/background.png" alt="Project Image 2" class="project-image">
            <h2 class="project-name">Project Name 2</h2>
            <p class="project-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime dolor autem perferendis voluptate obcaecati sequi sint sed accusantium accusamus possimus ratione, ea veritatis beatae! Laboriosam impedit nemo eius deserunt ut.</p>
            <a href="download-link2" class="download-btn col-6 mx-auto">Download</a>
        </div>
        <div class="card">
            <img src="../../assets/image/background.png" alt="Project Image 3" class="project-image">
            <h2 class="project-name">Project Name 3</h2>
            <p class="project-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime dolor autem perferendis voluptate obcaecati sequi sint sed accusantium accusamus possimus ratione, ea veritatis beatae! Laboriosam impedit nemo eius deserunt ut.</p>
            <a href="download-link3" class="download-btn col-6 mx-auto">Download</a>
        </div>
        <div class="card">
            <img src="../../assets/image/background.png" alt="Project Image 4" class="project-image">
            <h2 class="project-name">Project Name 4</h2>
            <p class="project-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime dolor autem perferendis voluptate obcaecati sequi sint sed accusantium accusamus possimus ratione, ea veritatis beatae! Laboriosam impedit nemo eius deserunt ut.</p>
            <a href="download-link4" class="download-btn col-6 mx-auto">Download</a>
        </div>
    </div>
</body>
</html>
