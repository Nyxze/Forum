<?php 

require "autoloader.php";

$isPosted = filter_has_var(INPUT_POST, "submit");
$filters = [
    "title" =>FILTER_SANITIZE_STRING,
    "text"=>FILTER_SANITIZE_STRING,
    "username"=>FILTER_SANITIZE_STRING,
];
$inputs = filter_input_array(INPUT_POST, $filters);


$pdo = new PDO(
    "mysql:host=localhost;dbname=forum;charset=utf8",
    "root", "",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);


$topicDAO = new TopicDAO($pdo);
$messageDAO = new MessageDAO($pdo);
$userDAO = new UserDAO($pdo);
$topic = new Topic();
$message = new Message();
$user = new User();

// $dao = new PersonDAO($pdo);
// $addressDAO = new AddressDAO($pdo);
// $p = new Person();
// $a = new Address();


if($isPosted){

    try{
        $user->setUsername($inputs["username"]);
        $topic->setTitle($inputs["title"])->setUser($user);
        $message->setText($inputs["text"])->setTopic($topic)->setUser($user)->setDate(date("Y/m/d/h/i/sa"));
        
        $userDAO->save($user);
        $messageDAO->save($message);
        $topicDAO->save($topic);
        header("location:".getLinkToRoute("show-topic",["id"=>$topic->getId()]));
        // $message->setText($inputs["text"]);
        // $message->setTopic($topic);
        // var_dump($topic);
        // var_dump($message);
        
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
}


echo render($controller,[""]);


?>