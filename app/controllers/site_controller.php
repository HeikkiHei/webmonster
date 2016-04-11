<?php

class SiteController extends BaseController{

  public static function index(){
    View::make('login.html');
  }

  public static function sitemap() {
    View::make('sitemap.html');
  }

}
