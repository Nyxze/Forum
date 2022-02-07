<?php
session_start();
session_regenerate_id(true);
//Import des lib
require "lib/framework.php";

// Récupération du nom du contrôleur
// default = "intro.php"

$page = filter_input(INPUT_GET, "page") ?? "home";
$isLogin = isset($_SESSION["user"]);

//Table de routage
$routes = [
    "forum" => "forum",
    "show-topic"=>"show-topic"
];

$securedRoutes = [
    "contacts", "form-copy", "tableau","form"
];

// Gestion du routage
// retourne pagePath et controller
// 
extract(getRoutesInfos($page,$routes), EXTR_OVERWRITE);
require $controllerPath;

