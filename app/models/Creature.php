<?php

class Creature extends BaseModel {
	
	public $id, $owner, $name, $race, $creatureClass, $level, $strength, $dexterity, $constitution, $intelligence, $wisdom, $charisma, $hitpoints;

	public function __construct($attributes) {
		parent::__construct($attributes);
	}

	public static function find($id) {
		$query = DB::connection()->prepare('SELECT creature.id AS id, gamemaster.name AS owner, name.name AS name, race.name AS race, creature.level as level, creatureClass.name AS creatureClass, creature.strength AS strength, creature.dexterity AS dexterity, creature.constitution AS constitution, creature.intelligence AS intelligence, creature.wisdom AS wisdom, creature.charisma AS charisma, creature.hitpoints AS hitpoints
			FROM creature, name, gamemaster, creatureClass, race
			WHERE creature.name = name.name
			AND creature.race = race.name
			AND creature.creatureClass = creatureClass.name
			AND creature.owner = gamemaster.name
			AND creature.id = :id LIMIT 1');
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
			WHERE creature.name = name.name
			AND creature.race = race.name
			AND creature.creatureClass = creatureClass.name
			AND creature.owner = gamemaster.name
			ORDER BY creature.id ASC');
		
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

	public function save() {
		$query = DB::connection()->prepare('INSERT INTO Creature (owner, name, race, creatureClass, level, strength, dexterity, constitution, intelligence, wisdom, charisma, hitpoints) VALUES
			(:owner, :name, :race, :creatureClass, :level, :strength, :dexterity, :constitution, :intelligence, :wisdom, :charisma, :hitpoints) RETURNING id');
		$query->execute(array('owner' => $this->owner,
			'name' => $this->name,
			'race' => $this->race,
			'creatureClass' => $this->creatureClass,
			'level' => $this->level,
			'strength' => $this->strength,
			'dexterity' => $this->dexterity,
			'constitution' => $this->constitution,
			'intelligence' => $this->intelligence,
			'wisdom' => $this->wisdom,
			'charisma' => $this->charisma,
			'hitpoints' => $this->hitpoints
			));
		$row = $query->fetch();
		$this->id = $row['id'];
	}

	public static function getnames(){
		$query = DB::connection()->prepare('SELECT * FROM name');
		
		$query->execute();
		$rows = $query->fetchAll();
		
		$names = array();

		foreach ($rows as $row) {
			$names[] = new Gamemaster(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'description' => $row['description']
				));
		}
		return $names;
	}
	public static function getraces(){
		$query = DB::connection()->prepare('SELECT * FROM race');
		
		$query->execute();
		$rows = $query->fetchAll();
		
		$races = array();

		foreach ($rows as $row) {
			$races[] = new Gamemaster(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'description' => $row['description']
				));
		}
		return $races;
	}

	public static function getcreatureclasses(){
		$query = DB::connection()->prepare('SELECT * FROM creatureclass');
		
		$query->execute();
		$rows = $query->fetchAll();
		
		$creatureclasses = array();

		foreach ($rows as $row) {
			$creatureclasses[] = new Gamemaster(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'description' => $row['description']
				));
		}
		return $creatureclasses;
	}


}