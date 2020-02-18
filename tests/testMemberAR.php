<?php
/**
 * Created by PhpStorm.
 * User: Diiar
 * Date: 23/1/2562
 * Time: 11:52
 */
spl_autoload_register(function ($class) {
    $path = '../DAO/ActiveRecord/' . $class . '.class.php';
    if (file_exists($path))
        require_once $path;
});
spl_autoload_register(function ($class) {
    $path = '../DAO/' . $class . '.class.php';
    if (file_exists($path))
        require_once $path;
});

//$list = Member::findAll();
//print_r($list);
//echo "<br/>";
//
//
//$product = new Member();
////$product->setProductId(5);
//$product->setName("ppp");
//$product->setUsername("user");
//$product->insert();
//$product->setUSername("user2");
//$product->update();
//
//$p = Member::findById(2);
//print_r($p);
$pp = Member::findByAccount("user2","1234");
print_r($pp);

//var_dump(Member::findById(30));