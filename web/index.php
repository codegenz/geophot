<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 14.05.15
 * Time: 22:46
 */
require "../vendor/autoload.php";
include('include/configuration.php');

$app = new \Slim\Slim();
use Rain\Tpl;
Tpl::configure( $config );

include("include/MainRoutes.php");

$app->notFound(function () use ($app) {
    echo "<h2>404 error</h2>";
    echo "Такой страницы тут нет!";
});

$app->run();