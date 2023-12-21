<?php

class UserDelete
{
    private $um;

    public function __construct()
    {
        require_once "application/models/userMapper.php";
        require_once "application/controller/userControl.php";
        $this->um = new UserMapper();
        $this->uc = new UserControl();
    }

    public function delete($id){
        $this->um->deleteUser($id);
        if(!$this->uc->sameUser($id)){
            header("location:" . URL . "userManager");
        }
    }
}