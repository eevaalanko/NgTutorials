<?php

class Tuto extends BaseModel {

public $id, $name, $description, $link, $image, $added;

// Konstruktori
public function __construct($attributes) {
parent::__construct($attributes);

}

public static function test(){
    
 $query = DB::connection()->prepare('SELECT * FROM Tutorial');
 $query->execute();
// Haetaan kyselyn tuottamat rivit
$rows = $query->fetchAll();

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
 'image' => $row['image'],
 'added' => $row['added']
));
return $tutos;
}
}


// ...
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
 'image' => $row['image'],
 'added' => $row['added']
));

return $tuto;
}

return null;
}

}
