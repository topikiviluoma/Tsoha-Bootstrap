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

//    Redirect::to('/tehtava/' . $tehtava->id, array('message' => 'Tehävä on lisätty kirjastoosi!'));
  }
  
  public function save(){
    $query = DB::connection()->prepare('INSERT INTO Tehtava (nimi, tarkeys) VALUES (:nimi, :tarkeys RETURNING id');
    $query->execute(array('nimi' => $this->nimi, 'tarkeys' => $this->tarkeys));
    $row = $query->fetch();
    $this->id = $row['id'];
  }
  
  public static function create() {
      View::make('tehtava/new.html');
  }
  
  public static function show($id) {
      $tehtava = Tehtava::find($id);
  }
}


