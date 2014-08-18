<?php
include __DIR__ . "/../app/bootstrap.php";
$app->twig->display('index.twig');
$app->get('/', function() use ($app) {
    $app->twig->display('index.twig');
});
