<?php

function getRoutesInfos(string $page,
                         array $routes,): array
{

    if (array_key_exists($page, $routes)) {
        $controller = $routes[$page];

    } else {

        $controller = $page;
    };
    $pagePath = "controllers/$controller.php";

    if (!file_exists($pagePath)) {

        $pagePath = "controllers/not_found.php";
    }

    return[
        "controller"=>$controller,
        "controllerPath"=>$pagePath
    ];


}

/**
 * Calcul le rendu d'un modele et retourne ce content 
 * sous forme d'une chaîne de caractères
 *
 * @param string $template
 * @param array $params
 * @return void
 */
function getTemplateContent(string $template, array $params=[]){
    ob_start();
    $templatePath = "views/$template.php";

    $content = "Impossible de charger le modèle";
    if(file_exists($templatePath)){
        extract($params,EXTR_OVERWRITE);
        include $templatePath;
        $content = ob_get_clean();
    }
    return $content;
}

function render(string $template, array $params=[],string $layout = "gabarit"){

    $params["content"] = getTemplateContent($template,$params);
    return getTemplateContent($layout,$params);
}

function getLinkToRoute(string $route, array $query=[]){
    $queryString = '';
    foreach($query as $key => $value){
        $queryString .= "&$key=$value";
    }

    
    return "/index.php?page=$route$queryString";
};    
