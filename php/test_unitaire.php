<?php
require_once 'Database.php';

// Créer une instance de la classe
$db = new Database('localhost', 'phpmyadmin', 'root', 'Distri_Baguette');

// Insérer des données dans la table "Boulangerie"
$data = array(
    'nom' => 'Toe',
    'rue' => 'John',
    'ville' => 'La Rochelle',
    'code_postal' => '17000',
    'user' => 'Doe',
    'password' => 'DoeJ17',
    'email' => 'john.doe@example.com',
);
$db->insert_boulangerie($data);

// Insérer des données dans la table "Distributeur"
$data = array(
    'nom' => 'Distri CGR',
    'f_boulangerie' => 3,
    'max_stock' => 65,
    'prix' => 1.1,
    'longitude' => '46.14723326861701',
    'latitude' => '-1.1536701388292216',
    'seuil_de_declenchement' => 5,
    'siefox_id' => 25,
);
$db->insert_distributeur($data);

// Insérer des données dans la table "Mesure"
$data = array(
    'f_distributeur' => 3,
    'etat' => 1,
    'stock_live' => 20,
    'hygrométrie' => 80,
    'temperature' => 14,
    'horodatage' => '2023-05-11 08:43:35',
);
$db->insert_mesure($data);

// Mettre à jour des données dans la table "Boulangerie"
$data = array(
    'user' => 'Doe123',
);
$db->update_boulangerie($data, Doe);

// Mettre à jour des données dans la table "Distributeur"
$data = array(
    'seuil_de_declenchement' => 4,
);
$db->update_distributeur($data, 'Distri Mairie');

// Mettre à jour des données dans la table "Mesure"
$data = array(
    'temperature' => 16,
);
$db->update_distributeur($data, 1);

// Récupérer des données dans la table "Boulangerie"
$db->select_boulangerie();

// Récupérer des données dans la table "Distributeur"
$db->select_distributeur();

// // Récupérer des données dans la table "Mesure"
$db->select_mesure();
?>
