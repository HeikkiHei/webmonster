<?php

class GmController extends BaseController{
	

  public static function listGM() {
    $gamemasters = Gamemaster::all();
    View::make('gamemaster/listgm.html', array('gamemasters' => $gamemasters));
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

public static function saveGM() {
    $params = $_POST;
    $gamemaster = new Gamemaster(array('name' => $params['name'],
        'password' => $params['password'],
        'moderator' => $params['moderator']
        ));
    $nameErrors = $gamemaster->validate_name();
    $passwordErrors = $gamemaster->validate_password();

    $errors = array_merge($nameErrors, $passwordErrors);
    if(count($errors) > 0) {
        View::make('gamemaster/generategm.html', array('errors' => $errors));
    }else {
        $gamemaster->save();

        View::make('gamemaster/showgm.html', array('gamemaster' => $gamemaster));
    }
}

public static function destroy($id) {
    $gamemaster = new Gamemaster(array('id' => $id));
    $gamemaster->destroy($id);
    Redirect::to('/', array('message' => 'Gamemaster successfully deleted!'));
}

public static function debugGM(){
    $oneGm = Gamemaster::find(1);
    $gms = Gamemaster::all();
    $gmName = Gamemaster::findName('heikkihei');
    Kint::dump($gms);
    Kint::dump($oneGm);
    Kint::dump($gmName);
}

public static function handle_login() {
    $params = $_POST;

    $gamemaster = Gamemaster::authenticate($params['name'], $params['password']);

    if(!$gamemaster) {
        View::make('login.html', array('error' => 'wrong username or password', 'name' => $params['name']));
    }else{
        $_SESSION['gamemaster'] = $gamemaster->id;
        View::make('gamemaster/showgm.html', array('gamemaster' => $gamemaster));
    }
}

}


