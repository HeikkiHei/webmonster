<?php

class HelloWorldController extends BaseController{

  public static function index(){
    View::make('login.html');
  }
  public static function sandbox(){
    View::make('helloworld.html');
  }
  public static function creaturelist() {
    View::make('creaturelist.html');
  }

  public static function editpage() {
    View::make('editpage.html');
  }

  public static function showpage() {
    View::make('showpage.html');
  }

  public static function generate() {
    View::make('generate.html');
  }
}
