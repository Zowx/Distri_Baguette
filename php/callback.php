<?php
require_once 'Database.php';

function getQueryParams() {
    $queryParams = array();
    
    $allowedParams = array('id', 'f_distributeur', 'état', 'stock_live', 'hygrométrie', 'température', 'horodatage');
    
    if (!empty($_GET)) {
        foreach ($_GET as $key => $value) {
            if (in_array($key, $allowedParams)) {
                $queryParams[$key] = htmlspecialchars($value);
            }
        }
    }
    
    return $queryParams;
}

// Récupérer les informations de la requête GET
$data = getQueryParams();

// Créer une instance de la classe
$db = new Database('localhost', 'id18497221_zowx', 'Z0wx@754', 'id18497221_distri_baguette');

// Insérer des données dans la table "Mesure"
$db->insert_mesure($data);

?>