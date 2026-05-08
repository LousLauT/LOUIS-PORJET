<?php

$host = "localhost";
$user = "meteo_user";
$pass = "user";
$dbname = "meteo_e3d";

$connect = new mysqli($host, $user, $pass, $dbname);

if ($connect->connect_error) {
    die("Erreur connexion");
}

$sql = "SELECT mesure.*, station.nom
        FROM mesure
        INNER JOIN station
        ON mesure.id_station = station.id_station
        WHERE mesure.date_mesure = (
            SELECT MAX(m2.date_mesure)
            FROM mesure m2
            WHERE m2.id_station = mesure.id_station
        )
        ORDER BY station.nom ASC";

$result = $connect->query($sql);

$stations = [];

while ($row = $result->fetch_assoc()) {
    $stations[] = $row;
}

?>
