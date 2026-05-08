<?php

$connect = new mysqli("localhost", "meteo_user", "user", "meteo_e3d");

if ($connect->connect_error) {

    $nb = 0;

} else {

    $sql = "SELECT COUNT(*) as total
            FROM alerte
            WHERE alerte.date_alerte >= NOW() - INTERVAL 1 DAY
            AND alerte.date_alerte = (
                SELECT MAX(alerte2.date_alerte)
                FROM alerte AS alerte2
                WHERE alerte2.id_station = alerte.id_station
                AND alerte2.capteur_alerte = alerte.capteur_alerte
            )";

    $result = $connect->query($sql);

    $row = $result->fetch_assoc();
    $nb = $row['total'];

    $connect->close();
}
?>
