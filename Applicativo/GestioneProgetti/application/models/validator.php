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
        $numericPhoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

        $pattern = '/^\+\d{1,}$/';

        if (preg_match($pattern, $numericPhoneNumber)) {
            return true;
        }
        return false;
    }
}