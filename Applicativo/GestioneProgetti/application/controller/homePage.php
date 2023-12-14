<?php


class HomePage
{
    public function index()
    {
        require "application/views/components/header.php";
        require "application/views/components/navbar.php";
        require_once 'application/views/home/home.php';
        require "application/views/components/footer.php";
    }
}