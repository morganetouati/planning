<?php

/*
 * FRONT "CONTROLLER"
 *
 *
 */
$autoload = require 'vendor/autoload.php';
$autoload->add('Planning', array(__DIR__ . '/Bundle/'), false);
//var_dump($autoload).die('autoload');
session_start();
//resources css
$urlresource = "/assets/";
define('URLRESOURCE', $urlresource);
chdir(__DIR__);
define('VIEWS_PATH', __DIR__.'/Bundle/application/views/');
define('LIBS_PATH', __DIR__.'/Bundle/application/libs/');
define('PHP_PATH', __DIR__.'/Bundle/application/php/');
define('CONTROLLER_PATH', __DIR__.'/Bundle/application/controllers/');
define('MODEL_PATH', __DIR__.'/Bundle/application/models/');
define('FILEEXT_PATH', __DIR__.'/Bundle/application/');
//define('CONTROLLER_PATH', __DIR__.'/Bundle/application/controllers/');
//require_once('Bundle/application/router.php');