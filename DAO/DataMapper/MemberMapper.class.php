<?php
/**
 * Created by PhpStorm.
 * User: 8404-xx
 * Date: 11/2/2563
 * Time: 10:43
 */

class MemberMapper
{
    private $memberList;
    private const TABLE="member";

    public function __construct() {

        $con = Db::getInstance();
        $query = "SELECT * FROM ".self::TABLE;
        $stmt = $con->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Member");
        $stmt->execute();
        $this->memberList  = array();
        while ($prod = $stmt->fetch())
        {
            $this->memberList[$prod->getId()] = $prod;
        }
    }

    public function getAll(): array {
        return $this->memberList;
    }
    public function get(int $id): ?Member {
        return $this->memberList[$id]??null;
    }
    public function update(Member $prod) {

        if (isset($this->memberList[$prod->getId()])) {
            $query = "UPDATE ".self::TABLE." SET ";
            $prodIt = $prod->getIterator();
            foreach ($prodIt as $prop => $val) {
                $query .= " $prop='$val',";
            }
            $query = substr($query, 0, -1);
            $query .= " WHERE id = ".$prod->getId();
            //echo $query;
            $con = Db::getInstance();
            if ($con->exec($query) === true) {
                $this->memberList[$prod->getId()] = $prod;
                return true;
            }
            return false;
        }
        else {
            throw new Exception("Member doesn't exist");
        }



    }
}