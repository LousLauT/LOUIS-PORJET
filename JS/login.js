const form = document.getElementById("loginForm");

form.addEventListener("submit", function (e) {
    e.preventDefault();

    let login = document.getElementById("login").value;
    let password = document.getElementById("password").value;

    fetch("/API/login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `login=${login}&password=${password}`
    })
        .then(response => response.text())
        .then(data => {

            console.log("Réponse serveur :", data);

            if (data === "success") {
                window.location.href = "/API/accueil.php";
            } else {
                alert(data);
            }

        })
        .catch(error => {
            console.error("Erreur :", error);
        });
});