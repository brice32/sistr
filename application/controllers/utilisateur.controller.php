<?php
namespace Sistr;
defined('F3IL') or die('Acces Interdit');

class UtilisateurController extends \F3il\Controller
{
    public function __construct($actionName='lister')
    {
        $this->setDefaultActionName($actionName);
    }



    public function listerAction()
    {
        $conf = \F3il\Configuration::getInstance();
        $page = \F3il\Page::getInstance();
        $page->setTemplate("template-a");
        $page->setView("vue1");
        $page->titre = $conf->nom;
        //$page->rendre();
    }
}
