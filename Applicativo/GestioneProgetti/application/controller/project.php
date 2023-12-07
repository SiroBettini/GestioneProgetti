<?php

use models\ProjectMapper;

class Project
{
    public function index()
    {
        require "application/models/projectMapper.php";
        $pm = new ProjectMapper();
        $pjs = $pm->fetchProjects();

        require "application/views/components/header.php";
        require "application/views/components/navbar.php";
        require "application/views/projectList/projectList.php";
        //require "application/views/components/footer.php";
    }
}