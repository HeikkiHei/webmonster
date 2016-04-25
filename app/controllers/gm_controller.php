<?php

class GmController extends BaseController{
	

  public static function listGM() {
    self::check_logged_in();
    $gamemaster_logged_in = self::get_gamemaster_logged_in();
    $gamemaster_id = self::get_gamemaster_id();
    $moderator = Gamemaster::checkModerator($gamemaster_id);
    if($moderator != null) {
        $gamemasters = Gamemaster::all();
        View::make('gamemaster/listgm.html', array('gamemasters' => $gamemasters, 'gamemaster_logged_in' => $gamemaster_logged_in, 'moderator' => $moderator));
    } else {
        $_SESSION['gamemaster'] = null;
        Redirect::to('/', array('error' => 'You do not have the permission! Logged out!'));
    }
}

public static function editGM($id) {
    self::check_logged_in();
    $gamemaster_logged_in = self::get_gamemaster_logged_in();
    $gamemaster_id = self::get_gamemaster_id();
    $moderator = Gamemaster::checkModerator($gamemaster_id);
    $gamemaster = Gamemaster::find($id);
    View::make('gamemaster/editgm.html', array('gamemaster' => $gamemaster, 'gamemaster_logged_in' => $gamemaster_logged_in, 'moderator' => $moderator));
}

public static function generateGM() {
    View::make('gamemaster/generategm.html');
}

public static function showGM($id) {
    self::check_logged_in();
    $gamemaster = Gamemaster::find($id);
    View::make('gamemaster/showgm.html', array('gamemaster' => $gamemaster));
}

public static function saveGM() {
    $params = $_POST;
    $gamemaster = new Gamemaster(array('name' => $params['name'],
        'password' => $params['password'],
        'moderator' => $params['moderator']
        ));
    $nameUsed = $gamemaster->validate_free_name($params['name']);
    $nameErrors = $gamemaster->validate_name();
    $passwordErrors = $gamemaster->validate_password();

    $errors = array_merge($nameErrors, $passwordErrors, $nameUsed);
    if(count($errors) > 0) {
        View::make('gamemaster/generategm.html', array('errors' => $errors));
    }else {
        $gamemaster->save();
        GmController::handle_login();
    }
}

public static function updateGM($id) {
    self::check_logged_in();
    $gamemaster_logged_in = self::get_gamemaster_logged_in();
    $params = $_POST;
    $attributes = array('id'=> $id,
        'name' => $params['name'],
        'password' => $params['password'],
        'moderator' => $params['moderator']
        );
    $gamemaster = new Gamemaster($attributes);
    $nameErrors = $gamemaster->validate_name();
    $passwordErrors = $gamemaster->validate_password();

    $errors = array_merge($nameErrors, $passwordErrors);

    if(count($errors) > 0) {
        View::make('gamemaster/editgm.html', array('errors' => $errors, 'gamemaster' => $gamemaster, 'gamemaster_logged_in' => $gamemaster_logged_in));
    }else {
        $gamemaster->update();
        $_SESSION['gamemaster'] = $gamemaster->id;
        CreatureController::listCreature();
    }
}

public static function destroy($id) {
    self::check_logged_in();
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
        CreatureController::listCreature();
    }
}

public static function handle_logout() {
    $_SESSION['gamemaster'] = null;
    Redirect::to('/', array('message' => 'You have logged out!'));
}

}


