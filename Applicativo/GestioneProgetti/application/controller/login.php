<?php

namespace controller;

use models\userMapper;
class login
{
    private $um;
    public function __construct()
    {
        require_once "application/models/userMapper.php";
        $this->um = new UserMapper();
    }

    public function index(){
        session_start();
        if(isset($_POST['login'])) {
            $username = $_POST['user'];
            $pswd =  $_POST["pswd"];
            $res = $this->um->logIn($username,$pswd);
            if($res){
                header("location:" . URL . "home/homePage");
            }else{
                //header("location:" . URL . "home");
                $_SESSION['error_message'] = "login fallito";
            }
        }
    }
}