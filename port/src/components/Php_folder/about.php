<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include "./../constants.php";

$db_name = 'mysql:host=localhost;dbname=blog_db';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

$stm = $conn->prepare("SELECT * FROM `".TABLE_ABOUT."` ORDER BY id DESC limit 1");
$stm->execute();
$about = $stm->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($about);

