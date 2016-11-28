<?php

namespace F3il;

defined('F3IL') or die('Acces Interdit');

class Page
{

    protected $templateFile;
    protected $viewFile;
    protected $data = array();
    private static $_instance;

    /**
     * Constructeur
     *
     */
    private function __construct()
    {

    }

    /**
     * Méthode de récupération de l'instance de Page
     *
     * @return Page
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Page();
        }
        return self::$_instance;
    }

    /**
     * Précise le template à utiliser
     *
     * @param string $templateName : racine du nom du template à utiliser
     * @return $this
     */
    public function setTemplate($templateFile)
    {
        if (is_readable(APPLICATION_PATH . '\templates\\' . $templateFile . '.template.php')) {
            $this->templateFile = APPLICATION_PATH . '\templates\\' . $templateFile . '.template.php';
        } else {
            throw new Error('templateFile erreur:' . APPLICATION_PATH . '\templates\\' . $templateFile . '.template.php');
        }
    }

    /**
     * Précise la vue à utiliser
     *
     * @param string $viewName : racine du nom de la vue à utiliser
     * @return $this
     */
    public function setView($viewFile)
    {
        if (is_readable(APPLICATION_PATH . '\views\\' . $viewFile . '.view.php')) {
            $this->viewFile = APPLICATION_PATH . '\views\\' . $viewFile . '.view.php';
        } else {
            throw new Error('viewFile erreur:' . APPLICATION_PATH . '\views\\' . $viewFile . '.view.php');
        }
    }

    /**
     * Permet d'insérer la vue dans le template
     */
    private function insertView()
    {
        require $this->viewFile;
    }

    /**
     * Effectue le rendu du template et de la vue
     *
     */
    public function rendre()
    {
        if (isset($this->templateFile) && isset($this->viewFile)) {
            require $this->templateFile;
        }
    }

    /**
     * Getter pour les propriétés dynamiques de Page
     *
     * @param string $name : nom de la propriété dynamique
     * @return mixed
     */
    public function __get($name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }
        throw new Error("$name n'existe pas dans array data");
    }

    /**
     * Setter pour les propriétés dynamiques de Page
     *
     * @param string $name : nom de la propriété dynamique
     * @param mixed $value : valeur de la propriété dynamique
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * Méthode permettant d'appeler la fonction isset() sur les prorpriétés dynamiques
     *
     * @param string $name : nom de la propriété dynamique
     * @return boolean
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

