<?php 

class AddressDAO  extends AbstractDAO{

    public function __construct(PDO $pdo) {

        parent::__construct($pdo,"addresses", Address::class);
    
    }

    public function countPersonByAddresses(){
        $sql = 'SELECT a.id, a.street, a.zipcode, a.city, 
                COUNT (p.id) as nb_personne
                FROM addresses as a 
                LEFT JOIN persons as p 
                ON a.id = p.id_address
                GROUP BY  a.id';

        $query = $this->pdo->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    
}


?>