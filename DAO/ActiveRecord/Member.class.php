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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
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
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
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
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    //----------- CRUD
    public static function findAll(): array {
        $con = Db::getInstance();
        $query = "SELECT * FROM ".self::TABLE;
        $stmt = $con->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Member");
        $stmt->execute();
        $memberList  = array();
        while ($prod = $stmt->fetch())
        {
            $memberList[$prod->getId()] = $prod;
        }
        return $memberList;
    }
    public static function findById(int $id): ?Member {
        $con = Db::getInstance();
        $query = "SELECT * FROM ".self::TABLE." WHERE id = $id";
        $stmt = $con->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Member");
        $stmt->execute();
        if ($prod = $stmt->fetch())
        {
            return $prod;
        }
        return null;
    }
    public static function findByAccount(String $username,String $password): ?Member {
        $con = Db::getInstance();
        $query = "SELECT * FROM ".self::TABLE." WHERE username = '$username' AND password = '$password'";
        // echo $query;
        $stmt = $con->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Member");
        $stmt->execute();
        if ($prod = $stmt->fetch())
        {
            return $prod;
        }
        return null;
    }
    public function insert() {
        $con = Db::getInstance();
        $values = "";
        foreach ($this as $prop => $val) {
            $values .= "'$val',";
        }
        $values = substr($values,0,-1);
        $query = "INSERT INTO ".self::TABLE." VALUES ($values)";
        //echo $query;
        $res = $con->exec($query);
        $this->id = $con->lastInsertId();
        return $res;

    }
    public function update() {
        $query = "UPDATE ".self::TABLE." SET ";
        foreach ($this as $prop => $val) {
            $query .= " $prop='$val',";
        }
        $query = substr($query, 0, -1);
        $query .= " WHERE id = ".$this->getId();
        $con = Db::getInstance();
        $res = $con->exec($query);
        return $res;
    }



}