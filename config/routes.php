<?php


// Site

$routes->get('/', function() {
	SiteController::index();
});

$routes->get('/sitemap', function() {
	SiteController::sitemap();
});


//Creatures get

$routes->get('/debugcreature', function() {
	CreatureController::debug();
});

$routes->get('/listcreature', function() {
	CreatureController::listcreature();
});

$routes->get('/showcreature/:id', function($id) {
	CreatureController::showcreature($id);
});

$routes->get('/generatecreature', function() {
	CreatureController::generatecreature();
});
$routes->post('/generatecreature/', function() {
	CreatureController::savecreature();
});

$routes->get('/editcreature/:id', function($id) {
	CreatureController::editcreature($id);
});

$routes->post('/editcreature/:id', function($id) {
	CreatureController::updatecreature($id);
});



// GameMasters

$routes->get('/debuggm', function() {
	GmController::debuggm();
});

$routes->get('/listgm', function() {
	GmController::listgm();
});

$routes->get('/editgm/:id', function($id) {
	GmController::editgm($id);
});

$routes->get('/generategm', function() {
	GmController::generategm();
});

$routes->get('/showgm/:id', function($id) {
	GmController::showgm($id);
});


