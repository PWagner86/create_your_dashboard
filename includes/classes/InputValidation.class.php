<?php
class InputValidation{

    private $data;
    public $logError;
    private $errors = array();
    private static $formFields = ['email', 'password', 'username'];
    private static $loginFields = ['email', 'password'];

    public function __construct($postData){
        $this -> data = $postData;
    }
    
    public function validateForm(){
        foreach(self::$formFields as $field){
            if(!array_key_exists($field, $this -> data)){
                trigger_error("$field ist nicht in data enthalten");
                return;
            }
        }

        $this -> validateEmail();
        $this -> validatePassword();
        $this -> validateUsername();
        return $this -> errors;
    }

    public function validateLogin(){
        foreach(self::$loginFields as $field){
            if(!array_key_exists($field, $this -> data)){
                trigger_error("$field ist nicht in data enthalten");
                return;
            }
        }

        $this -> validateEmail();
        $this -> validatePassword();
        return $this -> errors;
    }

    private function validateEmail(){
        $val = trim($this -> data['email']);
        if(empty($val)){
            $this -> addError('email', 'Bitte Email-Adresse eintragen');
            $this -> logError = "Bitte Email und Passwort eingeben";
        }else{
            if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
                $this -> addError('email', 'Bitte gültigen Email-Adresse eingeben');
                $this -> logError = "Email oder Passwort sind falsch";
            }
        }

    }

    private function validatePassword(){
        $val = trim($this -> data['password']);
        if(empty($val)){
            $this -> addError('password', 'Bitte Passwort eintragen');
            $this -> logError = "Bitte Email und Passwort eingeben";
        }else{
            if(!filter_var($val, FILTER_SANITIZE_STRING)){
                $this -> addError('password', 'Bitte gültiges Passwort eingeben');
                $this -> logError = "Email oder Passwort sind falsch";
            }
        }
    }

    private function validateUsername(){
        $val = trim($this -> data['username']);
        if(empty($val)){
            $this -> addError('username', 'Bitte Benutzername eintragen');
        }else{
            if(!filter_var($val, FILTER_SANITIZE_STRING)){
                $this -> addError('username', 'Bitte gültigen Benutzernamen eingeben');
            }
        }
    }

    private function addError($key, $val){
        $this -> errors[$key] = $val;
    }

}


?>