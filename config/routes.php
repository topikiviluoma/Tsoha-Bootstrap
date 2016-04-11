<?php

$routes->get('/', function() {
    HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->get('/login', function() {
    HelloWorldController::login();
});

$routes->get('/tehtavat', function() {
HelloWorldController::tehtavat();
});

$routes->get('/tehtava', function(){
  GameController::index();
});

$routes->get('/tehtava/:id', function($id){
  TehtavaController::show($id);
});

$routes->get('/tehtava/', function() {
    TehtavaController::store();
});

