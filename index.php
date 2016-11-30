<?php

define('SISTR', '');
define('ROOT_PATH', __DIR__);
define('APPLICATION_PATH', ROOT_PATH . '/application');
define('APPLICATION_NAMESPACE', 'Sistr');
require_once '/framework/f3il.php';
//require_once APPLICATION_PATH.'\controllers\utilisateur.controller.php';
//$UC= new UtilisateurController;
//$UC->listerAction();
$app = \F3il\Application::getInstance(APPLICATION_PATH . '\configuration.ini');
$app->run();
