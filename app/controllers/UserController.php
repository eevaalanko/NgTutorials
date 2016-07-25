<?php

require 'app/models/user.php';

class UserController {

    public static function signup() {
        View::make('signup.html');
    }

    public static function login() {
        $params = json_decode(file_get_contents("php://input"), true);
        $id = User::authenticate($params);
        if ($id) {
            $_SESSION['userID'] = $id;
            echo json_encode($id);
        }
    }

    public static function logout() {
        $_SESSION['userID'] = null;
       // session_destroy();
        echo json_encode("bye bye");
    }

    public static function getUser() {
        if (isset($_SESSION['userID']) && $_SESSION['userID'] !== null) {
            $id = $_SESSION['userID'];
            echo json_encode($id);
        }
    }

    public static function addUser() {
        $params = json_decode(file_get_contents("php://input"), true);
        User::store($params);
        echo json_encode($params);
    }

}
