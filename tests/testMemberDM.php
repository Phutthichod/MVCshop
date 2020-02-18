<?php
/**
 * Created by PhpStorm.
 * User: Diiar
 * Date: 22/1/2562
 * Time: 16:46
 */
spl_autoload_register(function ($class) {
    $path = '../DAO/DataMapper/' . $class . '.class.php';
    if (file_exists($path))
        require_once $path;
});
spl_autoload_register(function ($class) {
    $path = '../DAO/' . $class . '.class.php';
    if (file_exists($path))
        require_once $path;
});



$members = new MemberMapper();

print_r($members->getAll());
echo "<br/>";
$p = $members->get(1);
print_r($p);
echo "<br/>";
$p->setName("ยาสีฟัน ตราคอลเกต");
$p->setUsername("ppp");
print_r($p);
echo "<br/>";
$members->update($p);

print_r($members->getAll());
echo "<br/>";

var_dump($members->get(2));

$p = new Member();
$p->setId(2);
$members->update($p);

