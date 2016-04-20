<?php

class TehtavaController extends BaseController {

    public static function index() {
        $tehtavat = Tehtava::all();
        View::make('tehtava/index.html', array('tehtavat' => $tehtavat));
    }

    public static function store() {
        $params = $_POST;
        $attributes = array(
            'nimi' => $params['nimi'],
            'tarkeys' => $params['tarkeys'],
        );

        $tehtava = new Tehtava($attributes);
        $errors = $tehtava->errors();

        if (count($errors) == 0) {
            $tehtava->save();

            Redirect::to('/tehtava/' . $tehtava->id, array('message' => 'Tehävä on lisätty kirjastoosi!'));
        } else {
            View::make('tehtava/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }

    }

    public static function create() {
        View::make('tehtava/new.html');
    }

    public static function show($id) {
        $tehtava = Tehtava::find($id);
        View::make('tehtava/show.html', array('tehtava' => $tehtava));
    }

    public static function edit($id) {
        $tehtava = Tehtava::find($id);
        View::make('tehtava/edit.html', array('tehtava' => $tehtava));
    }

    public static function update($id) {
        $params = $_POST;
        $tehtava = new Tehtava(array(
            'nimi' => $params['nimi'],
            'tarkeys' => $params['tarkeys'],
        ));
        $tehtava->update($id);
        Kint::dump($params);
        Redirect::to('/tehtava' . $tehtava->id, array('message' => 'Tiedot päivitetty!!'));
    }

    public static function destroy($id) {
        $tehtava = new Tehtava(array('id' => $id));

        $tehtava->destroy();

        Redirect::to('/tehtava', array('message' => 'Tehtava on poistettu onnistuneesti!'));
    }

}
