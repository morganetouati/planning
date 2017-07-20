<?php

/* 
 * Model Principal
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Planning\Models;

class Model{
    private $db;
    protected function getDb()
    {
        $this->db = \PDOManager::getInstance()->getPdo();
        return $this->db;
    }
}