<?php

$url = "https://api.openweathermap.org/data/2.5/weather?q=Ollioules&appid=80f37c3756fbb7aae8b1c143c35e816d&units=metric&lang=fr";

$data = json_decode(file_get_contents($url), true);

?>