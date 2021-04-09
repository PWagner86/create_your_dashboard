<?php

// Funktion um Farbcontainer zu kreieren.
function createColorContainer($color, $number){

    $output = "<div class='color-pick'>";
    $output .= "<div style='border-color: $color;' class='color-container cc$number'>";
    $output .= "<div class='color-1'></div>";
    $output .= "<div class='color-2'></div>";
    $output .= "<div class='color-3'></div>";
    $output .= "<div class='color-4'></div>";
    $output .= "</div>";
    $output .= "<label class='select-btn-wrapper'>";
    $output .= "<input class='color-select select-btn' type='radio' name='color-select' value='$number'>";
    $output .= "<i class='fas fa-power-off'></i>";
    $output .= "</label>";
    $output .= "</div>";

    return $output;
}

?>