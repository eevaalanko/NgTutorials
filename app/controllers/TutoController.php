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

    public static function message() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        View::make('message.html');
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

    public static function addTutorial() {
        $params = json_decode(file_get_contents("php://input"), true);
        Tuto::store($params);
        echo json_encode($params);
    }

    public static function updateTutorial() {
        $params = json_decode(file_get_contents("php://input"), true);
        Tuto::storeUpdated($params);
        echo json_encode($params);
    }

    public static function deleteTutorial() {
        $id = json_decode(file_get_contents("php://input"), true);
        Tuto::delete($id);
        echo json_encode($id);
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        echo 'Hello World!';
        $tutos = Tuto::all();
        echo 'ekatuto: ';
        $eka = Tuto::find(1);
        $testi = 'addTutorial';
    }

}
