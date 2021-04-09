<?php
session_start();
require('./classes/Crud.class.php');
require('./helper/colorPicker.php');
require('./prefs/credentials.php');
require('./components/createColorContainer.php');
require('./components/createMetaTags.php');
// CRUD Validierungsklasse instanzieren
$crudInstance = new Crud($host, $user, $passwd, $dbname);

if(isset($_SESSION['status']) && $_SESSION['status'] == "Loged in"){
    // echo $_SESSION['status'];
    // echo $_SESSION['ID'];
    $state = $crudInstance -> getSingleRecord($_SESSION['ID']);
    $username = $state['benutzername'];
    $avatar = $state['avatar'];
    $city = $state['city'];
}else{
    header("location: ../index.php");
}

if(isset($_POST['pick-color'])){
    $colorSchema = $_POST['color-select'];
    if(isset($colorSchema)){
        $crudInstance -> updateColorMethod($colorSchema, $_SESSION['ID']);
        $_SESSION['color'] = $colorSchema;
        header("location: ./dashboard.php");
    }
}

// Standort für Wetter auswählen
if(isset($_POST['city-btn'])){
    $cityInput = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    if(isset($cityInput)){
        $crudInstance -> updateCity($cityInput, $_SESSION['ID']);
        header("location: ./dashboard.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Hier werden die Metatags und Stylelinks geladen -->
    <?=createMetaTags("Dashboard", "../css/mainBack.css")?>
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
            <li class="logout"><a style="color: <?=$color4?>;" href="./logout.php">Logout</a></li>
            <li style="color: <?=$color4?>;" class="color-btn">Farbschema</li>
            <li style="color: <?=$color4?>;" class="city-btn">
                <form action="" method="POST">
                    <label for="city">
                        Stadt eingeben:
                        <input style="color: <?=$color4?>; border-color: <?=$color3?>;" class="city-input" type="text" name="city">
                        <input style="color: <?=$color4?>; border-color: <?=$color3?>; background: <?=$color2?>" type="submit" value="Eingabe" name="city-btn">
                    </label>
                </form>
            </li>
            <li style="color: <?=$color4?>;">Hilfe</li>
        </ul>
    </nav>

    <!-- Formular um Dashboard anzupassen -->
    <div class="color-form-wrapper">
        <form style="border-color: <?=$color3?>; background: <?=$color1?>" class="color-form" action="./dashboard.php" method="POST">
            <h3 style="color: <?=$color4?>;" class="color-title">Farbschema anpassen</h3>
            <div class="color-wrapper">
            <!-- Um Platz zu sparen wir hier eine Funktion eingebaut, welche die Komponenten hinein läd. -->
                <?=createColorContainer($color3, 1)?>
                <?=createColorContainer($color3, 2)?>
                <?=createColorContainer($color3, 3)?>
                <?=createColorContainer($color3, 4)?>
                <?=createColorContainer($color3, 5)?>
                <?=createColorContainer($color3, 6)?>
                <?=createColorContainer($color3, 7)?>
                <?=createColorContainer($color3, 8)?>
                <?=createColorContainer($color3, 9)?>
                <?=createColorContainer($color3, 10)?>
            </div>
            <input style="border-color: <?=$color3?>; background: <?=$color1?>; color: <?=$color4?>" class="pick-color" type="submit" value="Übernehmen" name="pick-color">
        </form>
    </div>

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
            <p style="color: <?=$color4?>;" class="city"><?=$city?></p>
            <img class="weather-icon" src="" alt="Wetter-Icon">
            <p style="color: <?=$color4?>;" class="degree">25°C</p>
        </div> 
        <!-- News -->
        <div class="news-wrapper content">
            <h6 style="color: <?=$color2?>;" class="news-title">Test</h6>
            <div class="article-wrapper">
                <img class="news-pic" src="" alt="Bild zum Artikel">
                <a style="color: <?=$color4?>;" class="news-article" href="" target="_blank"></a>
            </div>
        </div>
        <!-- Avatar -->
        <div class="avatar-wrapper content">
            <img class="avatar" src="https://avatars.dicebear.com/api/<?=$avatar?>/<?=$username?>.svg" alt="Dein gewählter Avatar">
        </div>
    </article>

</body>
</html>