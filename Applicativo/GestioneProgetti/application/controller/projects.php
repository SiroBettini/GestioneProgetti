<?php
class Projects
{
    private $pm;
    private $um;
    public function __construct()
    {
        require_once 'application/models/projectMapper.php';
        require_once 'application/models/userMapper.php';
        $this->pm = new ProjectMapper();
        $this->um = new UserMapper();
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
    public function new(){
        $users = $this->um->fetch();
        require "application/views/components/header.php";
        require "application/views/components/navbar.php";
        require "application/views/addProject/addProject.php";
    }

    public function add(){
        if(isset($_POST["title"]) && isset($_POST["desc"])){
            $title = $_POST["title"];
            $desc = $_POST["desc"];
            $start = $_POST["start"];
            $contributor = $_POST["usr"];
        }else{
            header("location:" . URL . "projects/new");
            return;
        }
        $this->pm->addProject($title,$desc,$start,$contributor);
        header("location:" . URL . "projects");
    }
}