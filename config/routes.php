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



