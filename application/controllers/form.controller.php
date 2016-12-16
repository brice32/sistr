<?php
/**
 * Created by PhpStorm.
 * User: wangyc
 * Date: 12/12/2016
 * Time: 03:56
 */
namespace Sistr;

use F3il\Controller;
use F3il\Form;

defined('SISTR') or die('Acces interdit');

class FormController extends \F3il\Controller{

    public function formAction(){
        $page=\F3il\Page::getInstance();
        $page->setTemplate("template-bt");
        $page->setView("form");
        $form=new TestForm("?controller=form&action=form");
        $form->getHtmlFile();
        $page->formulaire=$form;
        $form->loadData(INPUT_POST);
        if($form->isValid()){
            \F3il\Messages::addMessage("Valide",0);
            $form->valide="Valide";
        }else{
            \F3il\Messages::addMessage("Non valide",2);
            $form->valide="Non valide";
        }
        $page->formData=$form->getData();
    }

}