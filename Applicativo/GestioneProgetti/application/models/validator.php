<?php
class Validator
{
    public function __construct()
    {
    }

    function validChars($string){
        if (preg_match('/^[a-zA-Z0-9]+$/', $string)) {
            return true;
        }
        return false;
    }

    function validMail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    function validNumbers($phoneNumber){

        if (preg_match('/^\+?\d+$/', $phoneNumber)) {
            return true;
        }
        return false;
    }
}