<?php

class Kayttaja extends BaseModel {

    public $id, $nimi, $password;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function authenticate($nimi, $password) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE nimi = :nimi AND password = :password LIMIT 1');
        $query->execute(array('nimi' => $nimi, 'password' => $password));
        $row = $query->fetch();
        if ($row) {
            $kayttaja = new Kayttaja(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'password' => $row['password']
            ));
            return $kayttaja;
        } else {
            return null;
        }
    }

}