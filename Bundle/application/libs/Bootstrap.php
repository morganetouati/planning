<?php

class Bootstrap {
    function __construct() {
        isset($_GET['url']) ? $_GET['url'] : null;
        $url = explode('/', filter_var(rtrim($_GET['url'], '/')), FILTER_SANITIZE_URL);
        print_r($url);

        if (empty($url[0])) {
            require CONTROLLER_PATH . 'index.php'; //si url est vide redirection sur controllers/index.php
            $controller = new Index(); //instantiation d'un nouvel index
            return FALSE;
        }

        $file = CONTROLLER_PATH . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            require CONTROLLER_PATH . 'error.php';
            $controller = new Error();
            return false;
        }

        $controller = new $url[0];

        if (isset($url[2])) {
            $controller->{$url[1]}($url[2]);
        } else {
            if (isset($url[1])) {
                $controller->{$url[1]}();
            }
        }
    }

}
