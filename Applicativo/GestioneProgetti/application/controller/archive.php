<?php

class Archive
{
    public function index()
    {
        require "application/views/components/header.php";
        require "application/views/components/navbar.php";
        require_once 'application/views/archive/archive.php';
        require "application/views/components/footer.php";
    }
}