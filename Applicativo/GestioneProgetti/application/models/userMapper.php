<?php

namespace models;

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
        $query = "select * from accesso where email='$email' AND password='$pswd'";
        $result = $this->conn->query($query);
        $users = $result->fetch(PDO::FETCH_ASSOC);
        //print_r($users);
        $_SESSION["name"] = $users["name"];
        $_SESSION["surname"] = $users["surname"];
        $_SESSION["role"] = $users["role"];
        $_SESSION["email"] = $users["email"];
        $_SESSION["phoneNumber"] = $users["phoneNumber"];
        return $result->rowCount() > 0;
    }
}