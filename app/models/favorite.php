<?php

class Favorite extends BaseModel {

    public $id, $usr_id, $tutorial_id, $tutorial_name, $tutorial_link;

// Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function all($id) {
        $query = DB::connection()->prepare('SELECT Favorites.id, usr_id, Favorites.tutorial_id, tutorial.name as tutorial_name, tutorial.link as tutorial_link  FROM Favorites 
                                            left join tutorial on Favorites.tutorial_id = tutorial.id WHERE usr_id = :id');
        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();
        $favorites = array();
        foreach ($rows as $row) {
            $favorites[] = new Favorite(array(
                'id' => $row['id'],
                'usr_id' => $row['usr_id'],
                'tutorial_id' => $row['tutorial_id'],
                'tutorial_name' => $row['tutorial_name'],
                'tutorial_link' => $row['tutorial_link']
            ));
        }
        return $favorites;
    }

    public static function store($params) {
        $favorite = new Favorite(array(
            'usr_id' => $params['usr_id'],
            'tutorial_id' => $params['tutorial_id']
        ));
        $favorite->save();
    }

    public function save() {
        $query = DB::connection()->prepare("INSERT into Favorites (usr_id, tutorial_id) values (:usr_id, :tutorial_id) RETURNING id");
        $query->execute(array('usr_id' => $this->usr_id, 'tutorial_id' => $this->tutorial_id));
    }

    public function delete($id) {
        $query = DB::connection()->prepare('DELETE from Favorites  where id = :id ');
        $query->execute(array('id' => $id));
    }

}
