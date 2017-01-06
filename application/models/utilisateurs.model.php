<?php
namespace Sistr;

use F3il\Database;

defined('SISTR') or die('Acces interdit');

class UtilisateursModel implements \F3il\AuthenticationInterface
{
    public function lister()
    {
        $db = \F3il\Database::getInstance();

        $sql = "SELECT * FROM utilisateurs ORDER by nom, prenom";
        try {
            $req = $db->prepare($sql);
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\SqlError($sql, $req, $ex);
        }
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function supprimer($id)
    {
        $db = \F3il\Database::getInstance();

        $sql = "DELETE FROM utilisateurs WHERE id = :id";
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();

        } catch (\PDOException $ex) {
            die('Erreur SQL ' . $ex->getMessage());
        }
    }

    public function creer(array $data)
    {
        $db = \F3il\Database::getInstance();
        $sql = "INSERT INTO utilisateurs SET "
            . " nom = :nom"
            . ", prenom = :prenom"
            . ", email = :email"
            . ", login = :login"
            . ", motdepasse = :motdepasse"
            . ", creation = '" . date('Y-m-d H:i:s') . "'";
        $req = $db->prepare($sql);
        $req->bindValue(':nom', $data['nom']);
        $req->bindValue(':prenom', $data['prenom']);
        $req->bindValue(':email', $data['email']);
        $req->bindValue(':login', $data['login']);
        $req->bindValue(':motdepasse', $data['motdepasse']);
        try {
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }
    }

    public function loginExistant($login, $id)
    {
        $db = \F3il\Database::getInstance();
        if ($id != 0) {
            $sql = "SELECT COUNT(*) FROM `utilisateurs` WHERE login = :login"
                . ", id <> :id";
            try {
                $req = $db->prepare($sql);
                $req->bindValue(':login', $login);
                $req->bindValue(':id', $id);
                $req->execute();
            } catch (\PDOException $ex) {
                die('Erreur SQL ' . $ex->getMessage());
            }
        } else {
            $sql = "SELECT COUNT(*) FROM `utilisateurs` WHERE login = :login";
            try {
                $req = $db->prepare($sql);
                $req->bindValue(':login', $login);
                $req->execute();
            } catch (\PDOException $ex) {
                die('Erreur SQL ' . $ex->getMessage());
            }
        }
        $boolean = $req->fetch(\PDO::FETCH_ASSOC);
        if ($boolean['COUNT(*)'] == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function lire($id)
    {
        $db = \F3il\Database::getInstance();

        $sql = "SELECT * FROM `utilisateurs` WHERE id = :id";

        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();
        } catch (\PDOException $ex) {
            die('Erreur SQL ' . $ex->getMessage());
        }
        return $req->fetch(\PDO::FETCH_ASSOC);
    }

    public function mettreAJour($data)
    {
        $db = \F3il\Database::getInstance();
        $sql = "UPDATE `utilisateurs` SET "
            . " nom = :nom "
            . ", prenom = :prenom "
            . ", login = :login ";
        if (!empty($data['motdepasse'])) {
            $sql .= ", motdepasse = :motdepasse "
                . ", creation = :creation";
        }

        $sql .= " WHERE id= :id";

        $req = $db->prepare($sql);
        try {
            $req->bindValue(':nom', $data['nom']);
            $req->bindValue(':prenom', $data['prenom']);
            $req->bindValue(':login', $data['login']);

            if (!empty($data['motdepasse'])) {
                $req->bindValue(':creation', date('Y-m-d H:i:s'));
                $req->bindValue(':motdepasse', $data['motdepasse']);
            }
            $req->bindValue(':id', $data['id']);
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }
    }

    public function auth_getLoginKey() {
//        $db = \F3il\Database::getInstance();
//
//        $sql = "SELECT login FROM utilisateurs";
//        $req = $db->prepare($sql);
//        try {
//            $req->execute();
//        } catch (\PDOException $ex) {
//            throw new \F3il\Error("Erreur SQL ".$ex->getMessage());
//        }
//
//        return $req->fetchAll(\PDO::FETCH_ASSOC);
        return "login";
    }

    public function auth_getPasswordKey() {
//        $db = \F3il\Database::getInstance();
//
//        $sql = "SELECT motdepasse FROM utilisateurs";
//        $req = $db->prepare($sql);
//        try {
//            $req->execute();
//        } catch (\PDOException $ex) {
//            throw new \F3il\Error("Erreur SQL ".$ex->getMessage());
//        }
//
//        return $req->fetchAll(\PDO::FETCH_ASSOC);
        return "motdepasse";
    }

    public function auth_getUserById($id) {
        return $this->lister($id);
    }

    public function auth_getUserByLogin($login) {
        $db = \F3il\Database::getInstance();

        $sql = "SELECT * FROM `utilisateurs` WHERE id = :id";

        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id', $login);
            $req->execute();
        } catch (\PDOException $ex) {
            die('Erreur SQL ' . $ex->getMessage());
        }
        return $req->fetch(\PDO::FETCH_ASSOC);
    }

    public function auth_getUserIdKey() {
//        $db = \F3il\Database::getInstance();
//
//        $sql = "SELECT id FROM utilisateurs";
//        $req = $db->prepare($sql);
//        try {
//            $req->execute();
//        } catch (\PDOException $ex) {
//            throw new \F3il\Error("Erreur SQL ".$ex->getMessage());
//        }
//
//        return $req->fetchAll(\PDO::FETCH_ASSOC);
        return "id";
    }

}

