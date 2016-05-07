	<?php

	class Weapon extends BaseModel {

		public $id, $name, $description, $minDamage, $maxDamage;

		public function __construct($attributes) {
			parent::__construct($attributes);
		}

		public static function getWeapon() {
			$query = DB::connection()->prepare('SELECT weapon.id AS id, weapon.name AS name, weapon.description AS description, weapon.minDamage AS minDamage, weapon.maxDamage AS maxDamage FROM weapon
				ORDER BY random() LIMIT 1');

			$query->execute();
			$row = $query->fetch();

			if($row) {
				$weapon
				= new weapon
				(array(
					'id' => $row['id'],
					'name' => $row['name'],
					'description' => $row['description'],
					'minDamage' => $row['mindamage'],
					'maxDamage' => $row['maxdamage']
					));
				return $weapon
				;
			}
			return null;
		}


		public static function getWeapons(){
			$query = DB::connection()->prepare('SELECT weapon.id AS id, weapon.name AS name, weapon.description AS description, weapon.minDamage AS minDamage, weapon.maxDamage AS maxDamage FROM weapon');

			$query->execute();
			$rows = $query->fetchAll();

			$weapons = array();

			foreach ($rows as $row) {
				$weapons[] = new Weapon(array(
					'id' => $row['id'],
					'name' => $row['name'],
					'description' => $row['description'],
					'minDamage' => $row['mindamage'],
					'maxDamage' => $row['maxdamage']
					));
			}
			return $weapons;
		}
	}
