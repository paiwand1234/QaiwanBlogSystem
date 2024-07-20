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
function handle_file_delete($dir, $file_name = null) {
    
    $file_name ? $file_path = $dir . $file_name : $file_path = $dir;

    // Check if the file exists
    if (file_exists($file_path)) {
        // Try to delete the file
        if (unlink($file_path)) {
            echo "The file " . $file_name . " was deleted successfully.<br>";
            return true;
        } else {
            echo "Error deleting " . $file_name . ".<br>";
            return false;
        }
    } else {
        echo "The file " . $file_name . " does not exist.<br>";
        return false;
    }
}

function handle_file_upload_with_name($file, $dir, $new_image_name) {
    if (file_exists($dir . $file['name'])) {
        echo $file['name'] . " already exists.<br>";
        return false;
    }
    if (move_uploaded_file($file['tmp_name'], $dir . $new_image_name)) {
        echo "Your " . $file['name'] . " was uploaded successfully.<br>";
        return true;
    } else {
        echo "Error uploading " . $file['name'] . ".<br>";
        return false;
    }
}

