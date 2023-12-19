<?php
class UserModify
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
    public function modifyUserPage($id)
    {
        $user = $this->um->takeSingleUser($id);
        $admin = "";
        $superadmin = "";
        $contributor = "";

        switch ($user->getRole()){
            case "admin":
                $admin = "selected";
                break;
            case "superadmin":
                $superadmin = "selected";
                break;
            case "contributor":
                $contributor = "selected";
                break;
        }

        require "application/views/components/header.php";
        require "application/views/userManager/userModify.php";
        require "application/views/components/footer.php";
    }

    public function applyModify($id){
        if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['pnum']) && isset($_POST['role']) && isset($_POST['pass'])) {
            if (
                $this->vali->validChars($_POST['name']) && $this->vali->validChars($_POST['surname']) &&
                $this->vali->validMail($_POST['email']) && $this->vali->validNumbers($_POST['pnum'])
            ){
                $this->um->modifyUser($id,$_POST['name'],$_POST['surname'],$_POST['email'],$_POST['pnum'],$_POST['role'],$_POST['pass']);
                header("location:" . URL . "userManager");
            }else{
                //echo '<script>alert("Inserire i caratteri corretti!");</script>';
                header("location:" . URL . "userModify/modifyUserPage/$id");
            }
        }else{
            //echo '<script>alert("Inserire i dati!");</script>';
            header("location:" . URL . "userModify/modifyUserPage/$id");
        }

    }
}