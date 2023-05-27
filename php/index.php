<?php
// Paramètres de connexion à la base de données
$host = "172.20.233.50"; // l'adresse IP du serveur de base de données
$dbname = "Distri_Baguette";
$username = "phpmyadmin";
$password = "root";

// Connexion à la base de données
try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion à la base de données réussie";
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>