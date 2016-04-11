<?php

class CreatureController extends BaseController{
	
	public static function listcreature() {
		$creatures = Creature::all();
		View::make('creature/listcreature.html', array('creatures' => $creatures));
	}

	public static function editcreature($id) {
		$creature = Creature::find($id);
		$names = Creature::getnames();
		$races = Creature::getraces();
		$creatureclasses = Creature::getcreatureclasses();
		View::make('creature/editcreature.html', array('creature' => $creature, 'names' => $names, 'races' => $races, 'creatureclasses' => $creatureclasses));
	}

	public static function updatecreature($id) {
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

	public static function showcreature($id) {
		$creature = Creature::find($id);
		View::make('creature/showcreature.html', array('creature' => $creature));
	}

	public static function generatecreature() {
		$names = Creature::getnames();
		$races = Creature::getraces();
		$creatureclasses = Creature::getcreatureclasses();
		View::make('creature/generatecreature.html', array('names' => $names, 'races' => $races, 'creatureclasses' => $creatureclasses));
	}

	public static function savecreature() {
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

		Redirect::to('/showcreature/' . $creature->id, array('message' => 'test'));
	}





	public static function debug(){
		$onecreature = Creature::find(1);
		$creatures = Creature::all();
		Kint::dump($creatures);
		Kint::dump($onecreature);
	}

}