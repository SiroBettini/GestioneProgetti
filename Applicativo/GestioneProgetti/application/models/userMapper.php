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

    public function logIn($email, $pswd){
        //$pswd = password_hash($pswd, PASSWORD_BCRYPT);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);;
        $query =$this->conn->prepare("select * from user where email=? AND password=?");
        $query->execute([$email,$pswd]);
        $result = $query;
        $users = $result->fetch(PDO::FETCH_ASSOC);
        print_r($users);
        $_SESSION["name"] = $users["name"];
        $_SESSION["surname"] = $users["surname"];
        $_SESSION["role"] = $users["role"];
        $_SESSION["email"] = $users["email"];
        $_SESSION["phoneNumber"] = $users["phoneNumber"];
        return $result->rowCount() > 0;
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
        $query =$this->conn->prepare("INSERT INTO user (name,surname,email,phoneNumber,role,password) VALUES(?,?,?,?,?,?);");
        $query->execute([$name,$surname,$email,$phoneNumber,$role,$password]);
    }

    public function takeSingleUser($id){
        $query =$this->conn->prepare("select * from user where id=?");
        $query->execute([$id]);
        $result = $query->fetch();
        $user = new User($result['id'],$result['name'],$result['surname'],$result['role'],$result['email'],$result['phoneNumber'],$result['password']);
        return $user;
    }

    public function modifyUser($id,$name, $surname, $email, $phoneNumber, $role, $password){
        $query =$this->conn->prepare("UPDATE user SET name = ?,surname = ?,email = ?, phoneNumber = ?, role = ?, password = ? WHERE id = $id");
        $query->execute([$name,$surname,$email,$phoneNumber,$role,$password]);
    }

    public function deleteUser($id){
        $query =$this->conn->prepare("DELETE FROM user WHERE id = ?");
        $query->execute([$id]);
    }
}