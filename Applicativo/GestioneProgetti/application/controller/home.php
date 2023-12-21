<?php


class Home
{


    public function index()
    {
        require "application/views/components/header.php";
        require_once 'application/views/login/index.php';
        require "application/views/components/footer.php";
    }

    public function homePage(){
        require_once 'application/controller/userControl.php';
        $uc = new UserControl();
        require "application/views/components/header.php";
        require "application/views/components/navbar.php";
        require_once 'application/views/home/home.php';
        require "application/views/components/footer.php";
    }

    public function logOut(){
        session_start();
        unset($_SESSION['UserId']);
        unset($_SESSION["name"]);
        unset($_SESSION["surname"]);
        unset($_SESSION["role"]);
        unset($_SESSION["email"]);
        unset($_SESSION["phoneNumber"]);

        header("location:" . URL . "home");
        session_destroy();
    }


}
