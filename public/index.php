<?php

require_once __DIR__.'/../vendor/autoload.php';
use app\core\Application;
use app\controllers\SiteController;
use app\controllers\Authcontroller;

$app = new Application(dirname(__DIR__)); //root address;

 $app->router->get('/', [SiteController::class, 'home']);
 $app->router->get('/contact', [SiteController::class, 'contact']);
 $app->router->post('/contact', [SiteController::class, 'handlecontact']);
 $app->router->get('/login', [Authcontroller::class, 'login']);
 $app->router->post('/login', [Authcontroller::class, 'login']);
 $app->router->get('/register', [Authcontroller::class,'register']);
 $app->router->post('/register', [Authcontroller::class,'register']);





 $app->run();  // echo pages;



