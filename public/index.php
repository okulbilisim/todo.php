<?php
include __DIR__ . "/../app/bootstrap.php";
    $app->render('index.php');

$app->get('/', function() use ($app) {
    $app->render('index.php');
});


