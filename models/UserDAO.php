<?php

class UserDAO extends AbstractDAO{

public function __construct(PDO $pdo) {

    parent::__construct($pdo,"users", User::class);

}


function authenticateUser(string $login, string $password): bool
{
    $sql = "SELECT user_password FROM users WHERE username =?";
    $statement = $this->pdo->prepare($sql);
    $statement->execute([$login]);
    $user = $statement->fetch();
    if($user === false){
        return false;
    }
    return password_verify($password, $user->user_password);

}

function checkUserExists(string $login)
{
    $sql = "SELECT * FROM users WHERE (login=?)";
    $statement = $this->pdo->prepare($sql);
    return $statement->execute([$login]);

}


}

