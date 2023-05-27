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
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    // Fonction pour inserer des données dans la table Boulangerie
    public function insert_boulangerie($data) {
        $fields = implode(',', array_keys($data));
        $values = "'" . implode("','", array_values($data)) . "'";
        $sql = "INSERT INTO Boulangerie ($fields) VALUES ($values)";


        if (mysqli_query($this->conn, $sql)) {
            echo "Data added successfully \n";
        } else {
            echo "\n Error adding data: " . mysqli_error($this->conn);
        }
    }

    // Fonction pour inserer des données dans la table Distributeur
    public function insert_distributeur($data) {
        $fields = implode(',', array_keys($data));
        $values = "'" . implode("','", array_values($data)) . "'";
        $sql = "INSERT INTO Distributeur ($fields) VALUES ($values)";

        if (mysqli_query($this->conn, $sql)) {
            echo "\n Data added successfully";
        } else {
            echo "\n Error adding data: " . mysqli_error($this->conn);
        }
    }

    // Fonction pour inserer des données dans la table Mesure
    public function insert_mesure($data) {
        $fields = implode(',', array_keys($data));
        $values = "'" . implode("','", array_values($data)) . "'";
        $sql = "INSERT INTO Mesure ($fields) VALUES ($values)";

        if (mysqli_query($this->conn, $sql)) {
            echo "\n Data added successfully";
        } else {
            echo "\n Error adding data: " . mysqli_error($this->conn);
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
            echo "\n Data updated successfully";
        } else {
            echo "\n Error updating data: " . mysqli_error($this->conn);
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
            echo "\n Data updated successfully";
        } else {
            echo "\n Error updating data: " . mysqli_error($this->conn);
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
            echo "\n Data updated successfully";
        } else {
            echo "\n Error updating data: " . mysqli_error($this->conn);
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
            echo "\n Data deleted successfully";
        } else {
            echo "\n Error deleting data: " . mysqli_error($this->conn);
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
            echo "\n Data deleted successfully";
        } else {
            echo "\n Error deleting data: " . mysqli_error($this->conn);
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
            echo "\n Data deleted successfully";
        } else {
            echo "\n Error deleting data: " . mysqli_error($this->conn);
        }
    }

    // Fonction pour supprimer la table Boulangerie
    public function delete_boulangerie_table() {
        $pdo = $this->connect();
        $sql = "DROP TABLE IF EXISTS Boulangerie;";
        $pdo->exec($sql);
        $pdo = null;
    }

    // Fonction pour supprimer la table Distributeur
    public function delete_distributeur_table() {
        $pdo = $this->connect();
        $sql = "DROP TABLE IF EXISTS Distributeur;";
        $pdo->exec($sql);
        $pdo = null;
    }

    // Fonction pour supprimer la table Mesure
    public function delete_mesure_table() {
        $pdo = $this->connect();
        $sql = "DROP TABLE IF EXISTS Mesure;";
        $pdo->exec($sql);
        $pdo = null;
    }

    // Fermez la connexion à la base de données
    public function __destruct() {
        mysqli_close($this->conn);
    }
}
?>
