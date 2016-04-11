<?php


// Site

$routes->get('/', function() {
	SiteController::index();
});

$routes->get('/sitemap', function() {
	SiteController::sitemap();
});


//Creatures

$routes->get('/debugcreature', function() {
	CreatureController::debug();
});

$routes->get('/listcreature', function() {
	CreatureController::listcreature();
});

$routes->get('/editcreature', function() {
	CreatureController::editcreature();
});

$routes->get('/showcreature/:id', function($id) {
	CreatureController::showcreature($id);
});

$routes->get('/generatecreature', function() {
	CreatureController::generatecreature();
});


// GameMasters

$routes->get('/debuggm', function() {
	GmController::debuggm();
});

$routes->get('/listgm', function() {
	GmController::listgm();
});

$routes->get('/editgm', function() {
	GmController::editgm();
});

$routes->get('/generategm', function() {
	GmController::generategm();
});

$routes->get('/showgm', function() {
	GmController::showgm();
});


