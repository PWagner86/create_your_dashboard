<?php

// Funktion um Navigation zu kreieren.
function createNav($color2, $color3, $color4){

    $output = "<nav style='background: $color2;'  class='dash-nav'>";
    $output .= "<ul>";
    $output .= "<li class='logout'><a style='color: $color4;' href='./logout.php'>Logout</a></li>";
    $output .= "<li style='color: $color4;' class='color-btn'>Farbschema<li>";
    $output .= "<li style='color: $color4;' class='city-btn'>";
    $output .= "<form action='./dashboard.php' method='POST'>";
    $output .= "<label for='city'>";
    $output .= "Stadt eingeben:";
    $output .= "<input style='color: $color4; border-color: $color3;' class='city-input' type='text' name='city'>";
    $output .= "<input style='color: $color2; background: $color3' type='submit' value='Eingabe' name='city-btn'>";
    $output .= "</label>";
    $output .= "</form>";
    $output .= "</li>";
    $output .= "<li style='color: $color4;'>Hilfe</li>";
    $output .= "</ul>";
    $output .= "</nav>";

    return $output;
}

?>