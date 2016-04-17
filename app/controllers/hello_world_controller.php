<?php

class HelloWorldController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        View::make('suunnitelmat/etusivu.html');
    }

    public static function sandbox() {
        $pyykit = new Tehtava(array(
            'nimi' => 'd',
            'tarkeys' => 'fg'
        ));
        $errors = $pyykit->errors();
        
        Kint::dump($errors);
    }

    public static function login() {
        View::make('suunnitelmat/login.html');
    }

    public static function tehtavat() {
        View::make('suunnitelmat/tehtavat.html');
    }
    
    

}
