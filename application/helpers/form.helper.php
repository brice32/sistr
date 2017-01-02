<?php
/**
 * Created by PhpStorm.
 * User: wangyc
 * Date: 01/01/2017
 * Time: 18:33
 */
namespace Sistr;
defined('SISTR') or die('Acces interdit');

use \F3il\Form;

abstract class FormHelper{
    public static function input(Form $form,$fieldName,$type){
        ?>
        <div class="form-group">
            <label for="<?php echo $fieldName;?>" class="col-sm-2 control-label"><?php $form->fLabel($fieldName); ?>: </label>
            <div class="col-sm-10">
                <input type="<?php echo $type;?>" class="form-control" id="<?php echo $fieldName;?>" name="<?php echo $fieldName;?>" placeholder="<?php echo ucfirst($fieldName);?>">
                <?php $form->fMessages($fieldName);?>
            </div>
        </div>
        <?php
    }
}