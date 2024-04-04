<?php
session_start();
include 'db_connect.php';

$content = $_POST['content'];
$user_id = $_SESSION['user_id']; 

$sql = "INSERT INTO tweets (user_id, content) VALUES (?, ?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([$user_id, $content]);

echo "Tweet ajouté avec succès.";
?>
