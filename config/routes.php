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
  
