<?php
session_start();

if (!isset($_SESSION['user']))
{
    header("Location: /API/index.php");
    exit();
}

include 'alertes-API.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alertes - Suivi Météo E3D</title>
    <meta http-equiv="refresh" content="10">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/CSS/alertes.css">
    <link rel="icon" type="logo" href="/Images/Logo Lacordeille.png">
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
            <a href="/API/station.php">Stations</a>
            <a href="/API/alertes.php" class="actif">Alertes</a>
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

    <section class="section-alertes">

        <h2>Alertes</h2>

        <?php if ($result->num_rows > 0): ?>

            <?php while ($alerte = $result->fetch_assoc()): ?>

                <?php
                $icone = "fa-triangle-exclamation";

                if ($alerte['capteur_alerte'] == "temperature") {
                    $icone = "fa-temperature-high";
                } elseif ($alerte['capteur_alerte'] == "vent") {
                    $icone = "fa-wind";
                } elseif ($alerte['capteur_alerte'] == "pluie") {
                    $icone = "fa-cloud-rain";
                }
                elseif ($alerte['capteur_alerte'] == "humidite") {
                    $icone = "fa-gauge-high";
                }
                ?>

                <div class="alerte">
                    <i class="fa-solid <?= $icone ?>"></i>
                    <?= $alerte['nom'] ?> :
                    <?= $alerte['capteur_alerte'] ?> = <?= $alerte['valeur'] ?>
                </div>

            <?php endwhile; ?>

        <?php else: ?>

            <div class="no-alerte">
                <i class="fa-solid fa-circle-check"></i>
                Aucune alerte pour le moment
            </div>

        <?php endif; ?>

    </section>

</main>

<footer class="pied-page">
    Externat Saint-Joseph - La Cordeille © 2026
</footer>

<script src="/JS/main.js"></script>

</body>
</html>
