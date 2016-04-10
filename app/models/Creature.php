<?php

class Creature extends BaseModel {
	
	public $id, $owner, $name, $race, $creatureClass, $level, $strength, $dexterity, $constitution, $intelligence, $wisdom, $charisma, $hitpoints;

	public function __construct($attributes) {
		parent::__construct($attributes);
	}

	public static function find($id) {
		$query = DB::connection()->prepare('SELECT * FROM Creature WHERE id = :id LIMIT 1');
		$query->execute(array('id'=>$id));
		$row = $query->fetch();

		if($row) {
			$creature = new Creature(array(
				'id' => $row['id'],
				'owner' => $row['owner'],
				'name' => $row['name'],
				'race' => $row['race'],
				'creatureClass' => $row['creatureclass'],
				'level' => $row['level'],
				'strength' => $row['strength'],
				'dexterity' => $row['dexterity'],
				'constitution' => $row['constitution'],
				'intelligence' => $row['intelligence'],
				'wisdom' => $row['wisdom'],
				'charisma' => $row['charisma'],
				'hitpoints' => $row['hitpoints']
				));
			return $creature;
		}
		return null;
	}

	public static function all(){
		$query = DB::connection()->prepare('SELECT creature.id AS id, gamemaster.name AS owner, name.name AS name, race.name AS race, creature.level as level, creatureClass.name AS creatureClass, creature.strength AS strength, creature.dexterity AS dexterity, creature.constitution AS constitution, creature.intelligence AS intelligence, creature.wisdom AS wisdom, creature.charisma AS charisma, creature.hitpoints AS hitpoints
			FROM creature, name, gamemaster, creatureClass, race
			WHERE creature.name = name.id
			AND creature.race = race.id
			AND creature.creatureClass = creatureClass.id
			AND creature.owner = gamemaster.id');
		
		$query->execute();
		$rows = $query->fetchAll();
		
		$creatures = array();

		foreach ($rows as $row) {
			$creatures[] = new Creature(array(
				'id' => $row['id'],
				'owner' => $row['owner'],
				'name' => $row['name'],
				'race' => $row['race'],
				'creatureClass' => $row['creatureclass'],
				'level' => $row['level'],
				'strength' => $row['strength'],
				'dexterity' => $row['dexterity'],
				'constitution' => $row['constitution'],
				'intelligence' => $row['intelligence'],
				'wisdom' => $row['wisdom'],
				'charisma' => $row['charisma'],
				'hitpoints' => $row['hitpoints']
				));
		}
		return $creatures;
	}




}