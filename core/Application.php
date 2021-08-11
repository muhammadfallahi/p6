<?php

namespace app\core;

class Application{

    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    public Controller $controller;
    public function __construct($rootpath)  // reading the root path;
    {
        self::$ROOT_DIR = $rootpath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->controller = new Controller();
        $this->router = new Router($this->request, $this->response);
        
    }
 

public function run(){

   echo $this->router->resolve();
}

public function getcontroller(Controller $controller){
 
    return $this->controller;
}

public function setcontroller(Controller $controller){
    
    $this->controller = $controller;
}

}