<?php

namespace app\controllers;

use app\core\Request;
use app\core\Controller;
use app\models\Registermodel;

class Authcontroller extends Controller {


    public function login(){
        $this->setlayout('auth');
        return $this->render('login');
    }

    
    public function register(Request $request){

        $registermodel = new Registermodel();
        
        if ($request->isPost()) {
            $registermodel->loadData($request->getbody());

            if($registermodel->validation()&& $registermodel->register()){
                return 'success';
            }
            return $this->render('register', [
                'model' => $registermodel
            ]);
        
        }
        $this->setlayout('auth');
        return $this->render('register', [
            'model' => $registermodel
        ]);
    
        
    }
}