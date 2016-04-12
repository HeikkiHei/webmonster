	<?php

	class CreatureClass extends BaseModel {

		public $id, $name, $description;

		public function __construct($attributes) {
			parent::__construct($attributes);
		}

		public static function getacreatureclass() {
			$query = DB::connection()->prepare('SELECT creatureclass.id AS id, creatureclass.name AS name, creatureclass.description AS description FROM creatureclass ORDER BY random() LIMIT 1');

			$query->execute();
			$row = $query->fetch();

			if($row) {
				$creatureclass = new CreatureClass(array(
					'id' => $row['id'],
					'name' => $row['name'],
					'description' => $row['description']
					));
				return $creatureclass;
			}
			return null;
		}
	}
