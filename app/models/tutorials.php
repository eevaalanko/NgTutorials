<?php


// Alustetaan kysely tietokantayhteydellämme
        $query = DB::connection()->prepare('SELECT * FROM Tutorial');
// Suoritetaan kysely
        $query->execute();
// Haetaan kyselyn tuottamat rivit
        $rows = $query->fetchAll();
            echo json_encode($rows);
        
    


