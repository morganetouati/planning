<?php

/*
 * Requiert le fichier correspondant au nom du contrôleur
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */

function call($controller, $action) {
    $controller_file = 'Bundle/application/controllers/' . $controller . '_controller.php';
    //on créée une nouvelle instance du controller
    if (!file_exists($controller_file)) {
        var_dump($controller_file) . die('controller introuvable');
    } else {
        require $controller_file;
    }
    switch ($controller) {
        case 'pages':
            $controller = new PagesController();
            break;
    }
    //on appelle l'action
    $controller->{ $action }();
}

//on liste les controllers et leur actions
$controllers = array(
    'pages' => ['login', 'error'],
    'pages' => ['home', 'error'],
    'pages' => ['forgotpassword', 'error'],
    'pages' => ['logout', 'error'],
    'pages' => ['time', 'error']
);

$router = new Planning_Router();
try {
    $routage = $router->routing($_SERVER['REQUEST_URI']);
    var_dump($routage).die('routage');
//check si le controller et l'action sont autorisés sinon redirection sur une erreur
//creer methode check route
   $router->check_route($routage, $controllers);
} catch (Exception $e) {
    call('error', 'error'); //@todo creer controller error
}