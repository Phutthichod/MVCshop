<?php
/**
 * Created by PhpStorm.
 * User: 8404-xx
 * Date: 11/2/2563
 * Time: 10:32
 */

class Member
{
    private $id;
    private $name;
    private $surname;
    private $username;
    private $password;
    private const TABLE = "member";

    public function getId()
    {
        return $this->id;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name): void
    {
        $this->name = $name;
    }
    public function getSurname()
    {
        return $this->surname;
    }
    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username): void
    {
        $this->username = $username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getIterator()
    {
        return new ArrayIterator(get_object_vars($this));
    }



}