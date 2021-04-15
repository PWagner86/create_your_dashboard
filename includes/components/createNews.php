<?php

// Funktion um News zu kreieren.
function createNews($color2, $color4){

    $output = "<h6 style='color: $color2;' class='news-title'>Service ist momentan nicht verfügbar.</h6>";
    $output .= "<div class='article-wrapper'>";
    $output .= "<img class='news-pic' src='../pics/image-not-found.jpg' alt='Bild zum Artikel'>";
    $output .= "<a style='color: $color4;' class='news-article' href='' target='_blank'></a>";
    $output .= "</div>";

    return $output;

}

?>