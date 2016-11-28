<?php

namespace F3il;

defined("F3IL") or die("Acess interdit framework/application/php");

class Application {
    private static $_instance;
    protected $controllerName;
    protected $actionName;

    private function __construct() {
    \F3IL\Configuration::getInstance(APPLICATION_PATH.'\configuration.ini');
    }

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new Application();
        }
        return self::$_instance;
    }

    public function run() {
        $this->controllerName = filter_input(INPUT_GET, 'controller');
        require_once APPLICATION_PATH . "\controllers\\" . $this->controllerName . '.controller.php';
        $this->actionName = filter_input(INPUT_GET, 'action');
        $controllerClass = "\\" . APPLICATION_NAMESPACE . "\\" . ucfirst($this->controllerName) . 'Controller';
        $controller = new $controllerClass;
        $this->actionName = filter_input(INPUT_GET, 'action');
        $actionMethod = $this->actionName . 'Action';
        $controller->$actionMethod();
    }

}
