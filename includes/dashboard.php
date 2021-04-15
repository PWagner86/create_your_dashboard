<?php
session_start();
require('./classes/Crud.class.php');
require('./helper/colorPicker.php');
require('./prefs/credentials.php');
require('./components/createMetaTags.php');
require('./components/createNav.php');
require('./components/createColorContainer.php');
require('./components/createClock.php');
require('./components/createWeather.php');
require('./components/createNews.php');
// CRUD Validierungsklasse instanzieren
$crudInstance = new Crud($host, $user, $passwd, $dbname);

if(isset($_SESSION['status']) && $_SESSION['status'] == "Loged in"){
    // echo $_SESSION['status'];
    // echo $_SESSION['ID'];
    $state = $crudInstance -> getSingleRecord($_SESSION['ID']);
    $username = $state['benutzername'];
    $avatar = $state['avatar'];
    $city = $state['city'];
    $clockPos = $state['uhrPos'];
    $weatherPos = $state['wetterPos'];
    $newsPos = $state['newsPos'];
    $avatarPos = $state['avatarPos'];
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

// Anordnen
if(isset($_POST['edit-btn'])){
    if(isset($_POST['clock']) && isset($_POST['weather']) && isset($_POST['news']) && isset($_POST['avatar'])){
        $clockPosition = $_POST['clock'];
        $weatherPosition = $_POST['weather'];
        $newsPosition = $_POST['news'];
        $avatarPosition = $_POST['avatar'];

        $crudInstance -> updateClockPos($clockPosition, $_SESSION['ID']);
        $crudInstance -> updateWeatherPos($weatherPosition, $_SESSION['ID']);
        $crudInstance -> updateNewsPos($newsPosition, $_SESSION['ID']);
        $crudInstance -> updateAvatarPos($avatarPosition, $_SESSION['ID']);
        header("location: ./dashboard.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Hier werden die Metatags und Stylelinks geladen -->
    <?=createMetaTags("Dashboard", "../css/mainBack.css")?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/matter-js/0.15.0/matter.min.js" defer></script>
    <script src="../games/slingshot/slingshotGame.js" type="module"></script>
    <script src="../js/mainBack.js" type="module"></script>
</head>
<body style="background: <?=$color1?>;">

    <!-- Dashboard Titel und Btn für Navigation -->
    <header  class="reg-header main-header">
        <i style="color: <?=$color4?>; border-color: <?=$color3?>;" class="fas fa-angle-double-down nav-btn"></i>
        <h3 style="color: <?=$color4?>;">Willkommen <span style="color: <?=$color3?>; text-shadow: 0 0 50px <?=$color2?>;"><br><?=$username?></span></h1>
    </header>

    <!-- Navigation -->
    <?=createNav($color2, $color3, $color4)?>

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
    <!-- Slingshot Game -->
    <div class="slingshot-wrapper">
        <button class="close-slingshot"><i class="fas fa-times"></i></button>
        <p class="counter"></p>
        <button class="restart-slingshot">Neustart</button>
    </div>

    <!-- Dashboard-Kontainer -->
    <article class="dashboard-wrapper">
        <!-- Uhr -->
        <div class="<?=$clockPos?> clock-wrapper content">
            <?=createClock($color2, $color3, $color4)?>
        </div>
        <!-- Wetter -->
        <div class="<?=$weatherPos?> weather-wrapper content">
            <?=createWeather($color4, $city)?>
        </div> 
        <!-- News -->
        <div class="<?=$newsPos?> news-wrapper content">
            <?=createNews($color2, $color4)?>
        </div>
        <!-- Avatar -->
        <div class="<?=$avatarPos?> avatar-wrapper content">
            <img class="avatar" src="https://avatars.dicebear.com/api/<?=$avatar?>/<?=$username?>.svg" alt="Dein gewählter Avatar">
        </div>
    </article>

</body>
</html>