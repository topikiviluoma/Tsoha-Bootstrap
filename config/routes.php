<?php

$routes->get('/', function() {
    HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->get('/tehtavat', function() {
    HelloWorldController::tehtavat();
});

$routes->get('/tehtava', function() {
    TehtavaController::index();
});

$routes->post('/tehtava/:id/edit', function($id) {
    TehtavaController::update($id);
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

$routes->get('/tehtava/:id/edit', function($id) {
    TehtavaController::edit($id);
});

$routes->post('/tehtava/:id/destroy', function($id) {
    TehtavaController::destroy($id);
});

$routes->get('/login', function() {
    KayttajaController::login();
});

$routes->post('/login', function() {
    KayttajaController::handle_login();
});

$routes->post('/logout', function() {
    KayttajaController::logout();
});

$routes->get('/kategoria', function() {
    KategoriaController::index();
});

$routes->post('/kategoria/:id/edit', function($id) {
    KategoriaController::edit($id);
});

$routes->post('/kategoria/', function() {
    KategoriaController::store();
});

$routes->get('/kategoria/:id', function($id) {
    KategoriaController::show($id);
});

$routes->get('/kategoria/:id/edit', function($id) {
    KategoriaController::edit($id);
});

$routes->post('/kategoria/:id/destroy', function($id) {
    KategoriaController::destroy($id);
});


