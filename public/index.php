<?php

use app\core\Application;
use app\controllers\SiteController;
use app\controllers\Authcontroller;

require_once __DIR__.'/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
        ]
    ];

$app = new Application(dirname(__DIR__), $config); //root address;

 $app->router->get('/', [SiteController::class, 'home']);
 $app->router->get('/contact', [SiteController::class, 'contact']);
 $app->router->post('/contact', [SiteController::class, 'handlecontact']);
 $app->router->get('/login', [Authcontroller::class, 'login']);
 $app->router->post('/login', [Authcontroller::class, 'login']);
 $app->router->get('/register', [Authcontroller::class,'register']);
 $app->router->post('/register', [Authcontroller::class,'register']);
 $app->router->get('/upload', [SiteController::class,'upload']);
 $app->router->get('/dashbord', [SiteController::class,'dashbord']);







 $app->run();  // echo pages;



