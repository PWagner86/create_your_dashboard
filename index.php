<?php
session_start();
require('./includes/prefs/credentials.php');
require('./includes/classes/Crud.class.php');
require('./includes/classes/InputValidation.class.php');
require('./includes/components/createMetaTags.php');
// CRUD Validierungsklasse instanzieren
$crudInstance = new Crud($host, $user, $passwd, $dbname);

// Registrieren
$regEmail = "";
$regPassword = "";
$regUsername = "";
$regError = "";

if(isset($_POST["register"])){
    // Eingaben validieren
    $validation = new InputValidation($_POST);
    $errors = $validation -> validateForm();
    $regEmail = $_POST['email'];
    $regPassword = $_POST['password'];
    $regUsername = $_POST['username'];

    // Wenn das Error-Array leer ist, werden die Eingaben in die Datenbank gespeichert
    if(empty($errors)){
        $crudInstance -> createMethod($regUsername, $regEmail, password_hash($regPassword, PASSWORD_DEFAULT), $_POST['avatar']);
        header("location: index.php");
    }else{
        $regError = "Etwas ist schief gelaufen";
    }
}

// Login
$logEmail = "";
$logPassword = "";
$loginError = "";

if(isset($_POST["login"])){
    // Eingaben validieren
    $validation = new InputValidation($_POST);
    $errors = $validation -> validateLogin();
    $logEmail = $_POST['email'];
    $logPassword = $_POST['password'];

    // Wenn das Error-Array leer ist, wird eingelogt.
    if(empty($errors)){
        $login = $crudInstance -> login($logEmail, $logPassword);
        if($login == true){
            header("location: ./includes/dashboard.php");
        }else{
            $loginError = "Email oder Passwort sind falsch";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Hier werden die Metatags und Stylelinks geladen -->
    <?=createMetaTags("Create your Dashboard", "./css/mainFront.css")?>
    <script src="./js/mainFront.js" type="module"></script>
</head>
<body>
    <!-- Header -->
    <header class="main-header">
        <h1 class="main-title">Create your<br><span>Dashboard</span></h1>
    </header>
    <!-- Login und Registrierung-->
    <article class="login-register-wrapper">
        <!-- Login-Formular -->
        <form class="log-reg-form login-form" action="index.php" method="POST">
            <!-- Form-Titel -->
            <h3 class="form-title">Login</h3>
            <!-- Fehlermeldung -->
            <p class="error-msg"><?= $validation -> logError ?? $loginError ?></p>
            <!-- Eingabe für Email -->
            <label class="form-label" for="email">
                Email
                <input class="form-input" type="text" name="email">
            </label>
            <!-- Eingabe für Passwort -->
            <label class="form-label" for="password">
                Passwort
                <input class="form-input" type="password" name="password">
            </label>
            <!-- Login-Button -->
            <div class="form-submit-wrapper">
                <input class="form-btn" name="login" type="submit" value="Einloggen">
            </div>
        </form>

            <!-- Registrier-Formular -->
        <form class="log-reg-form register-form" action="index.php" method="POST">
            <!-- Form-Titel -->
            <h3 class="form-title">Registrieren</h3>
            <!-- Hauptfehlermeldung -->
            <p class="error-msg main-error"><?= $regError ?></p>
            <!-- Eingabe für Email -->
            <label class="form-label" for="email">
                <p class="error-msg error-msg-email"><?=$errors['email'] ?? '' ?></p>
                Email:
                <input class="form-input input-email" type="text" name="email" value="<?= htmlspecialchars($regEmail)?>">
            </label>
            <!-- Eingabe für Passwort -->
            <label class="form-label" for="password">
                <p class="error-msg"><?=$errors['password'] ?? '' ?></p>
                Passwort:
                <input class="form-input" type="password" name="password">
            </label>
            <!-- Auswahl des Avatars -->
            <label class="form-label" for="avatar">
                Wähle dein Avatar-Typ:

                <select class="form-input avatar-select" name="avatar">
                    <option value="male">Mann</option>
                    <option value="female">Frau</option>
                    <option value="human">Mensch</option>
                    <option value="bottts">Roboter</option>
                    <option value="avataaars">Avataaars</option>
                </select>
            </label>
            <!-- Eingabe für Benutzername -->
            <label class="form-label" for="username">
                <p class="error-msg"><?=$errors['username'] ?? '' ?></p>
                Benutzername:
                <input class="form-input username" type="text" name="username" value="<?= htmlspecialchars($regUsername)?>">
            </label>
            <!-- Bild des Avatars -->
            <img class="avatar-pic" src="" alt="Der gewählte Avatar">
            <!-- Registrier-Button -->
            <div class="form-submit-wrapper">
                <input class="form-btn" type="submit" name="register" value="Registrieren">
            </div>
        </form>

        <!-- Button um zwischen den Formularen zu wechseln -->
        <button class="switch">Registrieren</button>

    </article>
</body>
</html>