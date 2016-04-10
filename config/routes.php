<?php



$routes->get('/', function() {
    HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->get('/signup', function() {
    HelloWorldController::signup();
});

$routes->get('/tutorial', function() {
    HelloWorldController::tutorial();
});

$routes->get('/allTutorials', function() {
    HelloWorldController::allTutorials();
});

$routes->get('/findTutorial', function() {
    HelloWorldController::findTutorial();
});

