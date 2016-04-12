	<?php

	class Name extends BaseModel {

		public $id, $name, $description;

		public function __construct($attributes) {
			parent::__construct($attributes);
		}

		public static function getaname() {
			$query = DB::connection()->prepare('SELECT name.id AS id, name.name AS name, name.description AS description FROM name ORDER BY random() LIMIT 1');

			$query->execute();
			$row = $query->fetch();

			if($row) {
				$name = new Name(array(
					'id' => $row['id'],
					'name' => $row['name'],
					'description' => $row['description']
					));
				return $name;
			}
			return null;
		}
	}
