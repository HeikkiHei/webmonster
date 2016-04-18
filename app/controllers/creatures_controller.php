<?php

class CreatureController extends BaseController{
	
	public static function listCreature() {
		$creatures = Creature::all();
		View::make('creature/listcreature.html', array('creatures' => $creatures));
	}

	public static function editCreature($id) {
		$creature = Creature::find($id);
		$names = Name::getNames();
		$races = Race::getRaces();
		$creatureclasses = CreatureClass::getCreatureClasses();
		View::make('creature/editcreature.html', array('creature' => $creature, 'names' => $names, 'races' => $races, 'creatureclasses' => $creatureclasses));
	}

	public static function updateCreature($id) {
		$params = $_POST;
		$attributes = array('id'=> $id,
			'owner' => $params['owner'],
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

		Redirect::to('/showcreature/' . $creature->id, array('message' => 'test'));
	}

	public static function showCreature($id) {
		$creature = Creature::find($id);
		View::make('creature/showcreature.html', array('creature' => $creature));
	}

	public static function generateCreature() {
		$name = Name::getName();
		$race = Race::getRace();
		$creatureclass = CreatureClass::getCreatureClass();
		View::make('creature/generatecreature.html', array('name' => $name, 'race' => $race, 'creatureclass' => $creatureclass));
	}

	public static function saveCreature() {
		$params = $_POST;
		$creature = new Creature(array(
			'owner' => $params['owner'],
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

		Redirect::to('/showcreature/' . $creature->id, array('message' => 'SUCCESS'));
	}

	public static function destroy($id) {

		$creature = new Creature(array('id' => $id));
		$creature->destroy($id);

		Redirect::to('/listcreature', array('message' => 'Creature removed!'));
	}

	public static function debug(){
		$onecreature = Creature::find(1);
		$creatures = Creature::all();
		$name = Name::getName();
		Kint::dump($creatures);
		Kint::dump($onecreature);
		Kint::dump($name);
	}

}