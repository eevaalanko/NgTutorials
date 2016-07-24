<?php

require 'app/models/user.php';

class UserController extends BaseController {

    public static function signup() {
        View::make('signup.html');
    }

    public static function login() {
        $params = json_decode(file_get_contents("php://input"), true);
        $user = User::authenticate($params);
        if ($user) {
            $_SESSION['userID'] = $user->id;
            $_SESSION['userNM'] = $user->name;

            echo json_encode($user);
        }
    }

    public static function logout() {
        $_SESSION['userID'] = null;
        $_SESSION['userNM'] = null;
        echo json_encode("bye bye");
    }

    public static function getUser() {
        if (isset($_SESSION['userID'])) {
            $id = $_SESSION['userID'];
            $name = $_SESSION['userNM'];
            $user = new User(array('id' => $id, 'name ' => $name));
            echo json_encode($user);
        }
    }

    public static function addUser() {
        $params = json_decode(file_get_contents("php://input"), true);
        User::store($params);
        echo json_encode($params);
    }

}
