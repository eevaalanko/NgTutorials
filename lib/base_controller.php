<?php

class BaseController {

    public static function getUser() {
        if (isset($_SESSION['userID']) && $_SESSION['userID'] !== null) {
            $id = $_SESSION['userID'];
            return $id;
            Kint::dump($id);
            //   echo json_encode($id);
        };
    }

}
