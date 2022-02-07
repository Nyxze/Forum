<?php
require "autoloader.php";

$pdo = new PDO(
    "mysql:host=localhost;dbname=formation_cda_2022;charset=utf8",
    "root", "",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

$dao = new PersonDAO($pdo);
$addressDAO = new AddressDAO($pdo);
$p = new Person();

$p->setFirstName("Alberto")->setLastName("Pastoi");
 $a = new Address();
$a->setCity("Bruxelles")->setStreet("dsad")->setZipcode("65420");
$p->setAddress($a);
var_dump($p);
$dao->save($p);

try {
     
var_dump($p);


}catch(PDOException $ex){
    echo $ex->getMessage();
} catch(NotFoundException $ex){
    echo "<div>Il n'y a pas de résultats</div>";
}

