<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->render('index/index');
    }

    /* public function home() {
      $first_name = 'morgane';
      $last_name = 'toto';
      require_once VIEWS_PATH.'pages/home.php';
      }

      public function error() {
      require_once VIEWS_PATH.'error.php';
      } */
}
