<?php
session_start();

if (!isset($_SESSION['user']))
{
    header("Location: /API/index.php");
    exit();
}

include 'valeur.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stations - Suivi Météo E3D</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/CSS/station.css">
    <link rel="icon" type="logo" href="/Images/Logo Lacordeille.png">
    <meta http-equiv="refresh" content="10">
</head>

<body>

<header class="barre-nav">
    <div class="conteneur-nav">

        <div class="cote-nav cote-gauche">
            <img src="/Images/Logo E3D.png" alt="Logo E3D" class="logo">
            <div class="texte-marque">
                <span class="ecole">EXTERNAT SAINT-JOSEPH</span>
                <span class="titre">Suivi Météo E3D</span>
            </div>
        </div>

        <nav class="centre-nav">
            <a href="/API/accueil.php">Accueil</a>
            <a href="/API/station.php" class="actif">Stations</a>
            <a href="/API/alertes.php">Alertes</a>
            <a href="/API/statistiques.php">Statistiques</a>
            <a href="/API/historique.php">Historique</a>
            <a href="/API/apropos.php">À propos</a>
        </nav>

        <div class="cote-nav cote-droit">
            <div class="bouton-utilisateur" id="userBtn">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="menu-compte" id="btncompte">
                <a href="/API/logout.php">Déconnexion</a>
            </div>
        </div>

    </div>
</header>

<main class="contenu-principal">

    <?php foreach ($stations as $station): ?>
        <section class="station">
            <h2 class="titre-station">Station - <?= $station['nom'] ?></h2>

            <div class="carte-hero">
                <div class="info-hero">
                    <h1>Conditions Actuelles</h1>
                    <p class="horodatage">
                        <i class="fa-regular fa-clock"></i>
                        Relevé à <strong><?= $station['date_mesure'] ?></strong>
                    </p>
                </div>

                <div class="affichage-hero">
                    <i class="fa-solid fa-sun icone-meteo"></i>
                    <span class="valeur-temp"><?= $station['temperature'] ?>°C</span>
                </div>
            </div>

            <div class="grille-stats">
                <div class="carte accent-bleu">
                    <i class="fa-solid fa-droplet"></i>
                    <h3>Humidité</h3>
                    <p class="valeur"><?= $station['humidite'] ?> %</p>
                </div>

                <div class="carte accent-bleu">
                    <i class="fa-solid fa-wind"></i>
                    <h3>Vent</h3>
                    <p class="valeur"><?= $station['vent'] ?> km/h</p>
                </div>

                <div class="carte accent-bleu">
                    <i class="fa-solid fa-gauge-high"></i>
                    <h3>Pluviométrie</h3>
                    <p class="valeur"><?= $station['pluie'] ?> mm</p>
                </div>
            </div>
        </section>
    <?php endforeach; ?>

</main>

<footer class="pied-page">
    Externat Saint-Joseph - La Cordeille © 2026
</footer>

<script src="/JS/main.js"></script>

</body>
</html>
