<?php

class PersonDAO extends AbstractDAO{

public function __construct(PDO $pdo) {

    parent::__construct($pdo,"persons", Person::class);
    $this->foreignKeys = ["address"];

}

public function hydrate(array $data){
    $person = parent::hydrate($data);
    $addressDAO = new AddressDAO($this->pdo);
    if($data["address_id"]>0){

        $address = $addressDAO ->findOneById($data["address_id"])->getOneAsObject();
        $person->setAddress($address);
    }
   
    return $person;

}

public function manageAssociation(Person $person){
    $address = $person->getAddress();
    
    if($address){ 
    $addressDAO = new AddressDAO($this->pdo);
    $addressDAO->save($address);
    }

}

public function update(EntityInterface $entity):void{

    /** @var Person */
    $this->manageAssociation($entity);
    parent::update($entity);


}

public function insert (EntityInterface $entity):void{
    $this->manageAssociation($entity);
    parent::insert($entity);



}
}