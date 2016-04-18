	<?php

	class Inventory extends BaseModel {

		public $creature_id, $weapon_id;

		public function __construct($attributes) {
			parent::__construct($attributes);
		}

		public static function getInventory() {
			$query = DB::connection()->prepare('SELECT creature_id AS creature_id, weapon_id AS weapon_id FROM inventory');

			$query->execute();
			$row = $query->fetch();

			if($row) {
				$inventory = new Inventory(array(
					'creature_id' => $row['creature_id'],
					'weapon_id' => $row['weapon_id']
					));
				return $inventory;
			}
			return null;
		}


		public static function getInventories(){
			$query = DB::connection()->prepare('SELECT * FROM inventory');

			$query->execute();
			$rows = $query->fetchAll();

			$inventories = array();

			foreach ($rows as $row) {
				$inventories[] = new Inventory(array(
					'creature_id' => $row['creature_id'],
					'weapon_id' => $row['weapon_id']
					));
			}
			return $inventories;
		}

		public static function getCreaturesInventories($id){
			$query = DB::connection()->prepare('SELECT * FROM inventory WHERE creature_id = :id');

			$query->execute(array('id'=>$id));
			$rows = $query->fetch();

			$inventories = array();

			foreach ($rows as $row) {
				$inventories[] = new Inventory(array(
					'creature_id' => $row['creature_id'],
					'weapon_id' => $row['weapon_id']
					));
			}
			return $inventories;
		}
	}
