<?php

class BaseController {

    public static function getUserID() {
        if (isset($_SESSION['userID']) && $_SESSION['userID'] !== null) {
            $id = $_SESSION['userID'];
            return $id;
        };
    }

}
