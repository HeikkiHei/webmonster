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

		public static function findname($name) {
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




}