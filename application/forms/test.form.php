<?php
/**
 * Created by PhpStorm.
 * User: wangyc
 * Date: 12/12/2016
 * Time: 03:51
 */
namespace Sistr;
use F3il\Form;

defined('SISTR') or die('Acces interdit');

class TestForm extends \F3il\Form {

    protected static $_instance;

    public function __construct()
    {
       parent::__construct();
        $this->addFormField(new \F3il\Field('email', 'Email',null,true));
        $this->addFormField(new \F3il\Field('age', 'Age'));
    }

    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance=new \Sistr\TestForm();
        }
        return self::$_instance;
    }
}