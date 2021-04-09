<?php
/*
Mit diesem Hilfsscript wird asynchron abgefragt,
ob bei der Registrierung eine Email bereits vorhanden ist.
*/
require("../prefs/credentials.php");

$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

$options = array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

try{
    $dbInst = new PDO($dsn, $user, $passwd, $options);
}
catch(PDOException $e){
	die("Verbindung zur Datenbank fehlgeschlagen: ".$e->getMessage());
}

$query = "SELECT email FROM user WHERE email = :email";
$stmt = $dbInst -> prepare($query);
$stmt -> bindParam(':email', $email);
$stmt -> execute();
$result = $stmt -> fetch();
if($result){
    $check = true;
}else{
    $check = false;
}
header('Content-Type: application/json');
echo json_encode($check);



?>