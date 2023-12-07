<?php

class AddProject
{
    public function index()
    {
        require "application/views/components/header.php";
        require "application/views/components/navbar.php";
        require_once 'application/views/addProject/addProject.php';
        require "application/views/components/footer.php";
    }
}