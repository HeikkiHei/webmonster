<?php

class HelloWorldController extends BaseController{

  public static function index(){
    View::make('login.html');
  }

  public static function editcreature() {
    View::make('editcreature.html');
  }

  public static function showcreature() {
    View::make('showcreature.html');
  }

  public static function generatecreature() {
    View::make('generatecreature.html');
  }

  public static function listgm() {
    View::make('listgm.html');
  }

  public static function editgm() {
    View::make('editgm.html');
  }

  public static function generategm() {
    View::make('generategm.html');
  }


  public static function showgm() {
    View::make('showgm.html');
  }

    public static function sitemap() {
    View::make('sitemap.html');
  }



}
