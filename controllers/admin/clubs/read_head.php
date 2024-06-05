<?php

include "../../database.php"; // Assuming you have this file
include "../../../models/clubs.php";
include "../../../models/club_heads.php";
include "../../../models/users.php";

session_start();

// ENABLE ERROR REPORTING FOR DEBUGGING (REMOVE THIS IN PRODUCTION)
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


// SET THE HEADER TO RETURN JSON
header('Content-Type: application/json');

// GET THE RAW POST DATA
$json = file_get_contents('php://input');

// DECODE THE JSON DATA
$data = json_decode($json, true);

$user_id = $_SESSION['user_id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($user_id) && $data) {
    $name = $data['name'];
    try{
        $db = new Database();
        $users = new Users($db);
        $columns = array(
            'username' => $name,
            'role' => 'head'
        );

        $user = $users->readMultipleColumns($columns, Operators::AND);

        if ($user) {
            echo json_encode([
                'status' => 'success',
                'message' => "head exists",
                'data' => $user
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => "head doesn't exist"
            ]);
        }
    }catch(Exception $e){
        echo json_encode([
            'status' => 'error',
            'message' => 'Error: ' . $e->getMessage()
        ]);
    }
   
} else {
    echo json_encode([
        'status' => 'fail',
        'message' => "There was an error while reading the received data"
    ]);
}
