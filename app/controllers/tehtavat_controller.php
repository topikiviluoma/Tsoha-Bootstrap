<?php

class TehtavaController extends BaseController {
    
    public static function index() {
        $tehtavat = Tehtava::all();
        View::make('tehtava/index.html', array('tehtavat' => $tehtavat));
    }
    
    public static function store(){
    $params = $_POST;
    $tehtava = new Tehtava(array(
      'nimi' => $params['nimi'],
      'tarkeys' => $params['tarkeys'],
     
    ));

    $tehtava->save();
    
    Kint::dump($params);

    Redirect::to('/tehtava/' . $tehtava->id, array('message' => 'Tehävä on lisätty kirjastoosi!'));
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
      $tehtava = Tehtava::find($id);
      $tehtava->update($id);
      Redirect::to('/tehtava/' . $tehtava->id, array('message' => 'Tiedot päivitetty!!'));
  }
}


