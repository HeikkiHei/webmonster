<?php

class GmController extends BaseController{
	

  public static function listGM() {
    View::make('gamemaster/listgm.html');
}

public static function editGM($id) {
    $gamemaster = Gamemaster::find($id);
    View::make('gamemaster/editgm.html', array('gamemaster' => $gamemaster));
}

public static function generateGM() {
    View::make('gamemaster/generategm.html');
}

public static function showGM($id) {
    $gamemaster = Gamemaster::find($id);
    View::make('gamemaster/showgm.html', array('gamemaster' => $gamemaster));
}



public static function debugGM(){
    $oneGm = Gamemaster::find(1);
    $gms = Gamemaster::all();
    $gmName = Gamemaster::findName('heikkihei');
    Kint::dump($gms);
    Kint::dump($oneGm);
    Kint::dump($gmName);
}

}


