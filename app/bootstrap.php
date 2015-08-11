<?php

use Symfony\Component\HttpFoundation\Response;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$config = include("./config.php");

foreach($config as $key => $value){
    $app[$key] = $value;
}

$app['base_path'] = $basePath;

$app->get('/', function() use ($app) {
    return include($app['base_path']."/resources/home.php");
})->bind("home");

$app->get('/login', function () use ($app) {
    $controller = new \YouDesigner\Controllers\PublicController($app);
    return $controller->actionLogin();
})->bind('login');

$app->get('/public/ticket', function () use ($app) {
    $controller = new \YouDesigner\Controllers\PublicController($app);
    return $controller->actionTicket();
})->bind('public');

$app->get('/default', function () use ($app) {
    $controller = new \YouDesigner\Controllers\DefaultController($app);
    return $controller->actionDefault();
})->bind('default');

$app->get('/inner', function() use ($app) {
    $controller = new \YouDesigner\Controllers\SectionController($app);
    return $controller->actionSection();
})->bind('inner');

$app->get('/profile', function() use ($app) {
    $controller = new \YouDesigner\Controllers\ProfileController($app);
    return $controller->actionProfile();
})->bind('profile');

$app->get('/upgrade', function() use ($app) {
    $controller = new \YouDesigner\Controllers\AccountController($app);
    return $controller->actionUpgrade();
})->bind('upgrade');

$app->get('/createaccount', function() use ($app) {
    $controller = new \YouDesigner\Controllers\AccountController($app);
    return $controller->actionCreate();
})->bind('newaccount');

$app->error(function(\Exception $ex, $code) use ($app) {
    if($app['debug']){
        return;
    }

    return new Response($ex->getMessage());
});

$app->run();