<?php

class KayttajaController extends BaseController {

    public static function login() {
        View::make('kayttaja/login.html');
    }

    public static function handle_login() {
        $params = $_POST;

        $kayttaja = Kayttaja::authenticate($params['nimi'], $params['password']);

        if (!$kayttaja) {
            View::make('kayttaja/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'nimi' => $params['nimi']));
        } else {
            $_SESSION['kayttaja'] = $kayttaja->id;
        }

        Redirect::to('/', array('message' => 'Tervetuloa' . $kayttaja->nimi . '!'));
    }

    public static function logout() {
        $_SESSION['kayttaja'] = null;
        Redirect::to('/login', array('message' => 'Olet kirjautunut ulos!'));
    }
    
    public static function register() {
        View::make('kayttaja/register.html');
    }
    
    public static function store() {
        $params = $_POST;
        $attributes = array(
            'nimi' => $params['nimi'],
            'password' => $params['password']
                
        );
        $kayttaja = new Kayttaja($attributes);
        $kayttaja->save();
        Redirect::to('/', array('message' => 'Rekisteröity onnistuneesti!'));
    }

}
