<?php

class BaseController{

  public static function get_gamemaster_logged_in(){
    if(isset($_SESSION['gamemaster'])) {
      $gamemaster_id = $_SESSION['gamemaster'];
      $gamemaster = Gamemaster::find($gamemaster_id);

      return $gamemaster;
    }
    return null;
  }

  public static function get_gamemaster_id(){
    if(isset($_SESSION['gamemaster'])) {
      $gamemaster_id = $_SESSION['gamemaster'];

      return $gamemaster_id;
    }
    return null;
  }

  public static function check_logged_in() {
    if(!isset($_SESSION['gamemaster'])) {
      Redirect::to('/login', array('message' => 'You need to log in or register!'));
    }
  }

}
