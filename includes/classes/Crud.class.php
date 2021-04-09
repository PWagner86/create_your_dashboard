<?php

class Crud extends PDO{
    
    public function __construct($host, $user, $passwd, $dbname){
    	$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname .';charset=utf8';

        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        try{
            parent::__construct($dsn, $user, $passwd, $options);
        }
        catch(PDOException $e){
            die("Verbindung zu Datenbank felgeschlagen: ".$e->getMessage());
        }
    }

    public function createMethod($benutzernameInput, $emailInput, $passwortInput, $avatarInput, $colorValue){
        $query = "INSERT INTO user (benutzername, email, passwort, avatar, farbschema) VALUES (:benutzername, :email, :passwort, :avatar, :farbschema)";
        $stmt = $this -> prepare($query);
        $stmt -> bindParam(':benutzername', $benutzernameInput);
        $stmt -> bindParam(':email', $emailInput);
        $stmt -> bindParam(':passwort', $passwortInput);
        $stmt -> bindParam(':avatar', $avatarInput);
        $stmt -> bindParam(':farbschema', $colorValue);
        $stmt -> execute();

        return $this -> lastInsertId();
    }

    public function getSingleRecord($benutzernameInput){
        $query = "SELECT * FROM user WHERE benutzername = :benutzername";
        $stmt = $this -> prepare($query);
        $stmt -> bindParam(':benutzername', $benutzernameInput);
        $stmt -> execute();
        $result = $stmt -> fetch();
        return $result;
    }

    
    public function login($email, $password){
        
        $query = "SELECT * FROM user WHERE email = :email";
        $stmt = $this -> prepare($query);
        $stmt -> bindParam(':email', $email);
        $stmt -> execute();
        $result = $stmt -> fetch();
        if($result !== false && password_verify($password, $result['passwort'])){
            $_SESSION['status'] = "Loged in";
            $_SESSION['ID'] = $result['ID'];
            $_SESSION['user'] = $result['benutzername'];
            $_SESSION['avatar'] = $result['avatar'];    
            $_SESSION['color'] = $result['farbschema'];
            return $result;
        }
    }

    public function updateColorMethod($farbSchema, $id){
        $query = "UPDATE user SET ";
        $query .= "farbschema = :farbschema ";
        $query .= "WHERE ID = :ID";
        $stmt = $this -> prepare($query);
        $stmt -> bindParam(":ID", $id, PDO::PARAM_INT);
        $stmt -> bindParam(":farbschema", $farbSchema, PDO::PARAM_INT);
        $stmt -> execute();
    }
}
?>