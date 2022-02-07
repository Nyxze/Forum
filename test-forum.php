<?php 
require "autoloader.php";

$pdo = new PDO(
    "mysql:host=localhost;dbname=forum;charset=utf8",
    "root", "",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

$dao = new UserDAO($pdo);
$u = new User();
$topicDAO = new TopicDAO($pdo);
$topicList = $topicDAO->find()->getAllAsArray();
var_dump($topicList);



echo render($controller,
["topicList"=>$topicList]);



?>
