<?php

namespace app\core;


class Request {

   
    public function getpath(){

        $path = $_SERVER["REQUEST_URI"] ?? '/';
        $position = strpos($path, '?'); // return false if "?" doesn't exsist;
        if ($position === false){
            return $path;
        }
      return substr($path,0, $position); //return path from 0 to '?' symbol;
    }

    public function method(){  // return get or post;

        return strtolower($_SERVER["REQUEST_METHOD"]); // make the word to lowercase;
    }

    public function isGet(){  

        return $this->method() === 'get';
    }

    
    public function isPost(){  

        return $this->method() === 'post';
    }

    public function getbody(){

        $body = [];
        if ($this->method() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }

        if ($this->method() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }


        return $body;
    }
}