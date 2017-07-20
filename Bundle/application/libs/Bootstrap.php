<?php

class Bootstrap {

    function __construct() {
        if (!isset($_GET['url'])) {
            echo 'url not found';
        } else {
            $url = explode('/', filter_var(rtrim($_GET['url'], '/')), FILTER_SANITIZE_URL);
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

}
