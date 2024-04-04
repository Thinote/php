<?php
session_start();
include 'db_connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    echo "Connexion réussie.";
} else {
    echo "Nom d'utilisateur ou mot de passe incorrect.";
}
?>
