<?php

class TopicDAO extends AbstractDAO{

public function __construct(PDO $pdo) {

    parent::__construct($pdo,"topics", Topic::class);
    $this->foreignKeys = ["user"];
}

public function hydrate(array $data){
    $topic = parent::hydrate($data);
    $userDAO = new UserDAO($this->pdo);
    if($data["user_id"]>0){

        $user = $userDAO ->findOneById($data["user_id"])->getOneAsObject();
        $topic->setUser($user);
    }
   
    return $topic;

}

public function manageAssociation(Topic $topic){
    $user = $topic->getUser();
    
    if($user){ 
    $userDao = new UserDAO($this->pdo);
    $userDao->save($user);
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