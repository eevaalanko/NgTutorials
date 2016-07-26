<?php

require 'app/models/favorite.php';

class MemoController extends BaseController {

    public static function memo() {
        View::make('memo.html');
    }

    public static function addToMemo() {
        $params = json_decode(file_get_contents("php://input"), true);
         Favorite::store($params);
        echo json_encode($params);
    }

}
