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
    <link rel="stylesheet" href="../style/mainBack.css">
</head>
<body style="background: <?=$color1?>;">

    <header class="reg-header main-header">
        <h1 style="color: <?=$color4?>; ">Willkommen <span style="color: <?=$color3?>; text-shadow: 0 0 50px <?=$color2?>;"><?=$username?></span></h1>
    </header>


    <a href="./logout.php">Logout</a>
    
</body>
</html>