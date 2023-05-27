<?php
// Fonction pour établir la connexion à la base de données
function connect_to_database() {
    $host = "172.20.233.50";
    $username = "phpmyadmin";
    $password = "root";
    $database = "Distri_Baguette";

    $conn = mysqli_connect($host, $username, $password, $database);

    // Vérifiez si la connexion a réussi
    if (!$conn) {
        die("Connexion à la base de données échouée: " . mysqli_connect_error());
    }

    return $conn;
}

// Fonction pour insérer des données dans la base de données
function insert_data($table, $data) {
    $conn = connect_to_database();

    // Construire la requête SQL
    $fields = implode(',', array_keys($data));
    $values = "'" . implode("','", array_values($data)) . "'";
    $sql = "INSERT INTO $table ($fields) VALUES ($values)";

    // Exécutez la requête SQL
    if (mysqli_query($conn, $sql)) {
        echo "Les données ont été ajoutées avec succès";
    } else {
        echo "Erreur lors de l'ajout de données: " . mysqli_error($conn);
    }

    // Fermez la connexion à la base de données
    mysqli_close($conn);
}

// Fonction pour mettre à jour des données dans la base de données
function update_data($table, $data, $id) {
    $conn = connect_to_database();

    // Construire la requête SQL
    $fields = "";
    foreach ($data as $key => $value) {
        $fields .= $key . "='" . $value . "',";
    }
}

// Fonction pour récupérer des données à partir de la base de données
function get_data($table, $conditions = array(), $fields) {
    $conn = connect_to_database();

    // Construire la requête SQL
    $sql = "SELECT $fields FROM $table";

    if(!empty($conditions)) {
        $sql .= " WHERE ";
        foreach($conditions as $key => $value) {
            $sql .= "$key = '$value' AND ";
        }
        $sql = rtrim($sql, " AND ");
    }

    // Exécutez la requête SQL
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    } else {
        return false;
    }

    // Fermez la connexion à la base de données
    mysqli_close($conn);
}

// Fonction pour supprimer des données à partir de la base de données
function delete_data($table, $conditions = array()) {
    $conn = connect_to_database();

    // Construire la requête SQL
    $sql = "DELETE FROM $table";

    if(!empty($conditions)) {
        $sql .= " WHERE ";
        foreach($conditions as $key => $value) {
            $sql .= "$key = '$value' AND ";
        }
        $sql = rtrim($sql, " AND ");
    }

    // Exécutez la requête SQL
    if (mysqli_query($conn, $sql)) {
        echo "Les données ont été supprimées avec succès";
    } else {
        echo "Erreur lors de la suppression de données: " . mysqli_error($conn);
    }

    // Fermez la connexion à la base de données
    mysqli_close($conn);
}

?>