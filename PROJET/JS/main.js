document.addEventListener("DOMContentLoaded", () => {

    const btn = document.getElementById("userBtn");
    const menu = document.getElementById("btncompte");

    if (btn && menu) {
        btn.addEventListener("click", () => {
            menu.classList.toggle("active");
        });
    }

});

// MENU POUR METTRE A JOUR LES VALEURS SELON LA STATION CHOISI

const station = document.getElementById("station");

if (station) {
    station.addEventListener("change", function () {
        let val = station.value;

        // On récupère les éléments une seule fois pour plus de clarté
        const temp = document.getElementById("temperature");
        const meteo = document.getElementById("meteo");
        const hum = document.getElementById("humidite");
        const vent = document.getElementById("vent");
        const pluvo = document.getElementById("pluviometrie");
        const icone = document.getElementById("icone");

        if (val === "1") {
            temp.textContent = "15°C";
            meteo.textContent = "ENSOLEILLÉ";
            hum.textContent = "55 %";
            vent.textContent = "12 km/h";
            pluvo.textContent = "0 mm";
            icone.className = "fa-solid fa-sun icone-meteo icone-soleil";
        }

        if (val === "2") {
            temp.textContent = "10°C";
            meteo.textContent = "NUAGEUX";
            hum.textContent = "70 %";
            vent.textContent = "8 km/h";
            pluvo.textContent = "0.1 mm";
            icone.className = "fa-solid fa-cloud-sun icone-meteo icone-nuage";
        }

        if (val === "3") {
            temp.textContent = "8°C";
            meteo.textContent = "PLUIE";
            hum.textContent = "90 %";
            vent.textContent = "20 km/h";
            pluvo.textContent = "30 mm";
            icone.className = "fa-solid fa-cloud-showers-heavy icone-meteo icone-pluie";
        }
    });
}