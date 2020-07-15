<?php

namespace Models;
require_once 'Model.php';

use Models\Model;

class User extends Model
{

    private $email;
    private $name;
    private $password;

    /**
     * User constructor.
     * @param $email
     * @param $name
     * @param $password
     */
    public function __construct($email, $name, $password)
    {
        $this->email = $email;
        $this->name = $name;
        $this->setPassword($password);
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = md5($password);
    }

    public function save()
    {
//        include('connect_to_db.php');
//        $connection = databaseInstance()->getConnection();

        $sql = "INSERT INTO Users( email,name, password)
                 VALUE ('{$this->getEmail()}',
                 '{$this->getName()}','{$this->getPassword()}')";
        return mysqli_query($this->getConnection(), $sql);
    }


}