<?php

require_once "user.php";

class UserMapper
{
    private $conn;

    /**
     * @param $conn
     */
    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=gestione_progetti", "root","");
    }

    public function logIn($email, $psd){
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $query =$this->conn->prepare("SELECT * FROM user WHERE email=?");
        $query->execute([$email]);
        $result = $query;
        $users = $result->fetch(PDO::FETCH_ASSOC);
        if(password_verify($psd, $users["password"])){
            session_start();
            $_SESSION["UserId"] = $users['id'];
            $_SESSION["name"] = $users["name"];
            $_SESSION["surname"] = $users["surname"];
            $_SESSION["role"] = $users["role"];
            $_SESSION["email"] = $users["email"];
            $_SESSION["phoneNumber"] = $users["phoneNumber"];
            return $result->rowCount() > 0;
        }
        return false;
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['UserId']);
        unset($_SESSION["UserId"]);
        unset($_SESSION["name"]);
        unset($_SESSION["surname"]);
        unset($_SESSION["role"]);
        unset($_SESSION["email"]);
        unset($_SESSION["phoneNumber"]);

        session_destroy();
        header("Location:" . URL);
        exit();
    }

    public function fetch() : array{
        $query = "SELECT * FROM user";
        $result = $this->conn->query($query);
        $users = array();
        foreach($result as $s){
            $user = new User($s['id'],$s['name'],$s['surname'],$s['role'],$s['email'],$s['phoneNumber'],$s['password']);
            $users[] = $user;
        }
        return $users;
    }

    public function createUser($name, $surname, $email, $phoneNumber, $role, $password){
        $psd = password_hash($password, PASSWORD_BCRYPT);
        $query =$this->conn->prepare("INSERT INTO user (name,surname,email,phoneNumber,role,password) VALUES(?,?,?,?,?,?);");
        $query->execute([$name,$surname,$email,$phoneNumber,$role,$psd]);
    }

    public function takeSingleUser($id){
        $query =$this->conn->prepare("select * from user where id=?");
        $query->execute([$id]);
        $result = $query->fetch();
        $user = new User($result['id'],$result['name'],$result['surname'],$result['role'],$result['email'],$result['phoneNumber'],$result['password']);
        return $user;
    }

    public function modifyUser($id,$name, $surname, $email, $phoneNumber, $role, $password){
        $pswd = password_hash($password, PASSWORD_BCRYPT);
        $query =$this->conn->prepare("UPDATE user SET name = ?,surname = ?,email = ?, phoneNumber = ?, role = ?, password = ? WHERE id = $id");
        $query->execute([$name,$surname,$email,$phoneNumber,$role,$pswd]);
    }

    public function deleteUser($id){
        $query =$this->conn->prepare("DELETE FROM user WHERE id = ?");
        $query->execute([$id]);
    }
}