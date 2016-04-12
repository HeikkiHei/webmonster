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
				$race = new Race(array(
					'id' => $row['id'],
					'name' => $row['name'],
					'description' => $row['description']
					));
				return $race;
			}
			return null;
		}


		public static function getraces(){
			$query = DB::connection()->prepare('SELECT * FROM race');

			$query->execute();
			$rows = $query->fetchAll();

			$races = array();

			foreach ($rows as $row) {
				$races[] = new Race(array(
					'id' => $row['id'],
					'name' => $row['name'],
					'description' => $row['description']
					));
			}
			return $races;
		}
	}
