<?php

class SiteController extends BaseController{

	public static function index(){
		View::make('login.html');
	}

	public static function sitemap() {    
		$gamemaster_id = self::get_gamemaster_id();
		$gamemaster_logged_in = self::get_gamemaster_logged_in();
		$moderator = Gamemaster::checkModerator($gamemaster_id);
		View::make('sitemap.html', array('gamemaster_logged_in' => $gamemaster_logged_in, 'gamemaster_id' => $gamemaster_id, 'moderator' => $moderator));
	}

}
