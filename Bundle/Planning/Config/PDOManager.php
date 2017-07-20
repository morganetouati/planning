<?php

/**
 * Singleton to connect database
 */
class Planning_Bdd_PDOManager {

    private static $instance = null;

    private function __construct() {
        
    }

    private function __clone() {
        
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Planning_Bdd_Connect();
        }
        return self::$instance;
    }

    public function getPdo() {
        require 'parameters.php';
        $pdo = new PDO('mysql:host=' . $parameters['host'] . ';dbname=' . $parameters['dbname'], $parameters['login'], $parameters['password']);
        return $pdo;
    }
}
