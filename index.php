<?php

define('SISTR', '');
define('ROOT_PATH', __DIR__);
define('APPLICATION_PATH', ROOT_PATH . '\application');
require_once '/framework/f3il.php';
require_once APPLICATION_PATH.'\controllers\utilisateurs.controller.php';
$UC= new UtilisateurController;
$UC->listerAction();
