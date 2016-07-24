<?php

class BaseController {


    public static function get_user_logged_in() {
        // Katsotaan onko user-avain sessiossa
        if (isset($_SESSION['user'])) {
            $id = $_SESSION['user'];
            return $id;
        }
        return null;
    }

    public static function check_logged_in() {
        // Toteuta kirjautumisen tarkistus tähän.
        // Jos käyttäjä ei ole kirjautunut sisään, ohjaa hänet toiselle sivulle (esim. kirjautumissivulle).
        if (self::get_user_logged_in()) {
            $id = check_logged_in();
        }
    }

}
