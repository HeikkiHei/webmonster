<?php

class CreatureController extends BaseController{
	
	public static function listcreature() {
		$creatures = Creature::all();
		View::make('creature/listcreature.html', array('creatures' => $creatures));
	}

	public static function editcreature() {
		View::make('creature/editcreature.html');
	}

	public static function showcreature($id) {
		$creature = Creature::find($id);
		View::make('creature/showcreature.html', array($creature));
	}

	public static function generatecreature() {
		View::make('creature/generatecreature.html');
	}







	public static function debug(){
		$onecreature = Creature::find(1);
		$creatures = Creature::all();
		Kint::dump($creatures);
		Kint::dump($onecreature);
	}

}