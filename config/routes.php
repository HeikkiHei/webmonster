<?php

$routes->get('/', function() {
	HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', function() {
	HelloWorldController::sandbox();
});

$routes->get('/listcreature', function() {
	HelloWorldController::listcreature();
});

$routes->get('/editcreature', function() {
	HelloWorldController::editcreature();
});

$routes->get('/showcreature', function() {
	HelloWorldController::showcreature();
});

$routes->get('/generatecreature', function() {
	HelloWorldController::generatecreature();
});

$routes->get('/listgm', function() {
	HelloWorldController::listgm();
});

$routes->get('/editgm', function() {
	HelloWorldController::editgm();
});

$routes->get('/generategm', function() {
	HelloWorldController::generategm();
});

$routes->get('/showgm', function() {
	HelloWorldController::showgm();
});

$routes->get('/sitemap', function() {
	HelloWorldController::sitemap();
});

