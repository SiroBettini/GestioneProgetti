<?php
class User
{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $phoneNumber;
    private $role;
    private $password;

    public function __construct($id,$name,$surname,$role,$email,$phoneNumber,$password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->role = $role;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }


}