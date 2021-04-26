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

    public function createMethod($benutzernameInput, $emailInput, $passwortInput, $avatarInput, $colorValue = 1, $city = "New York", $clock = "first", $weather = "second", $news = "third", $avatar = "fourth", $weatherEffect = 1){
        $query = "INSERT INTO user (benutzername, email, passwort, avatar, farbschema, city, uhrPos, wetterPos, newsPos, avatarPos, wettereffekt) VALUES (:benutzername, :email, :passwort, :avatar, :farbschema, :city, :uhrPos, :wetterPos, :newsPos, :avatarPos, :wettereffekt)";
        $stmt = $this -> prepare($query);
        $stmt -> bindParam(':benutzername', $benutzernameInput);
        $stmt -> bindParam(':email', $emailInput);
        $stmt -> bindParam(':passwort', $passwortInput);
        $stmt -> bindParam(':avatar', $avatarInput);
        $stmt -> bindParam(':farbschema', $colorValue);
        $stmt -> bindParam(':city', $city);
        $stmt -> bindParam(':uhrPos', $clock);
        $stmt -> bindParam(':wetterPos', $weather);
        $stmt -> bindParam(':newsPos', $news);
        $stmt -> bindParam(':avatarPos', $avatar);
        $stmt -> bindParam(':wettereffekt', $weatherEffect);
        $stmt -> execute();

        return $this -> lastInsertId();
    }

    public function getSingleRecord($id){
        $query = "SELECT * FROM user WHERE ID = :ID";
        $stmt = $this -> prepare($query);
        $stmt -> bindParam(':ID', $id);
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
            $_SESSION['color'] = $result['farbschema'];
            return $result;
        }
    }

    public function updateColorMethod($farbSchema, $id){
        $query = "UPDATE user SET farbschema = :farbschema WHERE ID = :ID";
        $stmt = $this -> prepare($query);
        $stmt -> bindParam(":ID", $id, PDO::PARAM_INT);
        $stmt -> bindParam(":farbschema", $farbSchema, PDO::PARAM_INT);
        $stmt -> execute();
    }

    public function updateCity($city, $id){
        $query = "UPDATE user SET city = :city WHERE ID = :ID";
        $stmt = $this -> prepare($query);
        $stmt -> bindParam(":ID", $id, PDO::PARAM_INT);
        $stmt -> bindParam(":city", $city);
        $stmt -> execute();
    }

    public function updateClockPos($clock, $id){
        $query = "UPDATE user SET uhrPos = :uhrPos WHERE ID = :ID";
        $stmt = $this -> prepare($query);
        $stmt -> bindParam(":ID", $id, PDO::PARAM_INT);
        $stmt -> bindParam(":uhrPos", $clock);
        $stmt -> execute();
    }

    public function updateWeatherPos($weather, $id){
        $query = "UPDATE user SET wetterPos = :wetterPos WHERE ID = :ID";
        $stmt = $this -> prepare($query);
        $stmt -> bindParam(":ID", $id, PDO::PARAM_INT);
        $stmt -> bindParam(":wetterPos", $weather);
        $stmt -> execute();
    }

    public function updateNewsPos($news, $id){
        $query = "UPDATE user SET newsPos = :newsPos WHERE ID = :ID";
        $stmt = $this -> prepare($query);
        $stmt -> bindParam(":ID", $id, PDO::PARAM_INT);
        $stmt -> bindParam(":newsPos", $news);
        $stmt -> execute();
    }

    public function updateAvatarPos($avatar, $id){
        $query = "UPDATE user SET avatarPos = :avatarPos WHERE ID = :ID";
        $stmt = $this -> prepare($query);
        $stmt -> bindParam(":ID", $id, PDO::PARAM_INT);
        $stmt -> bindParam(":avatarPos", $avatar);
        $stmt -> execute();
    }

    public function updateWeatherEffect($weatherEffect, $id){
        $query = "UPDATE user SET wettereffekt = :wettereffekt WHERE ID = :ID";
        $stmt = $this -> prepare($query);
        $stmt -> bindParam(":ID", $id, PDO::PARAM_INT);
        $stmt -> bindParam(":wettereffekt", $weatherEffect);
        $stmt -> execute();
    }


}
?>