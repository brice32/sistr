<?php
/**
 * Created by PhpStorm.
 * User: wangyc
 * Date: 12/12/2016
 * Time: 04:17
 */
namespace Sistr;
defined("SISTR") or die("Acess interdit form.view");

?>
<head>
    <title>Form Test</title>
</head>
<div>
    <h2>Form Test</h2>
    <?php
    $this->formulaire->render();
    ?>
    <pre><?php print_r($this->formulaire) ?></pre>
</div>
