<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="/CSS/index.css">
</head>

<body>

    <div class="Menu">

        <h1>Saisissez vos informations pour vous identifier</h1>

        <form id="loginForm">

            <div class="mail">
                
                <input type="text" id="login" name="login" placeholder="Identifiant" required>
            </div>

            <div class="mdp">
                <input type="password" id="password" name="password" placeholder="Mot de passe" required>
            </div>

            <div class="login">
                <button type="submit">Connexion</button>
            </div>

            <div class="create-compte">
                <p>Vous n'avez pas de compte ?</p>
                <p><u>Veuillez contacter l'administrateur</u></p>
            </div>

        </form>

    </div>

    <script src="/JS/login.js"></script>

</body>
</html>
