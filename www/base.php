<?php
$host = 'localhost'; 
$dbname = 'twitter_clone';
$username = 'votre_username';
$password = 'votre_mot_de_passe';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Impossible de se connecter à la base de données: " . $e->getMessage());
}
?>
