<?php

class HelloWorldController extends BaseController{

  public static function index(){
    View::make('login.html');
  }
  public static function sandbox(){
    View::make('helloworld.html');
  }

}
