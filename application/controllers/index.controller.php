<?php
/**
 * Created by PhpStorm.
 * User: wangy
 * Date: 05/01/2017
 * Time: 13:34
 */
namespace Sistr;
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
    }


}