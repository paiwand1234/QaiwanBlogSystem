<?php
include '../models/users.php';
include '../models/student_ids.php';
include './database.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new Database();

$userModel = new Users($db);
$studentIds = new StudentIds($db);

// $studentIds->create("aaque324343");

$hashed_password = password_hash("alan", PASSWORD_DEFAULT);

$user = $userModel->create('alana', $hashed_password, 'alana@gmail.com','admin', 2);




