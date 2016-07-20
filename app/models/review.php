<?php

class Review extends BaseModel {

    public $id, $review, $usr_id, $tutorial_id, $added, $stars;

// Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function all($id) {
        $query = DB::connection()->prepare('SELECT * FROM Review WHERE tutorial_id = :id');
        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();
        $reviews = array();
        foreach ($rows as $row) {
// Tämä on PHP:n hassu syntaksi alkion lisäämiseksi taulukkoon :)
            $reviews[] = new Review(array(
                'id' => $row['id'],
                'review' => $row['review'],
                'usr_id' => $row['usr_id'],
                'tutorial_id' => $row['tutorial_id'],
                'added' => $row['added'],
                'stars' => $row['stars']
            ));
        }
        return $reviews;
    }

    public static function store($params) {
        // POST-pyynnön muuttujat sijaitsevat $_POST nimisessä assosiaatiolistassa
        // Alustetaan uusi Game-luokan olion käyttäjän syöttämillä arvoilla
        $review = new Review(array(
            'review' => $params['review'],
            'stars' => $params['stars'],
            // 'usr_id' => $params['usr_id'],
            'tutorial_id' => $params['tutorial_id']
        ));
        // Kutsutaan alustamamme olion save metodia, joka tallentaa olion tietokantaan
        $review->save();
    }

    public function save() {
        // Lisätään RETURNING id tietokantakyselymme loppuun, niin saamme lisätyn rivin id-sarakkeen arvon
        $query = DB::connection()->prepare("INSERT into Review (review, usr_id, tutorial_id, added, stars) values (:review, 1, :tutorial_id, current_date, :stars) RETURNING id");
        // Muistathan, että olion attribuuttiin pääse syntaksilla $this->attribuutin_nimi
        $query->execute(array('review' => $this->review, 'stars' => $this->stars, 'tutorial_id' => $this->tutorial_id));
    }

}
