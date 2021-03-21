<?php
class FormValidation{


    private $emptyFeedback = "Bitte füllen Sie das Feld aus";

    public $feedbackArray = array(
        "email" => "",
        "username" => "",
        "password" => ""
    );

    public $validationState = true;

    public function validateElement($value, $arrayIndex = "", $feedbackStr = ""){

        $cleanValue = $this -> desinfect($value);
        $check = "positive";
        
        if(empty($value)){
            $this -> feedbackArray[$arrayIndex] = $this -> emptyFeedback;
            $this -> validationState = false;
        }elseif(strlen($value) > 0){
            if($value == $_POST['email']){
                if(!$this -> isMail($value)){
                    $check = "negative";
                    $this -> feedbackArray['email'] = $feedbackStr;
                }
            }
            if($value == $_POST['password']){
                if(!$this -> desinfect($value)){
                    $check = "negative";
                    $this -> feedbackArray['password'] = $feedbackStr;
                }
            }
            if(isset($_POST['register']) && $value == $_POST['username']){
                if(!$this -> desinfect($value)){
                    $check = "negative";
                    $this -> feedbackArray['username'] = $feedbackStr;
                }
            }
        }

        if($check == "negative"){
            $this -> feedbackArray[$arrayIndex] = $feedbackStr;
            $this -> validationState = false;
        }

        return $cleanValue;
    }

    private function desinfect($str){
		$cleanStr = filter_var($str, FILTER_SANITIZE_STRING);
		$cleanStr = trim($cleanStr);
		return $cleanStr;
    }

    public function isMail($str){
        if(filter_var($str, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }
}



?>