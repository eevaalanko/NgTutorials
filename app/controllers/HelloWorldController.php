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

    public static function sandbox() {
        // Testaa koodiasi täällä
          echo 'Hello World!';
        //  $angularjs = new Tuto(array('id' => 1, 'name' => 'AngularJs', 'description' => 'Angular API'));
        //   $angularjs = Tuto::find(1
        $tutos = Tuto::all();
        // Kint-luokan dump-metodi tulostaa muuttujan arvon
          Kint::dump($tutos);
        //  Kint::dump($api);
        //  echo $angularjs->name;
    
    }

}
