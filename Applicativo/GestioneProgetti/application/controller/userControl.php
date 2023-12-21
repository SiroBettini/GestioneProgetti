<?php

class UserControl
{
    public function isSuperadmin(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if ($_SESSION['role'] == "superadmin") {
            return true;
        }
        else{
            return false;
        }
    }

    public function isContributor(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if ($_SESSION['role'] == "contributor") {
            return true;
        }
        else{
            return false;
        }
    }

    public function sameUser($id){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if ($_SESSION['UserId'] == $id) {
            return true;
        }
        else{
            return false;
        }
    }
}