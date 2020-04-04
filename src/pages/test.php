<?php
/**
 * Created by PhpStorm.
 * User: haiqunfan
 * Date: 2020/4/3
 * Time: 11:27 PM
 */


$name = $request->get('test', 'World'); ?>

    test

<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>