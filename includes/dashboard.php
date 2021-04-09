<?php
session_start();
require('./classes/Crud.class.php');
require('./helper/colorPicker.php');
require('./prefs/credentials.php');
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
    <meta charset="UTF-8">
    <meta name="description" content="Costumize your dashboard the way you want">
    <meta name="keywords" content="Dashboard, create, weather, avatar, news, clock">
    <meta name="author" content="Peter Wagner">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/mainBack.css">
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
                <div class="color-pick">
                    <div style="border-color: <?=$color3?>;" class="color-container cc1">
                        <div class="color-1"></div>
                        <div class="color-2"></div>
                        <div class="color-3"></div>
                        <div class="color-4"></div>
                    </div>
                    <label class='select-btn-wrapper'>
                        <input class='color-select select-btn' type='radio' name='color-select' value='1'>
                        <i class='fas fa-power-off'></i>
                    </label>
                </div>
                <div class="color-pick">
                    <div style="border-color: <?=$color3?>;" class="color-container cc2">
                        <div class="color-1"></div>
                        <div class="color-2"></div>
                        <div class="color-3"></div>
                        <div class="color-4"></div>
                    </div>
                    <label class='select-btn-wrapper'>
                        <input class='color-select select-btn' type='radio' name='color-select' value='2'>
                        <i class='fas fa-power-off'></i>
                    </label>
                </div>
                <div class="color-pick">
                    <div style="border-color: <?=$color3?>;" class="color-container cc3">
                        <div class="color-1"></div>
                        <div class="color-2"></div>
                        <div class="color-3"></div>
                        <div class="color-4"></div>
                    </div>
                    <label class='select-btn-wrapper'>
                        <input class='color-select select-btn' type='radio' name='color-select' value='3'>
                        <i class='fas fa-power-off'></i>
                    </label>
                </div>
                <div class="color-pick">
                    <div style="border-color: <?=$color3?>;" class="color-container cc4">
                        <div class="color-1"></div>
                        <div class="color-2"></div>
                        <div class="color-3"></div>
                        <div class="color-4"></div>
                    </div>
                    <label class='select-btn-wrapper'>
                        <input class='color-select select-btn' type='radio' name='color-select' value='4'>
                        <i class='fas fa-power-off'></i>
                    </label>
                </div>
                <div class="color-pick">
                    <div style="border-color: <?=$color3?>;" class="color-container cc5">
                        <div class="color-1"></div>
                        <div class="color-2"></div>
                        <div class="color-3"></div>
                        <div class="color-4"></div>
                    </div>
                    <label class='select-btn-wrapper'>
                        <input class='color-select select-btn' type='radio' name='color-select' value='5'>
                        <i class='fas fa-power-off'></i>
                    </label>
                </div>
                <div class="color-pick">
                    <div style="border-color: <?=$color3?>;" class="color-container cc6">
                        <div class="color-1"></div>
                        <div class="color-2"></div>
                        <div class="color-3"></div>
                        <div class="color-4"></div>
                    </div>
                    <label class='select-btn-wrapper'>
                        <input class='color-select select-btn' type='radio' name='color-select' value='6'>
                        <i class='fas fa-power-off'></i>
                    </label>
                </div>
                <div class="color-pick">
                    <div style="border-color: <?=$color3?>;" class="color-container cc7">
                        <div class="color-1"></div>
                        <div class="color-2"></div>
                        <div class="color-3"></div>
                        <div class="color-4"></div>
                    </div>
                    <label class='select-btn-wrapper'>
                        <input class='color-select select-btn' type='radio' name='color-select' value='7'>
                        <i class='fas fa-power-off'></i>
                    </label>
                </div>
                <div class="color-pick">
                    <div style="border-color: <?=$color3?>;" class="color-container cc8">
                        <div class="color-1"></div>
                        <div class="color-2"></div>
                        <div class="color-3"></div>
                        <div class="color-4"></div>
                    </div>
                    <label class='select-btn-wrapper'>
                        <input class='color-select select-btn' type='radio' name='color-select' value='8'>
                        <i class='fas fa-power-off'></i>
                    </label>
                </div>
                <div class="color-pick">
                    <div style="border-color: <?=$color3?>;" class="color-container cc9">
                        <div class="color-1"></div>
                        <div class="color-2"></div>
                        <div class="color-3"></div>
                        <div class="color-4"></div>
                    </div>
                    <label class='select-btn-wrapper'>
                        <input class='color-select select-btn' type='radio' name='color-select' value='9'>
                        <i class='fas fa-power-off'></i>
                    </label>
                </div>
                <div class="color-pick">
                    <div style="border-color: <?=$color3?>;" class="color-container cc10">
                        <div class="color-1"></div>
                        <div class="color-2"></div>
                        <div class="color-3"></div>
                        <div class="color-4"></div>
                    </div>
                    <label class='select-btn-wrapper'>
                        <input class='color-select select-btn' type='radio' name='color-select' value='10'>
                        <i class='fas fa-power-off'></i>
                    </label>
                </div>
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