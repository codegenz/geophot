<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 15.05.15
 * Time: 0:01
 */
use Rain\Tpl;

$app->get('/', function () {
    $tpl = new Tpl;
    $tpl->assign("tmp","index");
    $tpl->draw("pager");

});
