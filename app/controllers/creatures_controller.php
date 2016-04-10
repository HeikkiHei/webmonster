<?php

class CreatureController extends BaseController{
	
	public static function listcreature() {
		$creatures = Creature::all();
		View::make('listcreature.html', array('creatures' => $creatures));
	}






    public static function debug(){
    $onecreature = Creature::find(1);
    $creatures = Creature::all();
    Kint::dump($creatures);
    Kint::dump($onecreature);

  }

}