<?php

class KategoriaController extends BaseController {

    public static function index() {
        self::check_logged_in();
        $kategoriat = Kategoria::all();
        View::make('kategoria/index.html', array('kategoriat' => $kategoriat));
    }

    public static function store() {
        $params = $_POST;
        $attributes = array(
            'nimi' => $params['nimi'],
        );

        $kategoria = new Kategoria($attributes);
        $errors = $kategoria->errors();

        if (count($errors) == 0) {
            $kategoria->save();

            Redirect::to('/kategoria/' . $kategoria->id, array('message' => 'Kategoria on lisätty kirjastoosi!'));
        } else {
            View::make('kategoria/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }

    }

    public static function create() {
        self::check_logged_in();
        View::make('kategoria/new.html');
    }

    public static function show($id) {
        self::check_logged_in();
        $kategoria = Kategoria::find($id);
        View::make('kategoria/show.html', array('kategoria' => $kategoria));
    }

    public static function edit($id) {
        self::check_logged_in();
        $kategoria = Kategoria::find($id);
        View::make('kategoria/edit.html', array('kategoria' => $kategoria));
    }

    public static function update($id) {
        self::check_logged_in();
        $params = $_POST;
        $kategoria = new Kategoria(array(
            'nimi' => $params['nimi'],
        ));
        $tehtava->update($id);
        Kint::dump($params);
        Redirect::to('/kategoria' . $tehtava->id, array('message' => 'Tiedot päivitetty!!'));
    }

    public static function destroy($id) {
        self::check_logged_in();
        $kategoria = new Tehtava(array('id' => $id));
        $kategoria->destroy();

        Redirect::to('/kategoria', array('message' => 'Kategoria on poistettu onnistuneesti!'));
    }

}
