<?php
require_once __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\Slim(['debug' => true]);
$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});
$app->get('/', function()
{
   echo 'I m here' ;
});
$app->run();