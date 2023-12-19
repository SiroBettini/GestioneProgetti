<?php

class UserDelete
{
    private $um;

    public function __construct()
    {
        require_once "application/models/userMapper.php";
        $this->um = new UserMapper();
    }

    public function delete($id){
        $this->um->deleteUser($id);
        header("location:" . URL . "userManager");
    }
}