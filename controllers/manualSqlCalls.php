<?php
include '../models/users.php';
include '../models/student_ids.php';
include 'database.php';


$db = new Database();

$userModel = new Users($db);
$studentIds = new StudentIds($db);

$studentIds->create("aaque324343");

// $user = $userModel->create('alan', 'alan', 'alan@gmail.com','admin');




