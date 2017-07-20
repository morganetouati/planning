<?php
class Error extends Controller {
    function __construct() {
        parent::__construct();
        echo 'vous avez une erreur';
        $this->view->msg = "cette page n'existe pas";
        $this->view->render('error/index');
    }
}
