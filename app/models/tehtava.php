<?php

class Tehtava extends BaseModel {

    //put your code here
    public $id, $kayttaja_id, $nimi, $tarkeys;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Tehtava');

        $query->execute();

        $rows = $query->fetchAll();
        $tehtavat = array();

        foreach ($rows as $row) {
            $tehtavat[] = new Tehtava(array(
                'id' => $row['id'],
                'kayttaja_id' => $row['kayttaja_id'],
                'nimi' => $row['nimi'],
                'tarkeys' => $row['tarkeys']
            ));
            return $tehtavat;
        }
        return null;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Tehtava WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));

        $row = $query->fetch();

        if ($row) {
            $tehtava = new Tehtava(array(
                'id' => $row['id'],
                'kayttaja_id' => $row['kayttaja_id'],
                'nimi' => $row['nimi'],
                'tarkeys' => $row['tarkeys']
            ));

            return $tehtava;
        }
        return null;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Tehtava (nimi, tarkeys) VALUES (:nimi, :tarkeys) RETURNING id');
        $query->execute(array('nimi' => $this->nimi, 'tarkeys' => $this->tarkeys));
        $row = $query->fetch();

        $this->id = $row['id'];
    }

}
