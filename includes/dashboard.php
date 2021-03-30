<?php
session_start();
require('./classes/Crud.class.php');
require('./helper/colorPicker.php');
if(isset($_SESSION['status']) && $_SESSION['status'] == "Loged in"){
    // echo $_SESSION['status'];
    // echo $_SESSION['ID'];
    // echo $_SESSION['user'];
    // echo $_SESSION['avatar'];
    $username = $_SESSION['user'];
    $avatar = $_SESSION['avatar'];
}else{
    header("location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../style/mainBack.css">
    <script src="../js/mainBack.js" type="module"></script>
</head>
<body style="background: <?=$color1?>;">

    <!-- Dashboard Titel und Btn für Navigation -->
    <header  class="reg-header main-header">
        <i style="color: <?=$color4?>; border-color: <?=$color3?>;" class="fas fa-angle-double-down nav-btn"></i>
        <h3 style="color: <?=$color4?>;">Willkommen <span style="color: <?=$color3?>; text-shadow: 0 0 50px <?=$color2?>;"><br><?=$username?></span></h1>
    </header>

    <!-- Navigation -->
    <nav style="background: <?=$color2?>;"  class="dash-nav">
        <ul>
            <li style="color: <?=$color4?>;"><a href="./logout.php">Logout</a></li>
            <li style="color: <?=$color4?>;">Anpassen</li>
            <li style="color: <?=$color4?>;">Hilfe</li>
        </ul>
    </nav>

    <!-- Dashboard-Kontainer -->
    <article class="dashboard-wrapper">
        <!-- Uhr -->
        <div class="clock-wrapper content">
            <div style="border-color: <?=$color3?>; box-shadow: 0 0 20px <?=$color2?>" class="outer-clock">
                <div style="border-color: <?=$color3?>;" class="middle-clock">
                    <div style="border-color: <?=$color2?>;" class="inner-clock">
                        <p style="color: <?=$color4?>;" class="clock-day"></p>
                        <p style="color: <?=$color4?>;" class="clock-date"></p>
                        <p style="color: <?=$color4?>;" class="clock-time"></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wetter -->
        <div class="weather-wrapper content">
            <div style="border-color: <?=$color3?>; box-shadow: 0 0 20px <?=$color2?>" class="outer-weather">
                <div style="border-color: <?=$color2?>;" class="inner-weather">
                    <p style="color: <?=$color4?>;" class="city">Winterthur</p>
                    <p style="color: <?=$color4?>;" class="degree">25°C</p>
                    <img class="weather-icon" src="" alt="">
                </div>
            </div>
        </div> 
        <!-- News -->
        <div class="news-wrapper content"></div>
        <!-- Avatar -->
        <div class="avatar-wrapper content"></div>
    </article>




    
    
</body>
</html>