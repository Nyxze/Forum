<?php 
require "autoloader.php";
$id = $_GET['id'];

$pdo = new PDO(
    "mysql:host=localhost;dbname=forum;charset=utf8",
    "root", "",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

$topicDAO = new TopicDAO($pdo);
$messageDAO = new MessageDAO($pdo);
$userDAO = new UserDAO($pdo);
$topic = $topicDAO->findOneById($id)->getOneAsObject();

$messageList = $messageDAO->find(["topic_id"=>$id],["date"=>"desc"])->getAllAsObject();
$title = $topic->getTitle();



$message = new Message();
$user = new User();

$isPosted = filter_has_var(INPUT_POST, "submit");
$filters = [
    "username" =>FILTER_SANITIZE_STRING,
    "text"=>FILTER_SANITIZE_STRING
 
];
$inputs = filter_input_array(INPUT_POST, $filters);

if($isPosted){

    try{
        $user->setUsername($inputs["username"]);
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

// var_dump($messageTopic);
echo render($controller,
["messageList"=>$messageList,
"title"=>$title]);
 


?>
