<?php

class MessageDAO extends AbstractDAO{

public function __construct(PDO $pdo) {

    parent::__construct($pdo,"replies", Message::class);
    $this->foreignKeys = ["user","topic"];
}

public function hydrate(array $data){
    $reply = parent::hydrate($data);
    $userDAO = new UserDAO($this->pdo);
    $topicDAO = new TopicDAO($this->pdo);
    if($data["user_id"]>0){

        $user = $userDAO ->findOneById($data["user_id"])->getOneAsObject();
        $reply->setUser($user);
    }
    if($data["topic_id"]>0){

        $topic = $topicDAO ->findOneById($data["topic_id"])->getOneAsObject();
        $reply->setTopic($topic);
    }
   
    return $reply;

}

public function manageAssociation(Message $reply){
    $topic = $reply->getTopic();
    $user = $reply->getUser();
    
    if($user){ 
    $userDao = new UserDAO($this->pdo);
    $userDao->save($user);
    }
    if($topic){
        $topicDAO = new TopicDAO($this->pdo);
        $topicDAO->save($topic);
    }

}

public function update(EntityInterface $entity):void{

    /** @var Topic */
    $this->manageAssociation($entity);
    parent::update($entity);


}

public function insert (EntityInterface $entity):void{
    $this->manageAssociation($entity);
    parent::insert($entity);



}



}