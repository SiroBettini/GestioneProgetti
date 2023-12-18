<?php

class Archive
{
    private $pm;
    public function __construct()
    {
        require_once 'application/models/projectMapper.php';
        $this->pm = new ProjectMapper();
    }
    public function index()
    {
        require_once "application/models/projectMapper.php";
        $pjs = $this->pm->fetchProjects(1);
        require "application/views/components/header.php";
        require "application/views/components/navbar.php";
        require_once 'application/views/archive/archive.php';
    }
}