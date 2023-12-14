<?php

<<<<<<< HEAD
use models\ProjectMapper;

=======
>>>>>>> b486ad6f7d9fd5dc008d30c37f9f0984c26b1e75
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