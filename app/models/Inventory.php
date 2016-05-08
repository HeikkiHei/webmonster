	<?php

	class Inventory extends BaseModel {

		public $creature_id, $weapon_id, $name, $description, $minDamage, $maxDamage;

		public function __construct($attributes) {
			parent::__construct($attributes);
		}

		public static function getCreaturesInventories($id){

			$query = DB::connection()->prepare("SELECT inventory.creature_id AS creature_id, inventory.weapon_id AS weapon_id, weapon.name AS name, weapon.description AS description, weapon.minDamage AS minDamage, weapon.maxDamage AS maxDamage
				FROM inventory, creature, weapon 
				WHERE inventory.creature_id = creature.id 
				AND inventory.weapon_id = weapon.id 
				AND creature.id = :id");

			$query->execute(array('id'=>$id));
			$rows = $query->fetchAll();
			$inventories = array();

			foreach ($rows as $row) {
				$inventories[] = new Inventory(array(
					'creature_id' => $row['creature_id'],
					'weapon_id' => $row['weapon_id'],
					'name' => $row['name'],
					'description' => $row['description'],
					'minDamage' => $row['mindamage'],
					'maxDamage' => $row['maxdamage']
					));
			}
			return $inventories;
		}

		public function putInInventory($weapon_id, $creature_id) {
			$query = DB::connection()->prepare('INSERT INTO Inventory (weapon_id, creature_id) VALUES (:weapon_id, :creature_id)');
			$query->execute(array(
				'weapon_id' => $weapon_id, 
				'creature_id' => $creature_id
				));
		}

	}
