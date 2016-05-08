<?php

class Kategoria extends BaseModel {
    
    public $id, $nimi;
    
    public function __construct($attributes = null) {
        parent::__construct($attributes);
         $this->validators = array('validate_name');
    }
    
    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Kategoria');

        $query->execute();

        $rows = $query->fetchAll();
        $kategoriat = array();

        foreach ($rows as $row) {
            $kategoriat[] = new Kategoria(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
            ));
        }
        
        return $kategoriat;

        return null;
    }
    
    public static function allInCategory($id) {
        $query = DB::connection()->prepare('SELECT * FROM Tehtava WHERE kategoria_id = :id');
        $query->execute(array('id' => $id));

        $rows = $query->fetchAll();
        
        $tehtavat = array();

        foreach ($rows as $row) {
            $tehtavat[] = new Tehtava(array(
                'id' => $row['id'],
                'kategoria_id' => $row['kategoria_id'],
                'nimi' => $row['nimi'],
                'tarkeys' => $row['tarkeys']
            ));
        }
       
        return $tehtavat;

        return null;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Kategoria WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));

        $row = $query->fetch();

        if ($row) {
            $kategoria = new Kategoria(array(
                'id' => $row['id'],
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
    
    public function validate_name() {
        $errors = array();
        if ($this->nimi == '' || $this->nimi == null) {
            $errors[] = 'Nimi ei saa olla tyhjä!';
        }
        if (strlen($this->nimi) < 3) {
            $errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä!';
        }

        return $errors;
    }
    
    
            
}

