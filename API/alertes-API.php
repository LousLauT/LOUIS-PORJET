<?php

$host = "localhost";
$user = "meteo_user";
$pass = "user";
$dbname = "meteo_e3d";

$connect = new mysqli($host, $user, $pass, $dbname);

if ($connect->connect_error) {
    die("Erreur connexion");
}

$sql = "SELECT alerte.*, station.nom
        FROM alerte
        INNER JOIN station 
        ON alerte.id_station = station.id_station
        WHERE alerte.date_alerte >= NOW() - INTERVAL 1 DAY
        AND alerte.date_alerte = (
            SELECT MAX(alerte2.date_alerte)
            FROM alerte AS alerte2
            WHERE alerte2.id_station = alerte.id_station
            AND alerte2.capteur_alerte = alerte.capteur_alerte
        )
        ORDER BY station.nom ASC, alerte.capteur_alerte ASC";

$result = $connect->query($sql);

?>
