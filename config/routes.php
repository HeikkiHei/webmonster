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

$routes->post('/logout', function() {
	GmController::handle_logout();
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

$routes->get('/editcreature/:id/inventory', function($id) {
	ItemController::editInventory($id);
});

$routes->post('/editcreature/:id/inventory', function() {
	ItemController::addWeapon();
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

$routes->post('/editgm/:id', function($id) {
	GmController::updateGM($id);
});

$routes->post('/showgm/:id/delete', function($id) {
	GmController::destroy($id);
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



