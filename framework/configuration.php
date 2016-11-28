<?php
namespace F3il;
defined("F3IL") or die("Access interdit configuration.php");

class Configuration {

    private static $_instance;
    protected $data = array();

    private function __construct($iniFile) {
        if (is_readable($iniFile)) {
            if ($this->data=parse_ini_file($iniFile)) {
                print_r($data['nom']);
            } else {
                die('ce qui a été lu vaut FALSE/configuration');
            }
        } else {
            die("le fichier $iniFile ne peut pas lire!");
        }
    }

    public static function getInstance($iniFile = "") {
        if (is_null(self::$_instance)) {
            self::$_instance = new Configuration($iniFile);
        }
        return self::$_instance;
    }

    public function __get($name) {
        if(isset($this->data[$name])){
            return $this->data[$name];
        } else {
            die("$name n'existe pas dans array data");
        }
    }

}
