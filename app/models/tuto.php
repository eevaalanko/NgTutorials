<?php

class Tuto extends BaseModel {

    public $id, $name, $description, $link, $added, $publisher;

// Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function all() {
// Alustetaan kysely tietokantayhteydellämme
        $query = DB::connection()->prepare('SELECT * FROM Tutorial');
// Suoritetaan kysely
        $query->execute();
// Haetaan kyselyn tuottamat rivit
        $rows = $query->fetchAll();
        $tutos = array();

// Käydään kyselyn tuottamat rivit läpi
        foreach ($rows as $row) {
// Tämä on PHP:n hassu syntaksi alkion lisäämiseksi taulukkoon :)
            $tutos[] = new Tuto(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'description' => $row['description'],
                'link' => $row['link'],
                'added' => $row['added'],
                'publisher' => $row['publisher']
            ));
        }
        return $tutos;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Tutorial WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        if ($row) {
            $tuto = new Tuto(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'description' => $row['description'],
                'link' => $row['link'],
                'added' => $row['added']
            ));
            return $tuto;
        }
        return null;
    }

    public static function store($params) {
        // POST-pyynnön muuttujat sijaitsevat $_POST nimisessä assosiaatiolistassa
        // Alustetaan uusi Game-luokan olion käyttäjän syöttämillä arvoilla
        $tuto = new Tuto(array(
        'name' => $params['name'],
        'description' => $params['description'],
        'link' => $params['link']
       // 'publisher' => $params['publisher']
        ));
        // Kutsutaan alustamamme olion save metodia, joka tallentaa olion tietokantaan
        $tuto->save();
    }

    public function save() {
        // Lisätään RETURNING id tietokantakyselymme loppuun, niin saamme lisätyn rivin id-sarakkeen arvon
        $query = DB::connection()->prepare("INSERT into Tutorial (name, description, link, added, publisher) values (:name, :description, :link, current_date, 'julkaisija') RETURNING id");
        // Muistathan, että olion attribuuttiin pääse syntaksilla $this->attribuutin_nimi
        $query->execute(array('name' => $this->name, 'description' => $this->description, 'link' => $this->link));
        // Haetaan kyselyn tuottama rivi, joka sisältää lisätyn rivin id-sarakkeen arvon
    }

}
