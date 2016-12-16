<?php
/**
 * Created by PhpStorm.
 * User: wangyc
 * Date: 12/12/2016
 * Time: 03:07
 */
namespace F3il;


defined("F3IL") or die("Access interdit form.php");

class Form
{
    protected $_html;
    protected $_fields = array();
    protected $_action;
    protected $_missingFields = array();



    public function __construct($action)
    {
        $this->_action = $action;
    }

    public function render()
    {
        require $this->_html;
    }

    public function getHtmlFile()
    {
        $nomDeClass = get_class($this);
        $nombre1 = strrpos($nomDeClass, "\\");
        if ($nombre1 == false) {
            $nombre1 = 0;
        } else {
            $nombre1++;
        }
        $nom = substr($nomDeClass, $nombre1);
        $nom1 = substr($nomDeClass, $nombre1);
        if ($nombre = strrpos($nom, 'Controller', 1)) {
            $nom = substr($nomDeClass, $nombre1, $nombre);
            $this->_html = APPLICATION_PATH . "/controllers/" . $nom . ".controller.php";
        } else if ($nombre = strrpos($nom, 'Form', 1)) {
            $nom = substr($nomDeClass, $nombre1, $nombre);
            $this->_html = APPLICATION_PATH . "/forms/html/" . $nom . ".form-html.php";
        } else if ($nombre = strrpos($nom, 'Helper', 1)) {
            $nom = substr($nomDeClass, $nombre1, $nombre);
            $this->_html = APPLICATION_PATH . "/helpers/" . $nom . ".helper.php";
        } else if ($nombre = strrpos($nom, 'Model', 1)) {
            $nom = substr($nomDeClass, $nombre1, $nombre);
            $this->_html = APPLICATION_PATH . "/models/" . $nom . ".model.php";
        } else {
            throw new Error("form.php ne peut pas trouve le class $nomDeClass");
        }
        if (!is_readable($this->_html)) {
            throw new Error("fichier introuvable si $this->_html n'est pas lisible $nombre $nom1");
        }
    }

    public function addFormField(Field $field)
    {
        if (array_key_exists($field->name, $this->_fields)) {
            throw new \F3il\Error("Champ de formulaire déjà existant");
        } else {
            $this->_fields[$field->name] = $field;
        }
    }

    public function fLabel($fieldName)
    {
        if (!array_key_exists($fieldName, $this->_fields)) {
            throw new \F3il\Error("$fieldName n'est pas dans" . '$_fields');
        } else {
            echo $this->_fields[$fieldName]->label;
        }
    }

    public function fName($fieldName)
    {
        if (!array_key_exists($fieldName, $this->_fields)) {
            throw new \F3il\Error("$fieldName n'est pas dans" . '$_fields');
        } else {
            echo $this->_fields[$fieldName]->name;
        }
    }

    public function fValue($fieldName)
    {
        if (!array_key_exists($fieldName, $this->_fields)) {
            throw new \F3il\Error("$fieldName n'est pas dans" . '$_fields');
        } else {
            if ($this->_fields[$fieldName]->value != null) {
                return $this->_fields[$fieldName]->value;
            } else {
                return $this->_fields[$fieldName]->defaultValue;
            }
        }
    }

    public function getAction()
    {
        return $this->_action;
    }

    public function loadData($source)
    {
        switch (gettype($source)) {
            case 'integer':
                $this->loadDataFromInput($source);
                break;
            case 'array':
                $this->loadDataFromArray($source);
                break;
            default:
                throw new \F3il\Error("Error pour source d'un type incorrect form loadData");
        }
    }

    protected function loadDataFromInput($source)
    {
        foreach ($this->_fields as $field) {
            if (filter_input($source, $field->name)) {
                $trim = trim(filter_input(INPUT_POST, $field->name));
                $trim = $this->applyFilter($field->name, $trim);
                $field->value = $trim;
            } else {
                $this->_missingFields[] = $field->name;
            }
        }
    }

    protected function applyFilter($fieldName, $rawValue)
    {
        $fieldName = str_replace('-', '', lcfirst(ucwords($fieldName, '-'))) . 'Filter';
        if (method_exists($this, $fieldName)) {
            return $this->$fieldName($rawValue);
        } else {
            return $rawValue;
        }

    }

    protected function loadDataFromArray($source)
    {
        foreach ($this->_fields as $field) {
            if (array_key_exists($field->name, $source)) {

                $trim = trim(filter_var($source[$field->name]->value));
                $trim = $this->applyFilter($field->name, $trim);
                $field->value = $trim;
            } else {
                $this->_missingFields[] = $field->name;
            }
        }
    }

    public function isValid(){
        $valid = true;
        foreach ($this->_fields as $field) {
            if(in_array($field->name,$this->_missingFields)){
                $valid=false;
            }
            if(trim($field->value)!=null||$field->required){
                $fieldName=$field->name;
                $validator = str_replace('-', '', lcfirst(ucwords($fieldName, '-'))) . 'Validator';
                if(method_exists($this,$validator)){
                    $valid=$this->$validator($field->value)&&$valid;
                }

            }
        }
        return $valid;
    }

    public function addMessage($fieldName,$message){
        if(array_key_exists ( $fieldName , $this->_fields )){
            $this->_fields[$fieldName]->addMessage($message);
        }
        else{
            throw new \F3il\Error("Les champ $fieldName n'existe pas!");
        }
    }

    public function getValidationMessage($fieldName){
        if(array_key_exists ( $fieldName , $this->_fields )){
            return $this->_fields[$fieldName]->getMessages();
        }
        else{
            throw new Error("champ non présent dans le formulaire si $fieldName de correspond pas à un champ du formulaire. getValidationMessage");
        }
    }

    public function messageRenderer($message){
        echo '<p>'.$message.'</p>';
    }

    public function fMessages($fieldName){
        if(array_key_exists ( $fieldName , $this->_fields )){
            foreach($this->_fields[$fieldName]->getMessages() as $message){
                $this->messageRenderer($message);
            }
        }
        else{
            throw new Error("le champ n'existe pas $fieldName. fMessage");
        }
    }
}