<?php


$db = new Database();


$userModel = new Users($db);

$user = $userModel->create('alan', );


