<?php

// Funktion um Wetteranzeige zu kreieren.
function createWeather($color4, $city){

    $output = "<p style='color: $color4;' class='city'>$city</p>";
    $output .= "<img class='weather-icon' src='../pics/weather404.jpg' alt='Wetter-Icon'>";
    $output .= "<p style='color: $color4;' class='degree'></p>";

    return $output;
}

?>