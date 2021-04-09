<?php
if($_SESSION['status'] && $_SESSION['status'] == "Loged in"){

    $color1 = "";
    $color2 = "";
    $color3 = "";
    $color4 = "";


    if($_SESSION ['color'] == 1){
    
        $color1 = "#000000";
        $color2 = "#026873";
        $color3 = "#13F2DC";
        $color4 = "#ffffff";
    
    }elseif($_SESSION['color'] == 2){
    
        $color1 = "#010D00";
        $color2 = "#BFADA3";
        $color3 = "#BFAB49";
        $color4 = "#D9D7D7";
    
    }elseif($_SESSION['color'] == 3){
    
        $color1 = "#3726A6";
        $color2 = "#F20505";
        $color3 = "#F2BE22";
        $color4 = "#F2E635";
    
    }elseif($_SESSION['color'] == 4){
    
        $color1 = "#202426";
        $color2 = "#6C733D";
        $color3 = "#9DA65D";
        $color4 = "#8C8C88";
    
    }elseif($_SESSION['color'] == 5){
    
        $color1 = "#01260E";
        $color2 = "#04D9B2";
        $color3 = "#038C5A";
        $color4 = "#04BF68";
    
    }elseif($_SESSION['color'] == 6){
    
        $color1 = "#730217";
        $color2 = "#090B0D";
        $color3 = "#D94F30";
        $color4 = "#F2CB05";
    
    }elseif($_SESSION['color'] == 7){
    
        $color1 = "#73A2BF";
        $color2 = "#F2CAA7";
        $color3 = "#023059";
        $color4 = "#03588C";
    
    }elseif($_SESSION['color'] == 8){
    
        $color1 = "#D9D0C1";
        $color2 = "#D9A86C";
        $color3 = "#A65E44";
        $color4 = "#072A40";
    
    }elseif($_SESSION['color'] == 9){
    
        $color1 = "#0D0D0D";
        $color2 = "#2F4673";
        $color3 = "#A6A6A6";
        $color4 = "#D9D9D9";
    
    }elseif($_SESSION['color'] == 10){
    
        $color1 = "#26111F";
        $color2 = "#8C2E6B";
        $color3 = "#717343";
        $color4 = "#BFB47A";
    
    }

}


?>