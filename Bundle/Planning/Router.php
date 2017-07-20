<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Planning_Router {

    public function routing($request) {
        if(isset($request))
        {
            $url = explode('/', $request);
            //var_dump($url).die('url');
        }
        //@todo explode('/', $request); compter les slash count(>=2) 
        if (isset($_GET['controller']) && isset($_GET['action'])) {
            $controller = $_GET['controller'];
            $action = $_GET['action'];
        } 
        else {
            $controller = 'pages';
            $action = 'home';
        }
        return array('controller' => $controller, 'action' => $action);
    }

    public function check_route($routage, $authorized_controllers) {
        if (array_key_exists($controller, $controllers)) {
            if (in_array($action, $controllers[$controller])) {
                call($controller, $action);
            } else {
                throw new Exception("router failed");
            }
        }
    }
}
