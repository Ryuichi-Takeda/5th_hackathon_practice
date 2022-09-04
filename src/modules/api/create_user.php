<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

use cruds\User;

$crud = new User($db);

$username = $_GET['username'];
$age = $_GET['age'];

$result = $crud->create_user($username, $age);
echo json_encode($result, JSON_UNESCAPED_UNICODE);
