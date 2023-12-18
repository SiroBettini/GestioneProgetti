<?php

class UserAdd
{
    private $um;
    private $vali;
    public function __construct()
    {

        require_once "application/models/userMapper.php";
        require_once "application/models/validator.php";
        $this->um = new UserMapper();
        $this->vali = new Validator();
    }
    public function index()
    {
        require "application/views/components/header.php";
        require "application/views/userManager/userAdd.php";
        require "application/views/components/footer.php";
    }

    public function createUser(){
        if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['pnum']) && isset($_POST['role']) && isset($_POST['pass'])) {
            if ($this->vali->validChars($_POST['name']) && $this->vali->validChars($_POST['surname'])){
                $this->um->createUser($_POST['name'],$_POST['surname'],$_POST['email'],$_POST['pnum'],$_POST['role'],$_POST['pass']);

                header("location:" . URL . "userManager");
            }
        }
    }
}