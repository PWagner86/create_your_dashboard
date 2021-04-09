<?php

// Funktion um News zu kreieren.
function createNews($color2, $color4){

    $output = "<h6 style='color: $color2;' class='news-title'>Test</h6>";
    $output .= "<div class='article-wrapper'>";
    $output .= "<img class='news-pic' src='' alt='Bild zum Artikel'>";
    $output .= "<a style='color: $color4;' class='news-article' href='' target='_blank'></a>";
    $output .= "</div>";

    return $output;

}

?>