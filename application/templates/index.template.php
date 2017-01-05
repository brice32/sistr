<?php
/**
 * Created by PhpStorm.
 * User: wangy
 * Date: 05/01/2017
 * Time: 13:28
 */
namespace Sistr;
defined('SISTR') or die('Acces interdit');
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>SisTR - Accueil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link
            href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:100,100i,400,400i"
            rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="css/sistr.css">
</head>
<body>
<header id="header-accueil">
    <div class="conteneur">
        <h1>
            <a href="#">
                <image src="images/logo-grand.png" alt="logo sistr">
            </a>
        </h1>
        <div id="connexion">
            <form action="#">
                <input type="text" id="login" name="login" placeholder="Votre login">
                <input type="password" id="mot-de-passe" name="mot-de-passe" placeholder="Votre mot de passe">
                <button type="button">Se connecter</button>
            </form>
        </div>
    </div>
</header>
<nav id="nav-accueil">
    <div class="conteneur">
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Découvrir</a></li>
            <li><a href="#">Ressources TR</a></li>
            <li><a href="#">S'inscrire</a></li>
        </ul>
    </div>
</nav>
<!--<header id="bienvenue">-->
<!--    <div class="conteneur">-->
<!--        <h2>Bienvenu</h2>-->
<!--    </div>-->
<!--</header>-->
<!--<section id="derniers-suivis">-->
<!--    <div class="conteneur">-->
<!--        <h3>Derniers suivis effectués</h3>-->
<!--        <table>-->
<!--            <tbody>-->
<!--            <tr>-->
<!--                <td>Technologies hybridres pour le développement mobile</td>-->
<!--                <td>WR</td>-->
<!--                <td>5/11/2016</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Virtual Duck : la place des animaux virtuels</td>-->
<!--                <td>HG</td>-->
<!--                <td>3/11/2016</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Gaussiennes équilibrée</td>-->
<!--                <td>CDU</td>-->
<!--                <td>28/10/2016</td>-->
<!--            </tr>-->
<!--            </tbody>-->
<!--        </table>-->
<!--    </div>-->
<!--</section>-->
<!--<section id="temoignage">-->
<!--    <div class="conteneur">-->
<!--        <i class="fa fa-quote-left fa-4x" aria-hidden="true"></i>-->
<!--        <p>SisTR est une plateforme complète de gestion et de suivi e travaux de-->
<!--            recherche à la fois efficace et 100% connectée.</p>-->
<!--    </div>-->
<!--</section>-->
<!--<section id="description">-->
<!--    <div class="conteneur">-->
<!--        <div class="bloc33">-->
<!--            <h3>-->
<!--                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>-->
<!--                <span>Créez</span>-->
<!--            </h3>-->
<!--            <p>Créeez vos sujets de façon conviviale et rapide. Affectez-les aux élèves en deux temps trois-->
<!--                mouvements.</p>-->
<!--        </div>-->
<!--        <div class="bloc33">-->
<!--            <h3>-->
<!--                <i class="fa fa-binoculars" aria-hidden="true"></i>-->
<!--                <span>Suivez</span>-->
<!--            </h3>-->
<!--            <p>Les travaux des élèves. Fini le temps perdu à chercher la feuille de suivi, toutes les informations sont-->
<!--                disponibles instantanément.</p>-->
<!--        </div>-->
<!--        <div class="bloc33">-->
<!--            <h3>-->
<!--                <i class="fa fa-check" aria-hidden="true"></i>-->
<!--                <span>Notez</span>-->
<!--            </h3>-->
<!--            <p>Notez rapidement le travail réalisé, inscrivez vos commentaires.</p>-->
<!--        </div>-->
<!--        <div class="clear"></div>-->
<!--    </div>-->
<!--</section>-->
[%VIEW%]
<footer id="pied-de-page">
    <div class="conteneur">
        <p>SisTR (c) Groupe 3iL 2016-2017</p>
        <div class="bloc33">
            <h4>Dev. Web</h4>
            <ul>
                <li><a href="#">PHP.net</a></li>
                <li><a href="#">W3Schools</a></li>
                <li><a href="#">AlsacrÃ©ation</a></li>
                <li><a href="#">GrafikArt</a></li>
            </ul>
        </div>
        <div class="bloc33">
            <h4>Framework / CMS</h4>
            <ul>
                <li><a href="#">Symfony</a></li>
                <li><a href="#">Zend Framework</a></li>
                <li><a href="#">Wordpress</a></li>
                <li><a href="#">Drupal</a></li>
                <li><a href="#">Joomla</a></li>
            </ul>
        </div>
        <div class="bloc33">
            <h4>Graphisme</h4>
            <ul>
                <li><a href="#">Rocket Theme</a></li>
                <li><a href="#">Shutterstock</a></li>
                <li><a href="#">Ligature Symbols</a></li>
                <li><a href="#">Awesome Font</a></li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
</footer>
</body>
</html>
