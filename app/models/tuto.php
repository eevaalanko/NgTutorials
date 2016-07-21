<?php

class Tuto extends BaseModel {

    public $id, $name, $description, $link, $added, $publisher, $stars;

// Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function all() {
        $query = DB::connection()->prepare('select tutorial.id, name, link, description, tutorial.added, tutorial.publisher, CAST(AVG(review.stars)AS integer) as stars from tutorial  left join review on tutorial.id = review.tutorial_id group by tutorial.id, tutorial.name, link, description, tutorial.publisher, tutorial.added;');
        $query->execute();
        $rows = $query->fetchAll();
        $tutos = array();
        foreach ($rows as $row) {
// Tämä on PHP:n hassu syntaksi alkion lisäämiseksi taulukkoon :)
            $tutos[] = new Tuto(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'description' => $row['description'],
                'link' => $row['link'],
                'added' => $row['added'],
                'publisher' => $row['publisher'],
                'stars' => $row['stars']
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
                'added' => $row['added'],
                'publisher' => $row['publisher'],
                'stars' => $row['stars']
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
    }

    public static function storeUpdated($params) {
        // POST-pyynnön muuttujat sijaitsevat $_POST nimisessä assosiaatiolistassa
        // Alustetaan uusi Game-luokan olion käyttäjän syöttämillä arvoilla
        $tuto = new Tuto(array(
            'id' => $params['id'],
            'name' => $params['name'],
            'description' => $params['description'],
            'link' => $params['link']
                // 'publisher' => $params['publisher']
        ));
        // Kutsutaan alustamamme olion save metodia, joka tallentaa olion tietokantaan
        $tuto->update();
    }

    public function update() {
        $query = DB::connection()->prepare('UPDATE Tutorial set name = :name, description = :description, link = :link where id = :id ');
        $query->execute(array('name' => $this->name, 'description' => $this->description, 'link' => $this->link, 'id' => $this->id));
    }

    public static function delete($id) {
        $query = DB::connection()->prepare('DELETE from Tutorial  where id = :id ');
        $query->execute(array('id' => $id));       
    }
}
