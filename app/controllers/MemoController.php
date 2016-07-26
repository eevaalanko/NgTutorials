<?php

require 'app/models/favorite.php';

class MemoController extends BaseController {

    public static function allFavorites() {
        $id = json_decode(file_get_contents("php://input"), true);
        $favorites = Favorite::all($id);
        echo json_encode($favorites);
    }

    public static function memo() {
        View::make('memo.html');
    }

    public static function addToMemo() {
        $params = json_decode(file_get_contents("php://input"), true);
        Favorite::store($params);
        echo json_encode($params);
    }
    
        public static function deleteFavorite() {
        $id = json_decode(file_get_contents("php://input"), true);
        Favorite::delete($id);
        echo json_encode($id);
    }

}
