<?php

// Funktion für die Metatags
function createMetaTags($title, $cssLink){
    $output = "<meta charset='UTF-8'>";
    $output .= "<meta name='description' content='Costumize your dashboard the way you want'>";
    $output .= "<meta name='keywords' content='Dashboard, create, weather, avatar, news, clock'>";
    $output .= "<meta name='author' content='Peter Wagner'>";
    $output .= "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
    $output .= "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    $output .= "<title>$title</title>";
    $output .= "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>";
    $output .= "<link rel='stylesheet' href='$cssLink'>";

    return $output;
}

?>