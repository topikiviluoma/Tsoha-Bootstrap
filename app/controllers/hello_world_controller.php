<?php

class HelloWorldController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        View::make('suunnitelmat/etusivu.html');
    }

    public static function sandbox() {
        $pyykit = Tehtava::find(1);
        $tehtavat = Tehtava::all();
        // Kint-luokan dump-metodi tulostaa muuttujan arvon
        Kint::dump($tehtavat);
        Kint::dump($pyykit);
    }

    public static function login() {
        View::make('suunnitelmat/login.html');
    }

    public static function tehtavat() {
        View::make('suunnitelmat/tehtavat.html');
    }
    
    

}
