<?php

namespace F3il;

defined("F3IL") or die("Acess interdit framework/application/php");

class Application
{
    private static $_instance;
    protected $controllerName;
    protected $actionName;

    /**
     * Constructeur
     *
     * @param string $iniFile : chemin du fichier INI de confuration
     */
    private function __construct($iniFile)
    {
        \F3IL\Configuration::getInstance($iniFile);
        //APPLICATION_PATH.'\configuration.ini' remplace cette address de ficher par $iniFile
    }

    /**
     * Retourne l'instance de Application
     *
     * @param string $iniFile : chemin du fichier INI de configuration
     * @return Application
     */
    public static function getInstance($iniFile = "")
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Application($iniFile);
        }
        return self::$_instance;
    }

    /**
     * Méthode principale d'exécution de l'application Web
     * - Analyse l'URL de la requête
     * - Route la requête vers l'action de contrôleur demandéé
     * - Affiche la page.
     */
    public function run()
    {
        $this->controllerName = filter_input(INPUT_GET, 'controller');
        require_once APPLICATION_PATH . '\controllers\\' . $this->controllerName . '.controller.php';
        $this->actionName = filter_input(INPUT_GET, 'action');
        $controllerClass = "\\" . APPLICATION_NAMESPACE . "\\" . ucfirst($this->controllerName) . 'Controller';
        $controller = new $controllerClass;
        $this->actionName = filter_input(INPUT_GET, 'action');
        $actionMethod = $this->actionName . 'Action';
        $controller->$actionMethod();
        $page = \F3il\Page::getInstance();
        $page->rendre();
    }

    /**
     * Getter pour récupérer l'instance de la Page
     * Equivalent à Page::getInstance()
     *
     * @return Page
     */
    public function getPage()
    {
        return \F3il\Page::getInstance();
    }

    /**
     * Getter pour récupérer l'instance de la Configuration
     * Equivalent à Configuration::getInstance()
     *
     * @return Configuration
     */
    public function getConfiguration()
    {
        return \F3il\Configuration::getInstance();
    }

}
