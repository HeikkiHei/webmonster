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