<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include './../constants.php';

$db_name = 'mysql:host=localhost;dbname=blog_db';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

$stmt = $conn->prepare("SELECT Distinct  * FROM `".TABLE_REF_ACCUEIL."`  ORDER BY id DESC limit 1");
$stmt->execute();
$images_texts = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($images_texts);