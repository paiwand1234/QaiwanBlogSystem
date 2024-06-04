<?php

include "../../database.php"; // Assuming you have this file
include "../../utils/utils.php";
include "../../../models/club_heads.php";
include "../../../models/users.php";


// error_reporting(E_ALL);
// ini_set('display_errors', 1);

session_start();

$user_id = $_SESSION['user_id'];
$club_id = filter_input(INPUT_POST, 'club_id', FILTER_SANITIZE_SPECIAL_CHARS);
$head_id = filter_input(INPUT_POST, 'head_id', FILTER_SANITIZE_SPECIAL_CHARS);
$head_exists = filter_input(INPUT_POST, 'head_exists', FILTER_SANITIZE_SPECIAL_CHARS);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($user_id)){
    
    if($head_exists == "1"){

        try{

            $db = new Database();
            $club_head = new ClubHeads($db);
            $users = new Users($db); 

            $club_head->create($club_id, $head_id);
            $success = "Head added successfuly";
            header("Location: ../../../views/admin/clubs.php?success=" . urlencode($success));
            exit();

        }catch(Exception $e){
            $error = "Head creation failed: " . $e->getMessage();
            header("Location: ../../../views/admin/clubs.php?error=" . urlencode($error));
            exit();
        }

    }else{
        $error = "Head creation failed: User doesn't exist" ;
        header("Location: ../../../views/admin/clubs.php?error=" . urlencode($error));
        exit();
    }

}