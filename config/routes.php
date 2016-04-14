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

$routes->get('/tehtava', function() {
    TehtavaController::index();
});


$routes->post('/tehtava/', function() {
    TehtavaController::store();
});

$routes->get('/tehtava/new', function() {
    TehtavaController::create();
});

$routes->get('/tehtava/:id', function($id) {
    TehtavaController::show($id);
});

$routes->post('/tehtava/:id/edit', function($id) {
TehtavaController::update($id);
});

$routes->get('/tehtava/:id/edit', function($id) {
TehtavaController::edit($id);
});


