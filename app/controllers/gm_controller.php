<?php

class GmController extends BaseController{
	

  public static function listgm() {
    View::make('gamemaster/listgm.html');
}

public static function editgm($id) {
    $gamemaster = Gamemaster::find($id);
    View::make('gamemaster/editgm.html', array('gamemaster' => $gamemaster));
}

public static function generategm() {
    View::make('gamemaster/generategm.html');
}

public static function showgm($id) {
    $gamemaster = Gamemaster::find($id);
    View::make('gamemaster/showgm.html', array('gamemaster' => $gamemaster));
}



public static function debuggm(){
    $onegm = Gamemaster::find(1);
    $gms = Gamemaster::all();
    $gmname = Gamemaster::findname('heikkihei');
    Kint::dump($gms);
    Kint::dump($onegm);
    Kint::dump($gmname);
}

}


