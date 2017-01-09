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
        $form=new LoginForm("?controller=index&action=index");
        $form->getHtmlFile();
        $page->formulaire=$form;
//        if ($message = Messenger::getMessage()) {
//            \F3il\Messages::addMessage($message, 0);
//        }
        if(!$form->isSubmitted()){
            return;
        }
        $form->loadData(INPUT_POST);

//        if(!$form->isValid()){
//            \F3il\Messenger::setMessage("Login / mot de passe incorrect");
//            if ($message = Messenger::getMessage()) {
//                \F3il\Messages::addMessage($message, 0);
//            }
//            return;
//        }
        $authentication=\F3il\Authentication::getInstance();
        if(!$authentication->login($form->login,$form->motdepasse)){
            \F3il\Messenger::setMessage("Login / mot de passe incorrect");
            if ($message = Messenger::getMessage()) {
                \F3il\Messages::addMessage($message, 0);
            }
            return;
        }
        echo "Authentification reussie";
        \F3il\HttpHelper::redirect('?controller=utilisateur&action=lister');
    }


}