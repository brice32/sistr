<?php
namespace Sistr;
use F3il\Error;
use F3il\Messages;
use F3il\Messenger;

defined('SISTR') or die('Acces Interdit');

class UtilisateurController extends \F3il\Controller
{
    public function __construct($actionName='lister')
    {
        $this->setDefaultActionName($actionName);
    }



    public function listerAction()
    {
//        $conf = \F3il\Configuration::getInstance();
        $page = \F3il\Page::getInstance();
        $page->setTemplate("template-bt");
        $page->setView("utilisateur-liste");
//        $page->titre = 'lister des utilisateurs';

        $model = new UtilisateursModel();

        $page->utilisateurs = $model->lister();
        if($message=Messenger::getMessage()){
            \F3il\Messages::addMessage($message,0);
        }
//        Messages::addMessage("ici,UtilisateurController!",0);
        //$page->rendre();
    }

    public function editerAction(){
        echo __METHOD__;
        print_r($_POST);
        die("code pour vérifier qu'on envoie bien les bonnes données");
    }

    public function supprimerAction(){
       if(is_null(filter_input(INPUT_POST,'id'))||filter_input(INPUT_POST,'id')==false){
            throw new Error('supprimerAction ne peut pas trouvé id dans POST');
       }
       else{
           $model= new UtilisateursModel();
           $model->supprimer(filter_input(INPUT_POST,'id'));
           \F3il\Messenger::setMessage("Suppression effectuée");
           \F3il\HttpHelper::redirect('?controller=utilisateur&action=lister');

       }
    }

    public function creerAction(){
        $page=\F3il\Page::getInstance();
        $page->setTemplate("template-bt");
        $page->setView("form");
        $form=new UtilisateurForm(0);
        //"?controller=utilisateur&action=creer"
        $form->getHtmlFile();
        $page->formulaire=$form;
        $form->loadData(INPUT_POST);
        if(!$form->isValid()){
            \F3il\Messages::addMessage("Le formulaire n'est pas valide",2);
            return;
        }
        $page->formData=$form->getData();
        $mode = new UtilisateursModel();
        $mode->creer($form->getData());
        $nom=$page->formData['nom'];
        $prenom=$page->formData['prenom'];
        \F3il\Messenger::setMessage("L'utilisateur $nom $prenom a bien ete enregistre.");
        \F3il\HttpHelper::redirect('?controller=utilisateur&action=lister');
    }
}
