<?php

class CreatureController extends BaseController{
	
	public static function listCreature() {
		self::check_logged_in();
		$gamemaster_logged_in = self::get_gamemaster_logged_in();
		$gamemaster_id = self::get_gamemaster_id();
		$creatures = Creature::myCreatures($gamemaster_id);
		View::make('creature/listcreature.html', array('creatures' => $creatures, 'gamemaster_logged_in' => $gamemaster_logged_in, 'gamemaster_id' => $gamemaster_id));
	}

	public static function editCreature($id) {
		self::check_logged_in();

		$gamemaster_logged_in = self::get_gamemaster_logged_in();
		$creature = Creature::find($id);
		$names = Name::getNames();
		$races = Race::getRaces();
		$creatureclasses = CreatureClass::getCreatureClasses();
		$weapons = Weapon::getWeapons();
		$inventories = Inventory::getCreaturesInventories($id);
		View::make('creature/editcreature.html', array('creature' => $creature, 'names' => $names, 'races' => $races, 'creatureclasses' => $creatureclasses, 'gamemaster_logged_in' => $gamemaster_logged_in, 'weapons' => $weapons, 'inventories' => $inventories));
	}

	public static function updateCreature($id) {
		self::check_logged_in();
		$gamemaster_logged_in = self::get_gamemaster_logged_in();
		$params = $_POST;
		$attributes = array('id'=> $id,
			'owner_id' => $params['owner_id'],
			'name' => $params['name'],
			'race' => $params['race'],
			'creatureClass' => $params['creatureclass'],
			'level' => $params['level'],
			'strength' => $params['strength'],
			'dexterity' => $params['dexterity'],
			'constitution' => $params['constitution'],
			'intelligence' => $params['intelligence'],
			'wisdom' => $params['wisdom'],
			'charisma' => $params['charisma'],
			'hitpoints' => $params['hitpoints']
			);

		$creature = new Creature($attributes);
		$creature->update();

		Redirect::to('/showcreature/' . $creature->id, array('message' => 'Creature successfully updated!', 'gamemaster_logged_in' => $gamemaster_logged_in));
	}

	public static function showCreature($id) {
		self::check_logged_in();
		$gamemaster_logged_in = self::get_gamemaster_logged_in();
		$gamemaster_id = self::get_gamemaster_id();
		$creature = Creature::find($id);
		$inventories = Inventory::getCreaturesInventories($id);
		View::make('creature/showcreature.html', array('creature' => $creature, 'gamemaster_logged_in' => $gamemaster_logged_in, 'inventories' => $inventories,  'gamemaster_id' => $gamemaster_id));
	}

	public static function generateCreature() {
		self::check_logged_in();
		$gamemaster_logged_in = self::get_gamemaster_logged_in();
		$name = Name::getName();
		$race = Race::getRace();
		$creatureclass = CreatureClass::getCreatureClass();
		View::make('creature/generatecreature.html', array('name' => $name, 'race' => $race, 'creatureclass' => $creatureclass, 'gamemaster_logged_in' => $gamemaster_logged_in));
	}

	public static function saveCreature() {
		self::check_logged_in();
		$gamemaster_logged_in = self::get_gamemaster_logged_in();
		$params = $_POST;
		$creature = new Creature(array(
			'owner_id' => $params['owner_id'],
			'name' => $params['name'],
			'race' => $params['race'],
			'creatureClass' => $params['creatureclass'],
			'level' => $params['level'],
			'strength' => $params['strength'],
			'dexterity' => $params['dexterity'],
			'constitution' => $params['constitution'],
			'intelligence' => $params['intelligence'],
			'wisdom' => $params['wisdom'],
			'charisma' => $params['charisma'],
			'hitpoints' => $params['hitpoints']
			));

		$creature->save();

		Redirect::to('/showcreature/' . $creature->id, array('message' => 'Creature successfully created!', 'gamemaster_logged_in' => $gamemaster_logged_in));
	}

	public static function destroy($id) {
		self::check_logged_in();
		$gamemaster_logged_in = self::get_gamemaster_logged_in();
		$creature = new Creature(array('id' => $id));
		$creature->destroy($id);

		Redirect::to('/listcreature', array('message' => 'Creature successfully removed!', 'gamemaster_logged_in' => $gamemaster_logged_in));
	}

	public static function debug(){
		$onecreature = Creature::find(1);
		$name = Name::getName();
		$inventory = Inventory::getCreaturesInventories(1);
		Kint::dump($onecreature);
		Kint::dump($name);
		Kint::dump($inventory);
		Kint::dump($inventories);
	}



}