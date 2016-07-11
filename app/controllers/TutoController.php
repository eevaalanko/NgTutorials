<?php

// Muista sisällyttää malliluokka require-komennolla!
require 'app/models/tuto.php';

class TutoController extends BaseController {

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
        echo Var_dump($_POST);
       // (int)$id = $_POST('id');
       // $tuto = Tuto::find($id);
      //  echo json_encode($tuto);
     //   Kint::dump($postdata);
        // $tuto = Tuto::find($postdata);
        //echo json_encode($tuto);
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        echo 'Hello World!';
        $tutos = Tuto::all();
        echo 'ekatuto: ';
        $eka = Tuto::find(1);
        $ekamyos = findTutorial();
        // Kint-luokan dump-metodi tulostaa muuttujan arvon
        Kint::dump($tutos);
        Kint::dump($eka);
    }

}
