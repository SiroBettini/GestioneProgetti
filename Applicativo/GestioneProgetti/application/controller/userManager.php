<?php

class UserManager
{
    public function index()
    {
        session_start();
        require "application/models/userMapper.php";
        $um = new UserMapper();
        $users = $um->fetch();

        require "application/views/components/header.php";
        require "application/views/components/navbar.php";
        require "application/views/userManager/userManager.php";
        require "application/views/components/footer.php";
    }

}