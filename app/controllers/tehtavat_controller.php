<?php

class TehtavaController extends BaseController {
    
    public static function index() {
        $tehtavat = Tehtava::all();
        View::make('tehtava/index.html', array('tehtavat' => $tehtavat));
    }
    
    public static function store(){
    $params = $_POST;
    $teahtava = new Tehtava(array(
      'nimi' => $params['nimi'],
      'tarkeys' => $params['tarkeys'],
     
    ));

    $tehtava->save();

    Redirect::to('/teahtava/' . $tehtava->id, array('message' => 'Tehävä on lisätty kirjastoosi!'));
  }
  
  public function save(){
    $query = DB::connection()->prepare('INSERT INTO Tehtava (nimi, tarkeys) VALUES (:nimi, :tarkeys RETURNING id');
    $query->execute(array('name' => $this->nimi, 'tarkeys' => $this->tarkeys));
    $row = $query->fetch();
    $this->id = $row['id'];
  }
}


