<?php

namespace app\core;


class Router{
    public Request $request;
    public Response $response;
    protected array $routes = []; // using for saving $callback in the $path in get and post function;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response =$response;

    }

    public function get($path, $callback){

        $this->routes['get'][$path] = $callback;
    }

    
    public function post($path, $callback){

        $this->routes['post'][$path] = $callback;
    }


    public function resolve(){  //using for show the output;

        $path = $this->request->getpath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false; // when the page not found the $callback=false;
        if ($callback === false) { 
            $this->response->set_Statuscode('404');
            
            return $this->renderview("_404");
        }

        if (is_string($callback)) {
            return $this->renderview($callback);
        }
        if (is_array($callback)) {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }
       return call_user_func($callback, $this->request);
    }

    // public function rendercontent($viewcontent){

    //     $layoutcontent = $this->layoutcontent();
    //     return str_replace('{{content}}', $viewcontent, $layoutcontent);
    //     include_once Application::$ROOT_DIR."/views/$view.php";
    // }

    
    public function renderview($view, $params=[]){ //loading view pages in main page;

        $layoutcontent = $this->layoutcontent(); // main.php page;
        $viewcontent = $this->renderonlyview($view, $params); // view pages;
        return str_replace('{{content}}', $viewcontent, $layoutcontent); // put the view page instead of {{content}} to main page;
        include_once Application::$ROOT_DIR."/views/$view.php";
    }

    protected function layoutcontent(){ // changing the main.php to string;

        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderonlyview($view, $params){

        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }
}