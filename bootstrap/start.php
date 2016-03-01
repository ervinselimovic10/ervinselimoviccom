<?php
require(__DIR__."/../vendor/autoload.php");

date_default_timezone_set('Europe/Ljubljana');

session_name('onz');
session_start('onz');

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new AltoRouter();