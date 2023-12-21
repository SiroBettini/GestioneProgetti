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

        require_once 'application/controller/userControl.php';
        $uc = new UserControl();
        if ($uc->isSuperadmin()) {
            require "application/views/components/header.php";
            require "application/views/components/navbar.php";
            require "application/views/projectList/projectList.php";
            require "application/views/components/footer.php";
        }else{
            require "application/views/components/header.php";
            require "application/views/components/navbarNormal.php";
            require "application/views/projectList/projectList.php";
            require "application/views/components/footer.php";
        }
    }
    public function delete($index = null){
        require_once 'application/controller/userControl.php';
        $uc = new UserControl();
        if (!$uc->isContributor()) {
            $this->pm->deleteProject($index);
            header("location:" . URL . "projects");
        }else{
            header("location:" . URL . "projects");
        }
    }
    public function new(){
        require_once 'application/controller/userControl.php';
        $uc = new UserControl();
        $users = $this->um->fetch();
        require "application/views/components/header.php";
        require "application/views/projectList/addProject.php";
    }

    public function add(){

        if(!(empty($_POST["title"])) && !(empty($_POST["desc"]))){
            $title = $_POST["title"];
            $desc = $_POST["desc"];
            $start = $_POST["start"];
            $contributor = $_POST["usr"];
        }else{
            echo "<script>alert('Inserire i dati')</script>";
            header("location:" . URL . "projects/new");
            return;
        }
        $creator = 1;
        $this->pm->addProject($title,$desc,$start,$contributor,$creator);
        header("location:" . URL . "projects");
    }
    public function edit($index){
        require_once 'application/controller/userControl.php';
        $uc = new UserControl();
        if (!$uc->isContributor()) {
            $pjs = $this->pm->fetchProjects(0);
            $currProj = null;
            foreach ($pjs as $proj) {
                if ($proj->getId() == $index) {
                    $currProj = $proj;
                }
            }
            require "application/views/components/header.php";
            require "application/views/projectList/editProject.php";
        }else{
            header("location:" . URL . "projects");
        }
    }
    public function update($index){
        if(!(empty($_POST["title"])) && !(empty($_POST["desc"]))){
            $title = $_POST["title"];
            $desc = $_POST["desc"];
            $state = $_POST["state"];
        }else{
            echo "<script>alert('Inserire i dati')</script>";
            header("location:" . URL . "projects/edit/$index");
            return;
        }
        $this->pm->updateProject($index,$title,$desc,$state);
        header("location:" . URL . "projects");
    }
}