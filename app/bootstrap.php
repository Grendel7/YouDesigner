<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$config = include("../config.php");

foreach($config as $key => $value){
    $app[$key] = $value;
}

$app['base_path'] = $basePath;

$app->get('/login', function () use ($app) {
    $controller = new \app\Controllers\LoginController($app);
    return $controller->actionLogin();
});

$app->get('/default', function () use ($app) {
    $controller = new \app\Controllers\DefaultController($app);
    return $controller->actionDefault();
});

$app->get('/inner', function() use ($app) {
    $controller = new \app\Controllers\SectionController($app);
    return $controller->actionSection();
});

$app->get('/profile', function() use ($app) {
    $controller = new \app\Controllers\ProfileController($app);
    return $controller->actionProfile();
});

$app->run();