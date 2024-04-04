<?php
include 'db_connect.php'; 
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([$username, $password]);

echo "Utilisateur inscrit avec succès.";
?>
