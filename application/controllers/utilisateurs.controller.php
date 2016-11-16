<?php
defined('F3IL') or die('Acces Interdit');
class UtilisateurController{
    public function listerAction(){
        $page=new Page();
        $page->setTemplate("template-a");
        $page->setView("vue1");
        $page->titre="liste des utilisateurs";
        $page->rendre();
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

