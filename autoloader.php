<?php

function autoloader($class)
{
    $path = "models/{$class}.php";
    if (file_exists($path)) {
        include_once $path;
    } else {
        throw new Exception("Le fichier {$class} est introuvable");
    }
}
spl_autoload_register("autoloader");
