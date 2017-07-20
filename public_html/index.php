<?php
require '../vendor/front.php';


//var_dump(__FILE__,__LINE__).die('error');
/*if (isset($_GET['controller']) && isset($_GET['action'])){
    $controller = $_GET['controller'];
    $action = $_GET['action'];
}
else{
    $controller = 'pages';
    $action = 'home';
}*/

require LIBS_PATH . 'Bootstrap.php';
require LIBS_PATH . 'Model.php';
require LIBS_PATH . 'Controller.php';
require LIBS_PATH . 'View.php';
//require FILEEXT_PATH . 'layout.php';
$app = new Bootstrap();