<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/config/config.php';
define('APP_ROOT_PATH', __DIR__."/../");

$app = new \Slim\Slim(
        array(
    'cookies.encrypt' => true,
    'cookies.secret_key' => 'Kz7ac#wmx.11',
    'templates.path' => APP_ROOT_PATH . '/app/views/',
        ));

$app->container->singleton('twig', function ($c) {
    $twig = new \Slim\Views\Twig();
    /* Option */
    $twig->parserOptions = array(
        'debug' => true,
        'cache' => APP_ROOT_PATH . '/cache',
        'auto_reload' => true,
        'strict_variables' => false,
        'autoescape' => true
    );
    /* Extensions */
    $twig->parserExtensions = array(new \Slim\Views\TwigExtension());
    $templatesPath = $c['settings']['templates.path'];
    $twig->setTemplatesDirectory($templatesPath);
    return $twig;
});

