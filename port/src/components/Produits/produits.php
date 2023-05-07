<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include './../constants.php';

$db_name = 'mysql:host=localhost;dbname=blog_db';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

$page = $_GET['page'];
$per_page = $_GET['per_page'];
$offset = ($page - 1) * $per_page;

$stmt = $conn->prepare("SELECT Distinct * FROM `".TABLE_PROJECT."` where status='1' ORDER BY id  DESC LIMIT :offset, :per_page ");
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->bindParam(':per_page', $per_page, PDO::PARAM_INT);
$stmt->execute();
$images_texts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("SELECT COUNT(*) FROM `".TABLE_PROJECT."` where status='1'");
$stmt->execute();
$total_rows = $stmt->fetchColumn();
$total_pages = ceil($total_rows / $per_page);

echo json_encode(['images_texts' => $images_texts, 'total_pages' => $total_pages]);