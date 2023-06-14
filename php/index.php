<?php
// Paramètres de connexion à la base de données
$host = "localhost"; // l'adresse IP du serveur de base de données ou localhost
$dbname = "id18497221_distri_baguette";
$username = "id18497221_zowx";
$password = "Z0wx@754";

// Connexion à la base de données
try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion à la base de données réussie";
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
