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

$routes->get('/tutorial', function() {
    TutoController::tutorial();
});

$routes->get('/allTutorials', function() {
    TutoController::allTutorials();
});

$routes->get('/findTutorial', function() {
    TutoController::findTutorial();
});

