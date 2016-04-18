<?php

class Creature extends BaseModel {
	
	public $id, $owner, $owner_id, $name, $race, $creatureClass, $level, $strength, $dexterity, $constitution, $intelligence, $wisdom, $charisma, $hitpoints;

	public function __construct($attributes) {
		parent::__construct($attributes);
	}


	public static function find($id) {
		$query = DB::connection()->prepare('SELECT creature.id AS id, gamemaster.id AS owner_id, name.name AS name, race.name AS race, creature.level as level, creatureClass.name AS creatureClass, creature.strength AS strength, creature.dexterity AS dexterity, creature.constitution AS constitution, creature.intelligence AS intelligence, creature.wisdom AS wisdom, creature.charisma AS charisma, creature.hitpoints AS hitpoints
			FROM creature, name, gamemaster, creatureClass, race
			WHERE creature.name = name.name
			AND creature.race = race.name
			AND creature.creatureClass = creatureClass.name
			AND creature.owner_id = gamemaster.id
			AND creature.id = :id LIMIT 1');
		$query->execute(array('id'=>$id));
		$row = $query->fetch();

		if($row) {
			$creature = new Creature(array(
				'id' => $row['id'],
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
			return $creature;
		}
		return null;
	}

	public function save() {
		$query = DB::connection()->prepare('INSERT INTO Creature (owner_id, name, race, creatureClass, level, strength, dexterity, constitution, intelligence, wisdom, charisma, hitpoints) VALUES
			(:owner_id, :name, :race, :creatureClass, :level, :strength, :dexterity, :constitution, :intelligence, :wisdom, :charisma, :hitpoints) RETURNING id');
		$query->execute(array('owner_id' => $this->owner_id,
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

	public function update() {
		$query = DB::connection()->prepare('UPDATE Creature SET (owner_id, name, race, creatureClass, level, strength, dexterity, constitution, intelligence, wisdom, charisma, hitpoints) =
			(:owner_id, :name, :race, :creatureClass, :level, :strength, :dexterity, :constitution, :intelligence, :wisdom, :charisma, :hitpoints) WHERE id = :id');
		$query->execute(array('id' => $this->id,
			'owner_id' => $this->owner_id,
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
	}

	public function destroy($id) {
		$query = DB::connection()->prepare('DELETE FROM creature
			WHERE creature.id = :id');

		$query->execute(array('id'=>$id));
	}

		public static function myCreatures($owner_id){
		$query = DB::connection()->prepare('SELECT * FROM Creature WHERE owner_id = :owner_id ORDER BY creature.id ASC');

		$query->execute(array('owner_id'=>$owner_id));
		$rows = $query->fetchAll();

		$creatures = array();

		foreach ($rows as $row) {
			$creatures[] = new Creature(array(
				'id' => $row['id'],
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

}
