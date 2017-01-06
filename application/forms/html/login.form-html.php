<?php
/**
 * Created by PhpStorm.
 * User: wangy
 * Date: 06/01/2017
 * Time: 09:00
 */
namespace Sistr;
defined('SISTR') or die('Acces interdit');
?>
<form id="index-login" action="<?php $this->getAction(); ?>" method="post">
    <input type="text" id="login" name="login" placeholder="Votre login">
    <input type="password" id="motdepasse" name="motdepasse" placeholder="Votre mot de passe">
    <button type="submit">Se connecter</button>
</form>

<?php CsrfHelper::csrf(); ?>