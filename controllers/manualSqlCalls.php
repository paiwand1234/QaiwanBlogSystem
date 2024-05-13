<?php
include 'tables/users.php';
include 'database.php';


$db = new Database();

$userModel = new Users($db);

$user = $userModel->create('alan', 'alan', 'alan@gmail.com','admin');




