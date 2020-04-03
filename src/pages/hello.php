<?php
/**
 * Created by PhpStorm.
 * User: haiqunfan
 * Date: 2020/4/3
 * Time: 11:27 PM
 */


$name = $request->get('name', 'World'); ?>

Hello

<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>