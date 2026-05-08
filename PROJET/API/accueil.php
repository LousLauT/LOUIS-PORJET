<?php
    session_start();

    if (!isset($_SESSION['user']))
    {
        header("Location: /API/index.php");
        exit();
    }

    include 'meteo.php';
    include 'API-alerte.php';
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi Météo E3D - La Cordeille</title>
    <meta http-equiv="refresh" content="10">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/CSS/accueil.css">
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
                <a href="/API/accueil.php" class="actif">Accueil</a>
                <a href="/API/station.php">Stations</a>
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

        <section class="section-hero">
            <div class="carte-hero">

                <div class="info-hero">
                    <h1>Conditions Actuelles - Ollioules</h1>
                    <p class="horodatage">
                        <i class="fa-regular fa-clock"></i>
                        Relevé à : <strong><?php echo date("H:i"); ?></strong>
                    </p>
                </div>

                <div class="affichage-hero">
                    <i class="fa-solid fa-sun icone-meteo"></i>

                    <span class="valeur-temp">
                        <?php echo $data['main']['temp']; ?>°C
                    </span>

                    <span class="label-meteo">
                        <?php echo strtoupper($data['weather'][0]['description']); ?>
                    </span>
                </div>

            </div>
        </section>

        <div class="grille-stats">

            <div class="carte accent-bleu">
                <i class="fa-solid fa-droplet"></i>
                <h3>Humidité</h3>

                <p class="valeur">
                    <?php echo $data['main']['humidity']; ?> %
                </p>
            </div>

            <div class="carte accent-bleu">
                <i class="fa-solid fa-wind"></i>
                <h3>Vent</h3>

                <p class="valeur">
                    <?php echo round($data['wind']['speed'] * 3.6); ?> km/h
                </p>
            </div>

            <div class="carte accent-bleu">
                <i class="fa-solid fa-gauge-high"></i>
                <h3>Précipitations</h3>

                <p class="valeur">
                    <?php echo $data['rain']['1h'] ?? 0; ?> mm
                </p>
            </div>

        </div>

        <section class="section-alertes">
            <h2><i class="fa-solid fa-tower-broadcast"></i> Alertes</h2>
            <div class="alertes-graphique">
                <p class="<?php echo ($nb > 0) ? 'alerte-danger' : 'alerte-ok'; ?>">
                    <?php echo ($nb > 0) ? "<strong>$nb</strong> alerte(s) en cours" : "Aucune alerte pour le moment"; ?>
                </p>
            </div>

            <div class="voir-alerte">
                <a href="/API/alertes.php">Voir les alertes</a>
            </div>

        </section>

    </main>

    <footer class="pied-page">
        Externat Saint-Joseph - La Cordeille © 2026
    </footer>

     <script src="/JS/main.js"></script>

</body>

</html>
