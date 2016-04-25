<?php

class Kategoria extends BaseModel {
    
    public $id, $kayttaja_id, $tehtava_id, $nimi;
    
    public function __construct($attributes = null) {
        parent::__construct($attributes);
    }
    
    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Kategoria');

        $query->execute();

        $rows = $query->fetchAll();
        $kategoriat = array();

        foreach ($rows as $row) {
            $kategoriat[] = new Kategoria(array(
                'id' => $row['id'],
                'kayttaja_id' => $row['kayttaja_id'],
                'tehtava_id' => $row['tehtava_id'],
                'nimi' => $row['nimi'],
            ));
        }
        Kint::dump($rows);
        return $kategoriat;

        return null;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Kategoria WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));

        $row = $query->fetch();

        if ($row) {
            $kategoria = new Kategoria(array(
                'id' => $row['id'],
                'kayttaja_id' => $row['kayttaja_id'],
                'tehtava_id' => $row['tehtava_id'],
                'nimi' => $row['nimi'],
            ));

            return $kategoria;
        }
        return null;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Kategoria (nimi) VALUES (:nimi) RETURNING id');
        $query->execute(array('nimi' => $this->nimi));
        $row = $query->fetch();

        $this->id = $row['id'];
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Kategoria WHERE id = :id');
        $query->execute(array('id' => $this->id));
    }

    public function update($id) {
        $query = DB::connection()->prepare('UPDATE Kategoria SET nimi=:nimi WHERE id = :id');
        $query->execute(array('id' => $id, 'nimi' => $this->nimi));
    }
            
}

