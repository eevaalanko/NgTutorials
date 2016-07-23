<?php

require 'app/models/review.php';

class ReviewController extends BaseController {

    public static function allReviews() {
        $id = json_decode(file_get_contents("php://input"), true);
        $reviews = Review::all($id);
        echo json_encode($reviews);
    }

    public static function addReview() {
        $params = json_decode(file_get_contents("php://input"), true);
        Review::store($params);
        echo json_encode($params);
    }


}
