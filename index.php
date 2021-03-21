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
        <form class="log-reg-form login-form" action="index.php" method="post">
            <!-- Form-Titel -->
            <h3 class="form-title">Login</h3>
            <!-- Fehlermeldung -->
            <p class="error-msg">Email oder Password ist falsch</p>
            <!-- Eingabe für Email -->
            <label class="form-label" for="email">
                Email
                <input class="form-input" type="text" name="eamil">
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

    </article>
</body>
</html>