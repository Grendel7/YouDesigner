<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$config = include("../config.php");

foreach($config as $key => $value){
    $app[$key] = $value;
}

$app['base_path'] = dirname(dirname(__FILE__));

$app['ThemeParser'] = $app->share(function() use ($app) {
    return new YouDesign\ThemeParser($app);
});

$app->get('/login', function () use ($app) {
    return $app['ThemeParser']->render('login');
});

$app->get('/default', function () use ($app) {
    return $app['ThemeParser']->render('default');
});

$app->run();
