<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = urldecode($uri);
$requested = ltrim($uri,'/');
if ($uri !== '/' and file_exists($requested))
{
        return false;
}

require_once 'index.php';

