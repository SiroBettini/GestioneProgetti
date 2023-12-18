<?php
class Projects
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
        $pjs = $this->pm->fetchProjects(0);

        require "application/views/components/header.php";
        require "application/views/components/navbar.php";
        require "application/views/projectList/projectList.php";
        //require "application/views/components/footer.php";
    }
    public function delete($index = null){
        $this->pm->deleteProject($index);
        header("location:" . URL . "projects");
    }
}