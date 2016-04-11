<?php

class GmController extends BaseController{
	

  public static function listgm() {
    View::make('gamemaster/listgm.html');
}

public static function editgm() {
    View::make('gamemaster/editgm.html');
}

public static function generategm() {
    View::make('gamemaster/generategm.html');
}

public static function showgm() {
    View::make('gamemaster/showgm.html');
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