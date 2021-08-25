<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller{

    public function home(){

        $params = [
            'name' => "This is home"
        ];
        return $this->render('home', $params);
    }

    public function contact(){

        return $this->render('contact');
    }

    
    public function upload(){

        return $this->render('upload');
    }

    
    public function dashbord(){

        return $this->render('dashbord');
    }

    public static function handlecontact(Request $request){

        $body = $request->getbody();
        var_dump($body);

        return "Handling submitted data";
    }
}



