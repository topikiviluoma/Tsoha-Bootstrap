<?php

class HelloWorldController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        View::make('suunnitelmat/etusivu.html');
    }

    public static function sandbox() {
        View::make('helloworld.html');
        // Testaa koodiasi täällä
    }

    public static function login() {
        View::make('suunnitelmat/login.html');
    }
    
   

}
