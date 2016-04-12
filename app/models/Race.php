	<?php

	class Race extends BaseModel {

		public $id, $name, $description;

		public function __construct($attributes) {
			parent::__construct($attributes);
		}

		public static function getarace() {
			$query = DB::connection()->prepare('SELECT race.id AS id, race.name AS name, race.description AS description FROM race ORDER BY random() LIMIT 1');

			$query->execute();
			$row = $query->fetch();

			if($row) {
				$race = new Name(array(
					'id' => $row['id'],
					'name' => $row['name'],
					'description' => $row['description']
					));
				return $race;
			}
			return null;
		}
	}
