<?php

$routes->get('/', function() {
	HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', function() {
	HelloWorldController::sandbox();
});

$routes->get('/list', function() {
	HelloWorldController::creaturelist();
});

$routes->get('/edit', function() {
	HelloWorldController::editpage();
});

$routes->get('/show', function() {
	HelloWorldController::showpage();

});

