<?php

class Tehtava extends BaseModel {

    //put your code here
    public $id, $kayttaja_id, $nimi, $tarkeys;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_name', 'validate_prio');
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Tehtava ORDER BY tarkeys DESC');

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
        }
        Kint::dump($rows);
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

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Tehtava WHERE id = :id');
        $query->execute(array('id' => $this->id));
    }

    public function update($id) {
        $query = DB::connection()->prepare('UPDATE Tehtava SET nimi=:nimi, tarkeys=:tarkeys WHERE id = :id');
        $query->execute(array('id' => $id, 'nimi' => $this->nimi, 'tarkeys' => $this->tarkeys));
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
