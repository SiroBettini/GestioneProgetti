<?php

class project
{
    public function index()
    {
        require "application/views/components/header.php";
        require "application/views/components/navbar.php";
        require "application/views/projectList/projectList.php";
        //require "application/views/components/footer.php";
    }
}