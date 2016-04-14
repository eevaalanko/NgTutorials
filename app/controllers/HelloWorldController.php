<?php

// Muista sisällyttää malliluokka require-komennolla!
require 'app/models/tuto.php';

class HelloWorldController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
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
        $postdata = file_get_contents("php://input");
        json_decode($postdata);
        Kint::dump($postdata);
        // $tuto = Tuto::find($postdata);
        //echo json_encode($tuto);
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        echo 'Hello World!';
        $tutos = Tuto::all();
        $eka = Tuto::find(1);
        // Kint-luokan dump-metodi tulostaa muuttujan arvon
        Kint::dump($tutos);
        Kint::dump($eka);
    }

}
