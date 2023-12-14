<?php

namespace models;
use PDO;

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
        $query = "select * from user where email='$email' AND password='$pswd'";
        $result = $this->conn->query($query);
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
}