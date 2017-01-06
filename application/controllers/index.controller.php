<?php
/**
 * Created by PhpStorm.
 * User: wangy
 * Date: 05/01/2017
 * Time: 13:34
 */
namespace Sistr;
use F3il\Messenger;
use F3il\Page;

defined('SISTR') or die('Acces interdit');

class IndexController extends \F3il\Controller{

    public function __construct($actionName = 'index')
    {
        $this->setDefaultActionName($actionName);
    }

    public function indexAction(){
        $page=\F3il\Page::getInstance();
        $page->setTemplate('index');
        $page->setView('index');
        $form=new LoginForm("?controller=index&action=login");
        $form->getHtmlFile();
        $page->formulaire=$form;
        if(!$form->isSubmitted()){
            return;
        }
        $form->loadData($_POST);
        if(!$form->isValid()){
            \F3il\Messenger::setMessage("Login / mot de passe incorrect");
            return;
        }
    }


}