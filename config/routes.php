<?php


// Site

$routes->get('/', function() {
	SiteController::index();
});

$routes->get('/login', function() {
	SiteController::index();
});

$routes->get('/sitemap', function() {
	SiteController::sitemap();
});

$routes->post('/login', function() {
	GmController::handle_login();
});


//Creatures get

$routes->get('/debugcreature', function() {
	CreatureController::debug();
});

$routes->get('/listcreature', function() {
	CreatureController::listCreature();
});

$routes->get('/generatecreature', function() {
	CreatureController::generateCreature();
});
$routes->post('/generatecreature', function() {
	CreatureController::saveCreature();
});

$routes->get('/editcreature/:id', function($id) {
	CreatureController::editCreature($id);
});

$routes->post('/editcreature/:id', function($id) {
	CreatureController::updateCreature($id);
});

$routes->get('/showcreature/:id', function($id) {
	CreatureController::showCreature($id);
});

$routes->post('/showcreature/:id', function($id) {
	CreatureController::destroy($id);
});



// GameMasters

$routes->get('/debuggm', function() {
	GmController::debugGM();
});

$routes->get('/listgm', function() {
	GmController::listGM();
});

$routes->get('/editgm/:id', function($id) {
	GmController::editGM($id);
});

$routes->get('/generategm', function() {
	GmController::generateGM();
});

$routes->post('/generategm', function() {
	GmController::saveGM();
});

$routes->get('/showgm/:id', function($id) {
	GmController::showGM($id);
});



