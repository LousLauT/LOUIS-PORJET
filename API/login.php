<?php
    session_start();

    $host = "localhost";
    $user = "meteo_user";
    $pass = "user";
    $dbname = "meteo_e3d";

    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_error) 
        {
            die("Erreur connexion : " . $conn->connect_error);
        }

    $login = $_POST['login'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT motdepasse FROM utilisateur WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) 
        {
            $user = $result->fetch_assoc();

            if (hash('sha256', $password) === $user['motdepasse']) 
                {
                    $_SESSION['user'] = $login;
                    echo "success";
                } 

            else 
                {
                    echo "Mot de passe incorrect";
                }
        } 
    
    else 
        {
            echo "Identifiant incorrect";
        }

    $stmt->close();
    $conn->close();
?>
