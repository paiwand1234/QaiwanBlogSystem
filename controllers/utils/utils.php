<?php
function handle_file_upload($file, $dir) {
    if (file_exists($dir . $file['name'])) {
        echo $file['name'] . " already exists.<br>";
        return false;
    }
    if (move_uploaded_file($file['tmp_name'], $dir . $file['name'])) {
        echo "Your " . $file['name'] . " was uploaded successfully.<br>";
        return true;
    } else {
        echo "Error uploading " . $file['name'] . ".<br>";
        return false;
    }
}