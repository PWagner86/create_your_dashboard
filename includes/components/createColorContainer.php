<?php

function createColorContainer($color, $number){

    $container = "<div class='color-pick'>";
    $container .= "<div style='border-color: $color;' class='color-container cc$number'>";
    $container .= "<div class='color-1'></div>";
    $container .= "<div class='color-2'></div>";
    $container .= "<div class='color-3'></div>";
    $container .= "<div class='color-4'></div>";
    $container .= "</div>";
    $container .= "<label class='select-btn-wrapper'>";
    $container .= "<input class='color-select select-btn' type='radio' name='color-select' value='$number'>";
    $container .= "<i class='fas fa-power-off'></i>";
    $container .= "</label>";
    $container .= "</div>";

    return $container;
}

?>