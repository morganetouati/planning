<?php
class Help extends Controller {

    function __construct() {
        parent::__construct();
        echo 'on est dans le help<br />';
    }
    
    public function other($arg = false) {
        echo 'nous sommes dans autre<br />';
        echo 'Options : ' . $arg . '<br />';
        require MODEL_PATH . 'help_model.php';
        $model = new Help_Model();
    }

}