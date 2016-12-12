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
        $form=TestForm::getInstance();
        $form->getHtmlFile();
//        $page->_html=$form->getHtmlFile();
        $page->formulaire=$form;

    }

}