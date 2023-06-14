<?php
class Database {
    private $host = "localhost";
    private $username;
    private $password;
    private $database;
    private $conn;

    // établir la connexion à la base de données
    public function __construct($h, $u, $p, $d) {
        $this->host = $h;
        $this->username = $u;
        $this->password = $p;
        $this->database = $d;

        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        if (!$this->conn) {
            die("\n Connection failed: " . mysqli_connect_error());
        }
    }

    // Fonction pour inserer des données dans la table Boulangerie
    public function insert_boulangerie($data) {
        $fields = implode(',', array_keys($data));
        $values = "'" . implode("','", array_values($data)) . "'";
        $sql = "INSERT INTO Boulangerie ($fields) VALUES ($values)";


        if (mysqli_query($this->conn, $sql)) {
            echo "\n Boulangerie data added successfully";
        } else {
            echo "\n Error adding Boulangerie data: " . mysqli_error($this->conn);
        }
    }

    // Fonction pour inserer des données dans la table Distributeur
    public function insert_distributeur($data) {
        $fields = implode(',', array_keys($data));
        $values = "'" . implode("','", array_values($data)) . "'";
        $sql = "INSERT INTO Distributeur ($fields) VALUES ($values)";

        if (mysqli_query($this->conn, $sql)) {
            echo "\n Distributeur data added successfully";
        } else {
            echo "\n Error adding Distributeur data: " . mysqli_error($this->conn);
        }
    }

    // Fonction pour inserer des données dans la table Mesure
    public function insert_mesure($data) {
        $fields = implode(',', array_keys($data));
        $values = "'" . implode("','", array_values($data)) . "'";
        $sql = "INSERT INTO Mesure ($fields) VALUES ($values)";

        if (mysqli_query($this->conn, $sql)) {
            echo "\n Mesure data added successfully";
        } else {
            echo "\n Error adding Mesure data: " . mysqli_error($this->conn);
        }
    }

    // Fonction pour mettre à jour des données dans la table Boulangerie 
    public function update_boulangerie($data, $name) {
        $fields = "";
        foreach ($data as $key => $value) {
            $fields .= $key . "='" . $value . "',";
        }
        $fields = rtrim($fields, ',');
        $sql = "UPDATE Boulangerie SET $fields WHERE nom = $name";

        if (mysqli_query($this->conn, $sql)) {
            echo "\n Boulangerie data updated successfully";
        } else {
            echo "\n Error updating Boulangerie data: " . mysqli_error($this->conn);
        }
    }

    // Fonction pour mettre à jour des données dans la table Distributeur 
    public function update_distributeur($data, $name) {
        $fields = "";
        foreach ($data as $key => $value) {
            $fields .= $key . "='" . $value . "',";
        }
        $fields = rtrim($fields, ',');
        $sql = "UPDATE Distributeur SET $fields WHERE nom = $name";

        if (mysqli_query($this->conn, $sql)) {
            echo "\n Distributeur data updated successfully";
        } else {
            echo "\n Error updating Distributeur data: " . mysqli_error($this->conn);
        }
    }

    // Fonction pour mettre à jour des données dans la table Mesure 
    public function update_mesure($data, $id) {
        $fields = "";
        foreach ($data as $key => $value) {
            $fields .= $key . "='" . $value . "',";
        }
        $fields = rtrim($fields, ',');
        $sql = "UPDATE Mesure SET $fields WHERE id = $id";

        if (mysqli_query($this->conn, $sql)) {
            echo "\n Mesure data updated successfully";
        } else {
            echo "\n Error updating Mesure data: " . mysqli_error($this->conn);
        }
    }

    // Fonction pour récupérer des données à partir de la table Boulangerie
    public function select_boulangerie($fields = '*', $conditions = []) {
        $sql = "SELECT $fields FROM Boulangerie";

        if(!empty($conditions)) {
            $sql .= " WHERE ";
            foreach($conditions as $key => $value) {
                $sql .= "$key = '$value' AND ";
            }
            $sql = rtrim($sql, " AND ");
        }

        $result = mysqli_query($this->conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            $data = array();
            while($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }

    // Fonction pour récupérer des données à partir de la table Distributeur
    public function select_distributeur($fields = '*', $conditions = []) {
        $sql = "SELECT $fields FROM Distributeur";

        if(!empty($conditions)) {
            $sql .= " WHERE ";
            foreach($conditions as $key => $value) {
                $sql .= "$key = '$value' AND ";
            }
            $sql = rtrim($sql, " AND ");
        }

        $result = mysqli_query($this->conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            $data = array();
            while($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }

    // Fonction pour récupérer des données à partir de la table Mesure
    public function select_mesure($fields = '*', $conditions = []) {
        $sql = "SELECT $fields FROM Mesure";

        if(!empty($conditions)) {
            $sql .= " WHERE ";
            foreach($conditions as $key => $value) {
                $sql .= "$key = '$value' AND ";
            }
            $sql = rtrim($sql, " AND ");
        }

        $result = mysqli_query($this->conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            $data = array();
            while($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    
    // Fonction pour supprimer des données à partir de la table Boulangerie
    public function delete_boulangerie($conditions = []) {
        $sql = "DELETE FROM Boulangerie";

        if(!empty($conditions)) {
            $sql .= " WHERE ";
            foreach($conditions as $key => $value) {
                $sql .= "$key = '$value' AND ";
            }
            $sql = rtrim($sql, " AND ");
        }

        if (mysqli_query($this->conn, $sql)) {
            echo "\n Boulangerie data deleted successfully";
        } else {
            echo "\n Error deleting Boulangerie data: " . mysqli_error($this->conn);
        }
    }

    // Fonction pour supprimer des données à partir de la table Distributeur
    public function delete_distributeur($conditions = []) {
        $sql = "DELETE FROM Distributeur";

        if(!empty($conditions)) {
            $sql .= " WHERE ";
            foreach($conditions as $key => $value) {
                $sql .= "$key = '$value' AND ";
            }
            $sql = rtrim($sql, " AND ");
        }

        if (mysqli_query($this->conn, $sql)) {
            echo "\n Distributeur data deleted successfully";
        } else {
            echo "\n Error deleting Distributeur data: " . mysqli_error($this->conn);
        }
    }

    // Fonction pour supprimer des données à partir de la table Mesure
    public function delete_mesure($conditions = []) {
        $sql = "DELETE FROM Mesure";

        if(!empty($conditions)) {
            $sql .= " WHERE ";
            foreach($conditions as $key => $value) {
                $sql .= "$key = '$value' AND ";
            }
            $sql = rtrim($sql, " AND ");
        }

        if (mysqli_query($this->conn, $sql)) {
            echo "\n Mesure data deleted successfully";
        } else {
            echo "\n Error deleting Mesure data: " . mysqli_error($this->conn);
        }
    }

    // Fonction pour supprimer la table Boulangerie
    public function delete_boulangerie_table() {
        $sql = "DROP TABLE IF EXISTS Boulangerie;";
        if (mysqli_query($this->conn, $sql)) {
            echo "\n Boulangerie table deleted successfully";
        } else {
            echo "\n Error deleting Boulangerie table: " . mysqli_error($this->conn);
        }
    }

    // Fonction pour supprimer la table Distributeur
    public function delete_distributeur_table() {
        $sql = "DROP TABLE IF EXISTS Distributeur;";
        if (mysqli_query($this->conn, $sql)) {
            echo "\n Distributeur table deleted successfully";
        } else {
            echo "\n Error deleting Distributeur table: " . mysqli_error($this->conn);
        }
    }

    // Fonction pour supprimer la table Mesure
    public function delete_mesure_table() {
        $sql = "DROP TABLE IF EXISTS Mesure;";
        if (mysqli_query($this->conn, $sql)) {
            echo "\n Mesure table deleted successfully";
        } else {
            echo "\n Error deleting Mesure table: " . mysqli_error($this->conn);
        }
    }

    // Fermez la connexion à la base de données
    public function __destruct() {
        mysqli_close($this->conn);
    }
}
?>
