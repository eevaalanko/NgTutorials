<?php

// Muista sisällyttää malliluokka require-komennolla!
require 'app/models/tuto.php';

class TutoController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        $_SESSION["currentTuto"] = "testi";
        View::make('home.html');
    }

    public static function tutorial() {
        View::make('tutorial.html');
    }

    public static function signup() {
        View::make('signup.html');
    }

    public static function allTutorials() {
        $tutos = Tuto::all();
        echo json_encode($tutos);
    }

    public static function findTutorial() {
        $id = json_decode(file_get_contents("php://input"), true);
        $tuto = Tuto::find($id);
        echo json_encode($tuto);
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        echo 'Hello World!';
        $tutos = Tuto::all();
        echo 'ekatuto: ';
        $eka = Tuto::find(1);
        $ekamyos = 'findTutorial';
        // Kint-luokan dump-metodi tulostaa muuttujan arvon
        Kint::dump($data);
        Kint::dump($tutos);
        Kint::dump($eka);
    }

}
