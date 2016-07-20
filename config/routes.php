<?php

$routes->get('/', function() {
    TutoController::index();
});

$routes->get('/hiekkalaatikko', function() {
    TutoController::sandbox();
});

$routes->get('/signup', function() {
    TutoController::signup();
});

$routes->get('/allTutorials', function() {
    TutoController::allTutorials();
});

$routes->post('/findTutorial', function() {
    TutoController::findTutorial();
});

$routes->post('/addTutorial', function() {
    TutoController::addTutorial();
});

$routes->post('/allReviews', function() { 
    TutoController::allReviews();
});

$routes->post('/addReview', function() {
    TutoController::addReview();
});

$routes->post('/avgStars', function() {
    TutoController::avgStars();
});




