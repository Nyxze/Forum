<?php 
require "autoloader.php";

$pdo = new PDO(
    "mysql:host=localhost;dbname=forum;charset=utf8",
    "root", "",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

$topicDAO = new TopicDAO($pdo);
$topicList = $topicDAO->findAll()->getAllAsObject();



echo render($controller,
["topicList"=>$topicList]);



?>
