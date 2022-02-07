<?php 
require "models/user-auth.php";
$isPosted = isset($_POST["submit"]);
$errors = [];

if ($isPosted) {
    $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_DEFAULT);
    // Validation de la saisie
    if (empty($login)) {
        array_push($errors, 'Put a ID');
    }
    if (empty($password)) {
        array_push($errors,'Put a PSW>');
    }    
    



    if($login="Rene"&& $password="123"){
         $_SESSION["user"] = $login;
         $redirect = $_SESSION["redirectPage"] ?? "forum";
         unset($_SESSION["redirectPage"]);
        header("location:".getLinkToRoute($redirect));
        exit;
    }else{
        array_push($errors,'Incorrect infos');
    };

}




echo render($controller,[
    "title"=>"login",
    "hasErrors"=>count($errors)>0,
    "errors" => $errors
]);



?>