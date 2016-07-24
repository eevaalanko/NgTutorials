<?php

class User extends BaseModel {

    public $id, $email, $name, $password;

// Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function authenticate($params) {
        $name = $params['name'];
        $password = $params['password'];
        $query = DB::connection()->prepare('SELECT * FROM Usr WHERE name = :name and password = :password LIMIT 1');
        $query->execute(array('name' => $name, 'password' => $password));
        $row = $query->fetch();
        if ($row) {
            $user = new User(array(
                'id' => $row['id'],
                'email' => $row['email'],
                'name' => $row['name']
            ));
            return $user;
        }
        return null;
    }

    public static function store($params) {
        // POST-pyynnön muuttujat sijaitsevat $_POST nimisessä assosiaatiolistassa
        // Alustetaan uusi Game-luokan olion käyttäjän syöttämillä arvoilla
        $user = new User(array(
                'email' => $params['email'],
                'name' => $params['name'],
                'password' => $params['password']
        ));
        $user->save();
    }

    public function save() {
        $query = DB::connection()->prepare("INSERT into Usr (email, name, password) values (:email, :name, :password)");
        $query->execute(array('email' => $this->email, 'name' => $this->name, 'password' => $this->password));
    }

}
