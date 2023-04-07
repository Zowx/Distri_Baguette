<?php
session_start();
$servername = "localhost"; // Nom du serveur de la base de données
$username = "nom_utilisateur"; // Nom d'utilisateur de la base de données
$password = "mot_de_passe"; // Mot de passe de la base de données
$dbname = "nom_base_de_données"; // Nom de la base de données

// Vérification si le formulaire est soumis
if(isset($_POST['username']) && isset($_POST['password'])){
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Vérification du nom d'utilisateur et du mot de passe
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = md5($password); // Hashage du mot de passe

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // Vérification si le nom d'utilisateur et le mot de passe correspondent à un compte utilisateur
    if(mysqli_num_rows($result) == 1){
        $_SESSION['username'] = $username;
        header('Location: index.php'); // Redirection vers la page protégée
        exit();
    }else{
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }

    // Fermeture de la connexion
    mysqli_close($conn);
    ?>
