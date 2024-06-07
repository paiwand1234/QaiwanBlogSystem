<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include "../../../models/users.php";
include "../../../models/projects.php"; // Assuming you have this file
include "../../../models/project_contents.php"; // Assuming you have this file
include "../../database.php"; // Assuming you have this file
include "../../utils/utils.php";

session_start();

$image_dir = "../../uploads/projects/images/";
$file_dir = "../../uploads/projects/files/";



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {

    $user_id = $_SESSION['user_id'];
    $project_id = filter_input(INPUT_POST, 'project_id', FILTER_SANITIZE_SPECIAL_CHARS);

    $db = new Database();
    $pdo = $db->pdo;
    $projects = new Projects($db);
    $project_contents = new ProjectContent($db);

    $pdo->beginTransaction();
    // Ensure autocommit is off
    $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);

    try{

        $project_content = $project_contents->readOneColumn("project_id", $project_id);
        $project_delete_array = array();

        foreach ($project_content as $index_0 => $content){
            echo $content['file_name'];
            if (handle_file_delete("../".$content['file_dir'] . $content['file_name'])) {
                echo "\nFile Deleted successfully\n";
                $project_delete_array[$index_0] = true;
            } else {
                $project_delete_array[$index_0] = false;
                throw new Exception("Failed to delete the file.");
            }
        }

        // Check if all values in $project_delete_array are true
        if (!in_array(false, $project_delete_array, true)) {
            echo "All files were deleted successfully.";
            $result = $projects->delete($project_id);
        } else {
            echo "Some files failed to delete.";
            throw new Exception("Failed to delete of the files.");
        }


        $pdo->commit();
        echo "\nTransaction committed successfully\n";
        $success = "Transaction was successful!";
        // header("Location: ../../../views/head/project.php?success=".$success);
    }catch(PDOException $e){
        $error = $e->getMessage();
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
            $error = "Transaction rolled back due to PDOException". $e->getMessage();
        }    
        // header("Location: ../../../views/head/project.php?error=".$error);
    }catch(Exception $e){
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
            echo "Transaction rolled back due to Exception\n";
        }
        $error = "Transaction failed: " . $e->getMessage();
        // header("Location: ../../../views/head/project.php?error=".$error);
    } finally{
        $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
        echo "Autocommit re-enabled\n";
        // header("Location: ../../../views/head/project.php?");
    }



} else {
    $error = "Error: Invalid request method or user not authenticated.";
    header("Location: ../../../views/head/project.php?error=".$error);
    
}
