<?php

namespace F3il;

defined('F3IL') or die('Acces Interdit');

class Page {

    protected $templateFile;
    protected $viewFile;
    protected $data= array();
    private static $_instance;
        
        private function __construct() {
        
    }

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new Page();
        }
        return self::$_instance;
    }

    
    public function setTemplate($templateFile) {
        if (is_readable(APPLICATION_PATH . '\templates\\' . $templateFile . '.template.php')) {
            $this->templateFile = APPLICATION_PATH . '\templates\\' . $templateFile . '.template.php';
        }
        else{
            die('templateFile erreur:'.APPLICATION_PATH. '\templates\\' . $templateFile . '.template.php');
        }
    }

    public function setView($viewFile) {
        if (is_readable(APPLICATION_PATH. '\views\\' . $viewFile . '.view.php')) {
            $this->viewFile = APPLICATION_PATH. '\views\\' . $viewFile . '.view.php';
        }
          else{
            die('viewFile erreur:'.APPLICATION_PATH. '\views\\' . $viewFile . '.view.php');
        }
    }

    private function insertView() {
        require $this->viewFile;
    }

    public function rendre() {
        if(isset($this->templateFile)&&isset($this->viewFile)){
            require $this->templateFile;
        }
    }
    
    public function __get($name) {
        if(isset($this->data[$name])){
            return $this->data[$name];
        }
        die("$name n'existe pas dans array data");
    }
    public function __set($name, $value) {
        $this->data[$name]=$value;
    }
    public function __isset($name) {
        return isset($this->data[$name]);
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

