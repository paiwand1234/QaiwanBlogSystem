<?php

include "../../database.php"; // Assuming you have this file
include "../../utils/utils.php";
include "../../../models/clubs.php";
include "../../../models/club_heads.php";


// error_reporting(E_ALL);
// ini_set('display_errors', 1);

session_start();

$user_id = $_SESSION['user_id'];
$club_id = filter_input(INPUT_POST, 'club_id', FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($user_id)){

    
}