<?php
/**
 * Created by PhpStorm.
 * User: wangyc
 * Date: 12/12/2016
 * Time: 03:07
 */
namespace F3il;


defined("F3IL") or die("Access interdit form.php");

class Form{
    protected $_html;
    protected $_fields=array();

    public function __construct()
    {
    }

    public function render(){
        require $this->_html;
    }

    public function getHtmlFile(){
        $nomDeClass=get_class($this);
        $nombre1=strrpos($nomDeClass,"\\");
        if($nombre1==false){
        $nombre1=0;
        }
        else{
            $nombre1++;
        }
        $nom=substr($nomDeClass,$nombre1);
        $nom1=substr($nomDeClass,$nombre1);
        if($nombre=strrpos($nom,'Controller',1)){
            $nom=substr($nomDeClass,$nombre1,$nombre);
            $this->_html=APPLICATION_PATH."/controllers/".$nom.".controller.php";
        }else if($nombre=strrpos($nom,'Form',1)){
            $nom=substr($nomDeClass,$nombre1,$nombre);
            $this->_html=APPLICATION_PATH."/forms/html/".$nom.".form-html.php";
        }else if($nombre=strrpos($nom,'Helper',1)){
            $nom=substr($nomDeClass,$nombre1,$nombre);
            $this->_html=APPLICATION_PATH."/helpers/".$nom.".helper.php";
        }else if($nombre=strrpos($nom,'Model',1)){
            $nom=substr($nomDeClass,$nombre1,$nombre);
            $this->_html=APPLICATION_PATH."/models/".$nom.".model.php";
        }else{
            throw new Error("form.php ne peut pas trouve le class $nomDeClass");
        }
        if(!is_readable($this->_html)){
            throw new Error("fichier introuvable si $this->_html n'est pas lisible $nombre $nom1");
        }
    }

    public function addFormField(Field $field){
        if(array_key_exists($field->name,$this->_fields)){
            throw new \F3il\Error("Champ de formulaire déjà existant");
        }else{
            $this->_fields[$field->name]=$field;
        }
    }

    public function fLabel($fieldName){
        if(!array_key_exists($fieldName,$this->_fields)){
            throw new \F3il\Error("$fieldName n'est pas dans".'$_fields');
        }
        else{
            echo $this->_fields[$fieldName]->label ;
        }
    }

    public function fName($fieldName){
        if(!array_key_exists($fieldName,$this->_fields)){
            throw new \F3il\Error("$fieldName n'est pas dans".'$_fields');
        }
        else{
            echo $this->_fields[$fieldName]->name ;
        }
    }

    public function fValue($fieldName){
        if(!array_key_exists($fieldName,$this->_fields)){
            throw new \F3il\Error("$fieldName n'est pas dans".'$_fields');
        }
        else{
            if($this->_fields[$fieldName]->value!=null){
                return $this->_fields[$fieldName]->value;
            }else{
                return $this->_fields[$fieldName]->defaultValue;
            }
        }
    }
}