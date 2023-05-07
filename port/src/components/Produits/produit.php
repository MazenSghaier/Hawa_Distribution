<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include './../constants.php';

try {
    $db_name = 'mysql:host=localhost;dbname=blog_db';
    $user_name = 'root';
    $user_password = '';

    $conn = new PDO($db_name, $user_name, $user_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM `".TABLE_PROJECT."` WHERE id = :id  ");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $images_texts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($images_texts);
} catch (PDOException $e) {
    echo json_encode(array('error' => $e->getMessage()));
}