<?php
class UserAdd
{
    public function index()
    {
        require "application/views/components/header.php";
        require "application/views/userManager/userAdd.php";
        require "application/views/components/footer.php";
    }
}