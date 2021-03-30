<?php
session_start();
require('./includes/prefs/credentials.php');
require('./includes/classes/Crud.class.php');
require('./includes/classes/FormValidation.class.php');
// CRUD Validierungsklasse instanzieren
$crudInstance = new Crud($host, $user, $passwd, $dbname);
$validationInstance = new FormValidation();

$usernameValue = "";
$emailValue = "";
$passwordValue = "";
$errorMsg = "";
$registerErrorEmail = "";
$registerErrorUsername = "";
$registerErrorPassword = "";
$errorLoginMsg = "";
$loginValue = "";

// Registrieren
if(isset($_POST['register'])){
    $usernameValue = $validationInstance -> validateElement($_POST['username'], "username", "Bitte gültigen Benutzernamen eingeben");
    $emailValue = $validationInstance -> validateElement($_POST['email'], "email", "Bitte gültigen Email eingeben");
    $passwordValue = $validationInstance -> validateElement($_POST['password'], "password", "Bitte gültiges Passwort eingeben");

    if($validationInstance -> validationState){
        $passwordValue = password_hash($passwordValue, PASSWORD_DEFAULT);
        $avatarValue = $_POST['avatar'];
        $crudInstance -> createMethod($usernameValue, $emailValue, $passwordValue, $avatarValue, 1);
        header("location: index.php");
    }else{
        $registerErrorEmail = $validationInstance -> feedbackArray['email'];
        $registerErrorUsername = $validationInstance -> feedbackArray['username'];
        $registerErrorPassword = $validationInstance -> feedbackArray['password'];
        $errorMsg = "Etwas ist schief gelaufen";
    }
}

// Login
if(isset($_POST['login'])){
    $loginValue =  $validationInstance -> validateElement($_POST['email'], "email", "Bitte gültigen Email eingeben");
    $passwordValue = $validationInstance -> validateElement($_POST['password'], "password", "Bitte gültiges Passwort eingeben");
    if($validationInstance -> validationState){
        $errorLoginMsg = $crudInstance -> login($loginValue, $passwordValue);
        header("location: ./includes/dashboard.php");
    }elseif(empty($_POST['email']) || empty($_POST['password'])){
        $errorLoginMsg = "Bitte Email und Passwort eingeben";
    }else{
        $errorLoginMsg = "Email oder Passwort wurden falsch eingegeben";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create your Dashboard</title>
    <link rel="stylesheet" href="./style/mainFront.css">
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
            <p class="error-msg"><?=$errorLoginMsg?></p>
            <!-- Eingabe für Email -->
            <label class="form-label" for="email" value="<?=$loginValue?>">
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
            <p class="error-msg main-error"><?=$errorMsg?></p>
            <!-- Eingabe für Email -->
            <label class="form-label" for="email">
                <p class="error-msg"><?=$registerErrorEmail?></p>
                Email:
                <input class="form-input" type="text" name="email" value="<?=$emailValue?>">
            </label>
            <!-- Eingabe für Passwort -->
            <label class="form-label" for="password">
                <p class="error-msg"><?=$registerErrorPassword?></p>
                Passwort:
                <input class="form-input" type="password" name="password">
            </label>
            <!-- Auswahl des Avatars -->
            <label class="form-label" for="avatar">
                Wähle dein Avatar-Typ:

                <select class="form-input avatar-select" name="avatar">
                    <option value="avataaars">Avataaars</option>
                    <option value="male">Mann</option>
                    <option value="female">Frau</option>
                    <option value="human">Mensch</option>
                    <option value="bottts">Roboter</option>
                </select>
            </label>
            <!-- Eingabe für Benutzername -->
            <label class="form-label" for="username">
                <p class="error-msg"><?=$registerErrorUsername?></p>
                Benutzername:
                <input class="form-input username" type="text" name="username" value="<?=$usernameValue?>">
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