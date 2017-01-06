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
    <input type="text" id="<?php $this->fName('login');?>" name="<?php $this->fName('login');?>" placeholder="Votre login" value="<?php echo $this->fValue('login');?>">
    <input type="password" id="<?php $this->fName('motdepasse');?>" name="<?php $this->fName('motdepasse');?>" placeholder="Votre mot de passe" value="<?php echo $this->fValue('motdepasse');?>">
    <button type="submit">Se connecter</button>
</form>

<?php CsrfHelper::csrf(); ?>