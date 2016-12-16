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

class TestForm extends \F3il\Form
{

    protected static $_instance;

    public function __construct($action)
    {
        parent::__construct($action);
        $this->addFormField(new \F3il\Field('email', 'Email', null, true));
        $this->addFormField(new \F3il\Field('age', 'Age'));
    }

    public function ageTestFilter($value)
    {
        return filter_var($value,FILTER_SANITIZE_STRING);
    }

    public function ageValidator($age){
//        die("ici,TestForm::ageValidator()");
        if(filter_var($age,FILTER_VALIDATE_INT)){
            if($age>=18&&$age<=35){
                return true;
            }
            else{
                $this->addMessage('age',"L'âge doit être compris entre 18 et 35");
            }
        }else{
            $this->addMessage('age',"L'âge doit être un nombre entier");
        }
        return false;
    }

    public function messageRenderer($message)
    {
        ?>
        <p class="text-danger text-right"><?php echo $message; ?></p>
        <?php
    }
}