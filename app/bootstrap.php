<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/config/config.php';
define('APP_ROOT_PATH', __DIR__."/../");

$app = new \Slim\Slim(
        array(
    'cookies.encrypt' => true,
    'cookies.secret_key' => 'kazant@#$.12',
    'templates.path' => APP_ROOT_PATH . '/app/views/',
        ));
