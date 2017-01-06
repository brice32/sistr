<?php
namespace F3il;
defined('F3IL') or die('Acces interdit');

class Authentication {
    private static $_instance;
    protected $loginKey;
    protected $passwordKey;
    protected $idKey;
    
    /**
     * Modèle servant de délégué pour l'authentification
     * @var AuthenticationModel 
     */
    protected $authenticationModel = null;
    protected $user;
    
    const SESSION_KEY = 'f3il.authentication';
    
    /**
     * Constructeur privé 
     * 
     * @param \F3il\AuthenticationInterface $model
     */
    private function __construct(AuthenticationInterface $model) {
        $this->authenticationModel=$model;
        $this->loginKey=$model->auth_getLoginKey();
        $this->passwordKey=$model->auth_getPasswordKey();
        $this->idKey=$model->auth_getPasswordKey();
    }
    
    
    /**
     * Récupérateur d'instance 
     * 
     * @param \F3il\AuthenticationInterface $model
     * @return Authentication
     * @throws Error
     */
    public static function getInstance(AuthenticationInterface $model=null) {

        if (is_null(self::$_instance)) {
            if($model===null){
                throw new Error(" $model ne peux pas etre null avant creer ce constructure dans authentication.");
            }
            self::$_instance = new Authentication($model);
        }
        return self::$_instance;
    }
    
    
    /**
     * Vérifie si des données comportent les clés nécessaires à l'authentification
     * @param array $data
     * @return boolean
     */
    public function checkAuthenticationKeys(array $data) {
        if(!is_array($data)||!array_key_exists($this->idKey,$data)||!array_key_exists($this->loginKey,$data)||!array_key_exists($this->passwordKey,$data)){
            return false;
        }
        return true;
    }
    
    
    /**
     * Méthode appelée quand un utilisateur tente de se connecter
     * 
     * @param string $login
     * @param string $password
     * @return boolean
     * @throws Error
     */
    public function login($login,$password) {
        $this->user = $this->authenticationModel->auth_getUserByLogin($login);
        if(!$this->user) return false;

        if(!$this->checkAuthenticationKeys($this->user)){
            throw new Error('Modele Authentification');
        }

        if($this->user[$this->passwordKey]!=$password) return false;

        return true;
    }
    
}