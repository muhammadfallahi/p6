<?php

namespace app\core;

class Response{

    public function set_Statuscode(int $code){

        http_response_code($code);
    }
}