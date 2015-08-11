<?php

use Symfony\Component\HttpFoundation\Response;

// Require the Composer Autoloader
require_once __DIR__.'/../vendor/autoload.php';

// Setup a new Silex application
$app = new Silex\Application();

// Register Silex services
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// Load the config of the config.php file into the dependency container
$config = include("./config.php");

foreach($config as $key => $value){
    $app[$key] = $value;
}

// Add other stuff to the dependency container
$app['base_path'] = $basePath;

// A basic home page with links to the available theme pages
$app->get('/', function() use ($app) {
    return include($app['base_path']."/resources/home.php");
})->bind("home");

// All relevant control panel views
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

// By default, Silex doesn't show the exception message to the user. We do want to show it.
$app->error(function(\Exception $ex, $code) use ($app) {
    if($app['debug']){
        return;
    }

    return new Response($ex->getMessage());
});

$app->run();