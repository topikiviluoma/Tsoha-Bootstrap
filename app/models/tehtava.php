<?php

class Tehtava extends BaseModel {

    //put your code here
    public $id, $kayttaja_id, $kategoria_id, $nimi, $tarkeys;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_name', 'validate_prio');
    }

    public static function all($id) {
        $query = DB::connection()->prepare('SELECT * FROM Tehtava WHERE kayttaja_id = :id ORDER BY tarkeys DESC');

        $query->execute(array('id' => $id));

        $rows = $query->fetchAll();
        $tehtavat = array();

        foreach ($rows as $row) {
            $tehtavat[] = new Tehtava(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'tarkeys' => $row['tarkeys']
            ));
        }
        
        return $tehtavat;

        return null;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Tehtava WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));

        $row = $query->fetch();

        if ($row) {
            $tehtava = new Tehtava(array(
                'id' => $row['id'],
                'kategoria_id' => $row['kategoria_id'],
                'nimi' => $row['nimi'],
                'tarkeys' => $row['tarkeys']
            ));

            return $tehtava;
        }
        return null;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Tehtava (kayttaja_id, kategoria_id, nimi, tarkeys) VALUES (:kayttaja_id, :kategoria_id, :nimi, :tarkeys) RETURNING id');
        $query->execute(array('kayttaja_id' => $this->kayttaja_id, 'kategoria_id' => $this->kategoria_id, 'nimi' => $this->nimi, 'tarkeys' => $this->tarkeys));
        $row = $query->fetch();

        $this->id = $row['id'];
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Tehtava WHERE id = :id');
        $query->execute(array('id' => $this->id));
    }

    public function update($id) {
        $query = DB::connection()->prepare('UPDATE Tehtava SET kategoria_id=:kategoria_id, nimi=:nimi, tarkeys=:tarkeys WHERE id = :id');
        $query->execute(array('id' => $id, 'kategoria_id' => $this->kategoria_id, 'nimi' => $this->nimi, 'tarkeys' => $this->tarkeys));
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
    
    public function validate_prio() {
        $errors = array();
        if (strlen($this->tarkeys) < 0) {
            $errors[] = 'Tärkeys ei voi olla negatiivinen!';
        }
        return $errors;
    }
    
    

}
