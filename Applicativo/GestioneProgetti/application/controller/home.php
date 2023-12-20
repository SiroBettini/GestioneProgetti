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
        if ($uc->isSuperadmin()){
            require "application/views/components/header.php";
            require "application/views/components/navbar.php";
            require_once 'application/views/home/home.php';
            require "application/views/components/footer.php";
        }else{
            require "application/views/components/header.php";
            require "application/views/components/navbarNormal.php";
            require_once 'application/views/home/home.php';
            require "application/views/components/footer.php";
        }

    }

    public function logOut(){
        require_once 'application/models/userMapper';
        $um = new UserMapper();
        $um->logout();
    }


}
