<?php

// Funktion um Uhr zu kreieren.
function createClock($color2, $color3, $color4){

    $output = "<div style='border-color: $color3; box-shadow: 0 0 20px $color2' class='outer-clock'>";
    $output .= "<div style='border-color: $color3;' class='middle-clock'>";
    $output .= "<div style='border-color: $color2;' class='inner-clock'>";
    $output .= "<p style='color: $color4;' class='clock-day'></p>";
    $output .= "<p style='color: $color4;' class='clock-date'></p>";
    $output .= "<p style='color: $color4;' class='clock-time'></p>";
    $output .= "</div>";
    $output .= "</div>";
    $output .= "</div>";

    return $output;
}

?>