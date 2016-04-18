<?php

class Gamemaster extends BaseModel {
	
	public $id, $name, $password, $moderator;

	public function __construct($attributes) {
		parent::__construct($attributes);
	}

	public static function find($id) {
		$query = DB::connection()->prepare('SELECT * FROM gamemaster WHERE id = :id LIMIT 1');
		$query->execute(array('id'=>$id));
		$row = $query->fetch();

		if($row) {
			$gamemaster = new Gamemaster(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'password' => $row['password'],
				'moderator' => $row['moderator']
				));
			return $gamemaster;
		}
		return null;
	}

	public static function all(){
		$query = DB::connection()->prepare('SELECT * FROM gamemaster');
		
		$query->execute();
		$rows = $query->fetchAll();
		
		$gamemasters = array();

		foreach ($rows as $row) {
			$gamemasters[] = new Gamemaster(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'password' => $row['password'],
				'moderator' => $row['moderator']
				));
		}
		return $gamemasters;
	}

	public static function findName($name) {
		$query = DB::connection()->prepare('SELECT * FROM gamemaster WHERE name = :name LIMIT 1');
		$query->execute(array('name'=>$name));
		$row = $query->fetch();

		if($row) {
			$gamemaster = new Gamemaster(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'password' => $row['password'],
				'moderator' => $row['moderator']
				));
			return $gamemaster;
		}
		return null;
	}

	
	public static function myCreatures($owner_id){
		$query = DB::connection()->prepare('SELECT creature.id AS id, gamemaster.name AS owner, gamemaster.id AS owner_id, name.name AS name, race.name AS race, creature.level as level, creatureClass.name AS creatureClass, creature.strength AS strength, creature.dexterity AS dexterity, creature.constitution AS constitution, creature.intelligence AS intelligence, creature.wisdom AS wisdom, creature.charisma AS charisma, creature.hitpoints AS hitpoints
			FROM creature, name, gamemaster, creatureClass, race
			WHERE creature.name = name.name
			AND creature.race = race.name
			AND creature.creatureClass = creatureClass.name
			AND creature.owner = gamemaster.name
			AND creature.owner_id = :owner_id
			ORDER BY creature.id ASC');

		$query->execute(array('owner_id'=>$owner_id));
		$rows = $query->fetchAll();

		$creatures = array();

		foreach ($rows as $row) {
			$creatures[] = new Creature(array(
				'id' => $row['id'],
				'owner' => $row['owner'],
				'owner_id' => $row['owner_id'],
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

	public static function updateMyCreatures($owner_id){
		$query = DB::connection()->prepare('UPDATE Creature SET (owner) = (:owner) WHERE owner_id = :owner_id');

		$query->execute(array('owner_id' => $this->owner_id));
	}

	public function update() {
		$query = DB::connection()->prepare('UPDATE gamemaster SET (name, password, moderator) =
			(:name, :password, :moderator) WHERE id = :id');

		$query->execute(array('id' => $this->id,
			'name' => $this->name,
			'password' => $this->password,
			'moderator' => $this->moderator
			));
	}

	public function save() {
		$query = DB::connection()->prepare('INSERT INTO gamemaster (name, password, moderator) VALUES
			(:name, :password, :moderator) RETURNING id');
		$query->execute(array('name' => $this->name,
			'password' => $this->password,
			'moderator' => $this->moderator
			));
		$row = $query->fetch();
		$this->id = $row['id'];
	}
	public function destroy($id) {
		$query = DB::connection()->prepare('DELETE FROM gamemaster
			WHERE gamemaster.id = :id');

		$query->execute(array('id'=>$id));
	}

	public static function authenticate($name, $password) {
		$query = DB::connection()->prepare('SELECT * FROM gamemaster WHERE name = :name AND password = :password LIMIT 1');
		$query->execute(array('name' => $name, 'password' => $password));
		$row = $query->fetch();
		if($row) {
			$gamemaster = new Gamemaster(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'password' => $row['password'],
				'moderator' => $row['moderator']
				));
			return $gamemaster;
		}
		return null;
	}




}