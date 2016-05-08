<?php

class ItemController extends BaseController{

	public function editInventory($creature_id) {
		self::check_logged_in();
		$gamemaster_logged_in = self::get_gamemaster_logged_in();

		$creature = Creature::find($creature_id);
		$inventories = Inventory::getCreaturesInventories($creature_id);
		$weapons = Weapon::getWeapons();

		View::make('/creature/inventory.html', array('gamemaster_logged_in' => $gamemaster_logged_in, 
			'creature' => $creature, 'weapons' => $weapons, 'inventories' => $inventories));
	}

	public function addWeapon() {
		self::check_logged_in();
		$gamemaster_logged_in = self::get_gamemaster_logged_in();

		$params = $_POST;
		$creature_id = $params['creature_id'];
		$weapon_id = $params['weapon_id'];

		$creature = Creature::find($creature_id);
		$inventories = Inventory::getCreaturesInventories($creature_id);


		$inventory = new Inventory(array(
			'weapon_id' => $weapon_id,
			'creature_id' => $creature_id));

		$inventory->putInInventory($weapon_id, $creature_id);

		View::make('/creature/showcreature.html', array( 'creature' => $creature, 'message' => 'Weapon added!', 
			'gamemaster_logged_in' => $gamemaster_logged_in, 'inventories' => $inventories));
	}

}