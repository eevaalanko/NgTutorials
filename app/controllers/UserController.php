<?php

require 'app/models/user.php';

class UserController extends BaseController {

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

    public static function addUser() {
        $params = json_decode(file_get_contents("php://input"), true);
        User::store($params);
        echo json_encode($params);
    }

    public static function getUserTEST() {
        $id = self::getUser();
        if ($id) {
            $user = User::find($id);
            echo json_encode($user);
        }
    }

}
