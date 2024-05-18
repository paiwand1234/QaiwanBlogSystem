<?php

$image_dir = "uploads/projects/images/";
$file_dir = "uploads/projects/files/";
$allowed_image = array('jpg', 'jpeg', 'png'); // Allowed file types
$allowed_file= array('pdf', 'docx', 'doc'); // Allowed file types



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username_or_email = filter_input(INPUT_POST, 'project_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'date');


    // Check if a file was uploaded without errors
    if (isset($_FILES['file']) && isset($_FILES['image']) && $_FILES['file']['error'] == 0&& $_FILES['image']['error'] == 0) {

        $image_name = $_FILES['image']['name'];
        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];
        
        $file_name = $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];

        // Verify the file extension
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, array_flip($allowed_file))) {
            die("Error: Please select a valid file format.");
        }

        // Verify the file extension
        $ext = pathinfo($image_name, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, array_flip($allowed_image))) {
            die("Error: Please select a valid image format.");
        }


        // Verify the file size - 8MB maximum
        $maxsize = 8 * 1024 * 1024;
        if ($file_size > $maxsize) {
            die("Error: File size is larger than the allowed limit.");
        }
        
        // Verify the image size - 50MB maximum
        $maxsize = 50 * 1024 * 1024;
        if ($image_size > $maxsize) {
            die("Error: File size is larger than the allowed limit.");
        }

        // Verify MIME type
        if (in_array($file_type, array('application/pdf', 'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'))) {
            // Check whether file exists before uploading it
            if (file_exists("upload/" . $file_name)) {
                echo $file_name . " already exists.";
            } else {
                move_uploaded_file($_FILES['file']['tmp_name'], ($file_dir . $file_name));
                echo "Your file was uploaded successfully.";
            } 
        } else {
            die("Error: There was a problem uploading your file. Please try again.");
        }

        // Verify MIME type
        if (in_array($image_type, array('image/jpg', 'image/jpeg', 'image/png'))){

            // Check whether file exists before uploading it
            if (file_exists("upload/" . $image_name)) {
                echo $image_name . " already exists.";
            } else {
                move_uploaded_file($_FILES['file']['tmp_name'], ($image_dir . $image_name));
                echo "Your file was uploaded successfully.";
            } 

        }else{

        }


    } else {
        die("Error: " . $_FILES['file']['error']);
    }
}