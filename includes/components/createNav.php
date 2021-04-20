<?php

// Funktion um Navigation zu kreieren.
function createNav($color2, $color3, $color4){

    $output = "<nav style='background: $color2;'  class='dash-nav'>";
    $output .= "<ul>";
    $output .= "<li class='logout'><a style='color: $color4;' href='./logout.php'>Logout</a></li>";
    $output .= "<li style='color: $color4;' class='color-btn'>Farbschema<li>";
    $output .= "<li style='color: $color4;' class='weather-effect-btn'>Wettereffekte ausschalten<li>";
    $output .= "<li style='color: $color4;' class='edit-wrapper'>Position wählen:";
    $output .= "<form action='./dashboard.php' method='POST'>";
    $output .= "<label for='clock'>";
    $output .= "Uhr:";
    $output .= "<select style='background: $color3;' name='clock'>";
    $output .= "<option value='first'>Position eingeben</option>";
    $output .= "<option value='first'>Oben links</option>";
    $output .= "<option value='second'>Oben rechts</option>";
    $output .= "<option value='third'>Unten links</option>";
    $output .= "<option value='fourth'>Unten rechts</option>";
    $output .= "<option value='noshow'>Ausblenden</option>";
    $output .= "</select>";
    $output .= "</label>";
    $output .= "<label for='weather'>";
    $output .= "Wetter:";
    $output .= "<select style='background: $color3;' name='weather'>";
    $output .= "<option value='second'>Position eingeben</option>";
    $output .= "<option value='first'>Oben links</option>";
    $output .= "<option value='second'>Oben rechts</option>";
    $output .= "<option value='third'>Unten links</option>";
    $output .= "<option value='fourth'>Unten rechts</option>";
    $output .= "<option value='noshow'>Ausblenden</option>";
    $output .= "</select>";
    $output .= "</label>";
    $output .= "<label for='news'>";
    $output .= "News:";
    $output .= "<select style='background: $color3;' name='news'>";
    $output .= "<option value='third'>Position eingeben</option>";
    $output .= "<option value='first'>Oben links</option>";
    $output .= "<option value='second'>Oben rechts</option>";
    $output .= "<option value='third'>Unten links</option>";
    $output .= "<option value='fourth'>Unten rechts</option>";
    $output .= "<option value='noshow'>Ausblenden</option>";
    $output .= "</select>";
    $output .= "</label>";
    $output .= "<label for='avatar'>";
    $output .= "Avatar:";
    $output .= "<select style='background: $color3;' name='avatar'>";
    $output .= "<option value='fourth'>Position eingeben</option>";
    $output .= "<option value='first'>Oben links</option>";
    $output .= "<option value='second'>Oben rechts</option>";
    $output .= "<option value='third'>Unten links</option>";
    $output .= "<option value='fourth'>Unten rechts</option>";
    $output .= "<option value='noshow'>Ausblenden</option>";
    $output .= "</select>";
    $output .= "</label>";
    $output .= "<input style='color: $color2; background: $color3' type='submit' value='Übernehmen' name='edit-btn'>";
    $output .= "</form>";
    $output .= "</li>";
    $output .= "<li style='color: $color4;' class='city-btn'>";
    $output .= "<form action='./dashboard.php' method='POST'>";
    $output .= "<label for='city'>";
    $output .= "Stadt eingeben:";
    $output .= "<input style='color: $color4; border-color: $color3;' class='city-input' type='text' name='city'>";
    $output .= "<input style='color: $color2; background: $color3' type='submit' value='Eingabe' name='city-btn'>";
    $output .= "</label>";
    $output .= "</form>";
    $output .= "</li>";
    $output .= "</ul>";
    $output .= "</nav>";

    return $output;
}

?>